<div class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-200" style="height: 200px">

    <h1 class="text-xl mb-6 -ml-6 border-l-4 border-blue-700 pl-4 py-3">
        <a href="{{ $project->path() }}">
            {{ $project->title }}
        </a>
    </h1>

    <div class="text-gray-600">
        {{ Str::limit($project->description,80) }}
    </div>
</div>
