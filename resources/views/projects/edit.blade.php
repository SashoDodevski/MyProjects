<x-app-layout>
    @section('content')
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 w-11/12 md:w-10/12 lg:w-8/12 mx-auto">
        <ul class="flex flex-wrap">
            <li class="mr-2">
                <a href="{{ route('projects.create') }}" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500">Add Project</a>
            </li>
            <li class="mr-2">
                <a href="{{ route('projects.edit') }}" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Edit Project</a>
            </li>
        </ul>
    </div>

    <div class="hidden space-y-6 md:grid md:space-y-0 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-4 w-11/12 md:w-10/12 lg:w-8/12 mx-auto py-8">
        @foreach($projects as $project)
        <div class="p-4 card hidden">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto mt-0 mb-auto">
                <img class="rounded-t-lg" src="{{ $project->image }}" alt="" />
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white first-letter:capitalize">{{ $project->title }}</h5>
                    </a>
                    <p class="font-16 font-semibold my-3 text-gray-500 text-sm">{{ $project->subtitle }}</p>

                    <p class="mb-3 font-small text-gray-700 dark:text-gray-400 truncate">{{ $project->description }}</p>
                    <a type="button" href="{{ route('projects.show', $project) }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-4 py-2 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Read more</a>

                </div>
            </div>
        </div>
        @endforeach

    </div>


    @endsection

</x-app-layout>