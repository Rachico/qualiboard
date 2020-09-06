
@extends('layouts.master')

@section('content')
    <div class="container m-4">
        <h1 class="uppercase">Create a Project</h1>

        <form class="w-full max-w-sm" method="POST" action="/projects">
            @csrf

            <div class="flex items-center border-b border-blue-500 py-2">
                <input
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                    type="text"
                    placeholder="Title"
                    aria-label="Full name"
                    name="title"
                >
            </div>

            <div class="flex items-center border-b border-teal-500 py-2">
                <input
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                    type="text"
                    placeholder="Description"
                    aria-label="Full name"
                    name="description"
                >
                <button
                    class="flex-shrink-0 bg-blue-700 hover:bg-blue-400 border-blue-700 hover:border-blue-400 text-sm border-4 text-white py-1 px-2 rounded"
                    type="submit">
                    Submit
                </button>
                <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded">
                    <a href="/projects">Cancel</a>
                </button>
            </div>
        </form>


    </div>
@endsection

