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
            'email'=>['required','exists:users,email'],
            'password'=>['required','min:6'],
        ]);
        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $user->token = 'Bearer ' . $user->createToken($user->name)->plainTextToken;
                return response()->json(['msg' => 'تم تسجيل الدخول بنجاح', 'data' => $user, 'success' => true]);
            }
        }
        return  response()->json(['msg' => 'برجاء التأكد من البيانات', 'data' => [], 'success' => false], 401);
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
        return response()->json(['msg' => 'تم تسجيل الحساب بنجاح', 'data' => $user, 'success' => true]);
    }

    public function edit()
    {
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        if(empty($user)){
            return  response()->json(['msg' => 'حدث خطأ .. برجاء اعادة المحاوله', 'data' => [], 'success' => false], 404);
        }
        return response()->json(['msg' => 'تم استرداد البيانات', 'data' => $user, 'success' => true]);
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
            return  response()->json(['msg' => 'لا يوجد مستخدم بهذا الرقم', 'data' => [], 'success' => false], 404);
        }
        $data = $request->except('_token','_method');
        $user = User::where('id',$authUser->id)->update($data);
        $user = User::find($authUser->id);
        return response()->json(['msg' => 'تم تحديث البيانات بنجاح', 'data' => $user, 'success' => true]);
    }

    public function delete()
    {
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        if(empty($user)){
            return  response()->json(['msg' => 'لا يوجد مستخدم بهذا الرقم', 'data' => [], 'success' => false], 404);
        }
        User::where('id',$authUser->id)->delete();
        return response()->json(['msg' => 'تم حذف الحساب بنجاح', 'data' => $user, 'success' => true]);
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
        return response()->json(['msg' => 'تم تغيير كلمة المرور بنجاح', 'data' => $user, 'success' => true]);
    }

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email'=>['required','email','exists:users']
        ]);
        $user = User::where('email',$request->all()['email'])->first();
        $token = $user->createToken($user->name)->plainTextToken;
        return response()->json(['msg' => 'تمت العمليه بنجاح', 'data' => $token, 'success' => true]);
    }

    public function logoutFromAllDevices()
    {
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        $user->tokens()->delete();
        return response()->json(['msg' => 'تم تسجيل الخروج من كافة الاجهزه', 'data' => $user, 'success' => true]);
    }

    public function logout(Request $request)
    {
        $authUser = Auth::guard('sanctum')->user();
        $user = User::find($authUser->id);
        $token = $request->header('Authorization');
        $tokenArray = explode('|',$token);
        $tokenId = str_replace('Bearer ','',$tokenArray[0]);
        $user->tokens()->where('id',$tokenId)->delete();
        return response()->json(['msg' => 'تم تسجيل الخروج بنجاح', 'data' => [$user,$tokenId], 'success' => true]);
    }

}
