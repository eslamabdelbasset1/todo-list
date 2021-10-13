@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" >
        <div class="w-50">
            <h1 class="display-5 text-white mt-5 mb-3 text-center">Edit your todo called {{$todo->title}}</h1>
            <form action="{{route('todo.update', $todo->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group mb-3 w-100">
                    <input type="text" name="title"
                           class="form-control form-control-lg"
                            value="{{$todo->title}}"
                           aria-label="Recipient's username"
                           aria-describedby="button-addon2"
                    >
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-addon2">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
