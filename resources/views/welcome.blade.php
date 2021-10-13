@extends('layouts.app')

@section('content')
    <div class="w-50 d-flex justify-content-center align-items-center" >
        <div class="w-100">
            <h1 class="display-4 text-white mb-3 text-center font-weight-bold">Todo App</h1>
            <h5 class="text-white text-center">What next? Add something to your list</h5>
            <form action="{{route('todo.store')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="title"
                           class="form-control form-control-lg"
                            placeholder="Type here..."
                            aria-label="Recipient's username"
                            aria-describedby="button-addon2"
                    >
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-addon2">
                            Add to the list
                        </button>
                    </div>
                </div>
            </form>
            <h4 class="text-white text-center pt-2">My Todo list</h4>
            <div class="bg-white">
                @forelse($todos as $todo)
                    <div class="w-100 d-flex justify-content-between align-items-center px-4 py-2">
                        <div class="">
                            @if ($todo->completed == 0 )
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20"
                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="#c14638" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="9 6 15 12 9 18" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="20" height="20"
                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="#c14638" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M5 12l5 5l10 -10" />
                                </svg>
                            @endif
                            {{$todo->title}}
                        </div>
                        <div class="d-flex align-items-center">
                            @if ($todo->completed == 0 )
                                <form action="{{route('todo.update', $todo->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="completed" value="1" hidden>
                                    <button class="btn btn-success">Mark it as Completed</button>
                                </form>
                                @else
                                <form action="{{route('todo.update', $todo->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="completed" value="0" hidden>
                                    <button class="btn btn-warning">Mark it as Uncompleted</button>
                                </form>
                            @endif
                                <a class="inline-block" href="{{route('todo.edit', $todo->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit ml-2" width="30"
                                         height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#c14638" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg>
                                </a>

                                <form action="{{route('todo.destroy', $todo->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border-0 bg-transparent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="30" height="30"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </form>
                        </div>
                    </div>
                    @empty
                    <p class="p-3 text-center">Nothing added to your todo list</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection()
