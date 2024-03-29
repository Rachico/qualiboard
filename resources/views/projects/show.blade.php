@extends('layouts.master')

@section('content')

    <header class="flex items-center mb-0 py-4 mx-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-gray-600 text-lg font-normal">
                Tâches
            </p>

            <a href="{{ $project->path() . '/edit' }}"
               class="bg-blue-700 px-3 py-2 text-white rounded text-sm"
            >
                Modifier le projet
            </a>
        </div>
    </header>
       <div class="lg:flex flex-wrap align-items-center">

           <div class="lg:w-3/4 px-3 py-3">

                @foreach($project->tasks as $task)
                   <form action="{{ $task->path() }}" method="POST">
                       @csrf
                       @method('PATCH')
                       <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3">
                           <div class="text-md mb-1 -ml-6 border-l-4 border-blue-700 pl-4 py-2 flex align-items-center">
                               <input type="text" value="{{$task->body}}" name="body" class="w-full {{ $task->completed ? 'line-through' : '' }}">
                               <input type="checkbox" name="completed" class="mt-1 ml-1" {{ $task->completed ? 'checked' : '' }} onchange="this.form.submit()">

                           </div>
                       </div>
                   </form>

               @endforeach
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input
                                type="text"
                                name="body"
                                placeholder="Ajouter une tâche à ce projet..."
                                class="w-full"
                            >
                        </form>

                    </div>


               <h2 class="text-lg text-gray-600 mt-5 ml-1 mb-3">Notes</h2>

                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <textarea
                            class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3 w-full"
                            placeholder="Prenez des notes pour suivre l'avancement de votre projet !"
                            style="min-height: 200px"
                            name="notes"
                        >{{$project->notes}}</textarea>
                        <button type="submit" class="bg-blue-700 px-3 py-2 text-white rounded text-sm">Enregistrer</button>
                    </form>



           </div>

           <div class="lg:w-1/4 px-3 py-6">
               @include('projects._card')

               <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 mt-3 text-xs">
                   <ul>
                       @foreach($project->activity as $activity)
                           <li class="{{ $loop->last ? '' : 'mb-1' }}">{{ $activity->description }}</li>
                       @endforeach
                   </ul>

               </div>
           </div>
       </div>


@endsection
