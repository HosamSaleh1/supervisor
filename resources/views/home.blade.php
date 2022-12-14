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
    @if($tasks)
        <div class="table-responsive text-nowrap p-5">
        <table class="table table-hover text-center">
            <thead>
                @foreach ($tasks as $task)
                    @foreach ($task as $key => $val )
                        {{-- @if ($key == 'id')
                            <th> ID </th>
                        @elseif ($key == 'name')
                            <th> Name </th>
                        @elseif ($key == 'description')
                            <th> Description </th>
                        @endif
                        @continue --}}
                        <th> {{ $key }} </th>
                    @endforeach
                    @break
                @endforeach
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($tasks as $task)
                <tr>
                    @foreach ($task as $key => $val)
                        <td>
                            @if ($key == 'ID')
                                {{ $val }}
                            @elseif ($key == 'Name')
                                {{ $val }}
                            @elseif ($key == 'Description')
                                <input type='text' name="description" id="description1" value="{{ $val }}">
                            @endif
                            @continue
                        </td>
                    @endforeach
                        <td>
                            <div class="">
                                <form action="{{route('submit',$task->ID)}}" method="POST" class="col-4 d-inline" id="updateForm">
                                @csrf
                                    <input type="hidden" name="description" value="" id="description2">
                                    <button type="submit" class="btn btn-success" onclick="updateDescription()">Submit</button>
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

<script>
    function updateDescription(id) {
        var description = document.getElementById('description1').value;
        document.getElementById('description2').value = description;
    }
</script>