@extends('layouts.master')

@section('content')

    <header class="flex items-center mb-1 py-4 mx-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-gray-500 text-lg font-normal">
                Projets
            </p>

            <a href="/projects/create"
               class="bg-blue-700 px-3 py-2 text-white rounded text-sm"
            >
                Nouveau Projet
            </a>
        </div>
    </header>

    <div class="flex flex-wrap">
        @forelse($projects as $project)
            <div class="w-full md:w-1/2 xl:w-1/4 p-3">

                @include('projects.card')

            </div>
        @empty
            <p>No projects yet.</p>
        @endforelse
    </div>



@endsection




