<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    
    public function login(Request $request)
    {
        $request->validate([
            'email'=>['required','exist:users,email'],
            'password'=>['required','string','min:6'],
        ]);
        $user = User::where('email',$request->all()['email'])->first();
        if($user){
            if(Hash::check($request->all()['password'],$user->password)){
                $user->token = 'Bearer ' . $user->createToken($user->name)->plainTextToken;
                return response()->json('تم تسجيل الدخول بنجاح',$user);
            }
        }
        return  response()->json('برجاء التأكد من البيانات',401);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','min:6'],
        ]);
        $data = $request->except('password');
        $data['password'] = Hash::make($request->all()['password']);
        $user = User::create($data);
        $user->token = 'Bearer ' . $user->createToken($user->name)->plainTextToken;
        return response()->json('تم تسجيل الحساب بنجاح',$user);
    }

    public function edit()
    {
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        if(empty($user)){
            return response()->json('حدث خطأ .. برجاء اعادة المحاوله!',404);
        }
        return $this->apiRes('تم استرداد البيانات',$user); 
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'nullable',
            'email'=>['nullable','email','unique:users,email'],
        ]);
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        if(empty($user)){
            return response()->json('لا يوجد مستخدم بهذا الرقم!',404);
        }
        $data = $request->except('_token','_method');
        $user = User::where('id',$authUser->id)->update($data);
        $user = User::find($authUser->id);
        return response()->json('تم تحديث البيانات بنجاح!',$user);
    }

    public function delete()
    {
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        if(empty($user)){
            return response()->json('لا يوجد مستخدم بهذا الرقم!',404);
        }
        User::where('id',$authUser->id)->delete();
        return response()->json('تم حذف الحساب بنجاح!',$user);
    }

    public function changePassword(Request $request)
    {
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        $request->validate([
            'password'=>['required','string','min:6','max:20','confirmed'],
        ]);
        $user->password = Hash::make($request->all()['password']);
        $user->save();
        return response()->json('تم تغيير كلمة المرور بنجاح!',$user);
    }

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email'=>['required','email','exists:users']
        ]);
        $user = User::where('email',$request->all()['email'])->first();
        $token = $user->createToken($user->name)->plainTextToken;
        return response()->json('تمت العمليه بنجاح!',$token);
    }

    public function logoutFromAllDevices()
    {
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        $user->tokens()->delete();
        return response()->json('تم تسجيل الخروج من كافة الاجهزه!',$user);
    }

    public function logout(Request $request)
    {
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        $token = $request->header('Authorization');
        $tokenArray = explode('|',$token);
        $tokenId = str_replace('Bearer ','',$tokenArray[0]);
        $user->tokens()->where('id',$tokenId)->delete();
        return response()->json('تم تسجيل الخروج بنجاح!',[$user,$tokenId]);
    }

}
