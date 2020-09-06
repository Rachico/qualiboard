@extends('layouts.master')

@section('content')


       <div class="lg:flex flex-wrap">
           <div class="lg:w-3/4 px-3 py-3">

               <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3">
                   <h1 class="text-md mb-1 -ml-6 border-l-4 border-blue-700 pl-4 py-2">
                       Task 1
                   </h1>
               </div>
               <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3">
                   <h1 class="text-md mb-1 -ml-6 border-l-4 border-blue-700 pl-4 py-2">
                       Task 1
                   </h1>
               </div>
               <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3">
                   <h1 class="text-md mb-1 -ml-6 border-l-4 border-blue-700 pl-4 py-2">
                       Task 1
                   </h1>
               </div>
               <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200 my-3">
                   <h1 class="text-md mb-1 -ml-6 border-l-4 border-blue-700 pl-4 py-2">
                       Task 1
                   </h1>
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
