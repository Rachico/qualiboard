@extends('layouts.master')

@section('content')


       <div class="lg:flex flex-wrap">
           <div class="lg:w-3/4 px-3 py-3">
                @foreach($project->tasks as $task)
                   <form action="{{ $project->path() . '/tasks/' . $task->id }}" method="POST">
                       @csrf
                       @method('PATCH')
                       <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3">
                           <div class="text-md mb-1 -ml-6 border-l-4 border-blue-700 pl-4 py-2 flex align-items-center">
                               <input type="text" value="{{$task->body}}" name="body" class="w-full">
                               <input type="checkbox" name="completed" class="mt-1 ml-1" onchange="this.form.submit()">

                           </div>
                       </div>
                   </form>

               @endforeach
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input type="text" name="body" placeholder="Ajouter une tâche à ce projet..." class="w-full">
                        </form>

                    </div>


               <h2 class="text-lg text-gray-600 mt-5 ml-1">Notes</h2>

               <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3">
                   Must be done ASAP !
               </div>



           </div>

           <div class="lg:w-1/4 px-3 py-6">
               @include('projects.card')
           </div>
       </div>


@endsection
