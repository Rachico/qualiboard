
@extends('layouts.master')

@section('content')
    <div class="flex">

        <div class="w-full flex-1 ml-4 mr-4">
            <h1 class="font-bold text-2xl mb-4 mt-4">Modifer mon projet</h1>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ $project->path() }}">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Nom
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text"
                        name="title"
                        placeholder="Nom du projet"
                        value="{{$project->title}}"
                        requiredmana

                    >
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Description
                    </label>
                    <textarea
                        style="min-height: 100px"
                        class="shadow appearance-none border border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        name="description"
                        placeholder="Description du projet"
                        required

                    >{{$project->description}}</textarea>

                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >Enregistrer</button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ $project->path()}}">
                        Annuler
                    </a>
                </div>
                @if($errors->any())
                    <div class="mt-4">
                        @foreach($errors->all() as $error)
                            <h6 class="text-sm text-red-700">{{ $error }}</h6>
                        @endforeach
                    </div>
                @endif

            </form>

        </div>
    </div>
@endsection

