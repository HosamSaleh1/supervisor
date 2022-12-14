@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-2 container">
    @if($tasks->count() > 0)
        <div class="table-responsive text-nowrap p-5">
        <table class="table table-hover text-center">
            <thead>
                @foreach ($tasks as $task)
                    @foreach ($task as $key => $val )
                        <th>{{ $key }}</th>
                    @endforeach
                    @break
                @endforeach
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($tasks as $task)
                <tr>
                    @foreach ($task as $key => $val)
                        <td>
                            @if ($key == 'name')
                                {{ $val }}
                            @else
                                <input type='text' name="description" value="{{ $val }}">
                            @endif
                        </td>
                    @endforeach
                        <td>
                            <div class="">
                                <form action="{{route('submit',$task->id)}}" method="POST" class="col-4 d-inline" id="updateForm">
                                @csrf
                                    <button type="submit" class="">Submit</button>
                                </form>
                            </div>
                        </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
        </div>
    </div>
    @else
        <div class="card-body">
            <h3 class="text-center">No Tasks</h3>
        </div>
    @endif
  
@endsection
