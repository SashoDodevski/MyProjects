<x-app-layout>
    @section('content')

    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 w-11/12 md:w-10/12 lg:w-8/12 mx-auto">
        <ul class="flex flex-wrap">
            <li class="mr-2">
                <a id="createProjectBtn" href="#AddProject" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500">Add Project</a>
            </li>
            <li class="mr-2">
                <a id="editProjectBtn" href="#EditProject" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Edit Project</a>
            </li>
        </ul>
    </div>


    <div id="createProjectDiv" class="flex flex-col justify-center items-left grow w-11/12 md:w-10/12 lg:w-8/12 mx-auto my-auto">
        <h2 class="text-2xl font-semibold text-left m-2">Create new project:</h2>
        <form method="POST" action="{{ route('projects.store') }}" class="w-11/12 md:w-2/3 lg:w-1/2 mx-auto py-3">
            @csrf
            @if(Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 text-center w-full" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            <!-- Title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Subtitle -->
            <div class="mt-2">
                <x-input-label for="subtitle" :value="__('Subtitle')" />
                <x-text-input id="subtitle" class="block mt-1 w-full" type="text" name="subtitle" :value="old('subtitle')" required autofocus autocomplete="subtitle" />
                <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
            </div>

            <!-- Image url -->
            <div class="mt-2">
                <x-input-label for="image" :value="__('Image URL')" />
                <x-text-input id="image" class="block mt-1 w-full" type="url" name="image" :value="old('image')" required autofocus autocomplete="image" placeholder="https://" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <!-- Project url -->
            <div class="mt-2">
                <x-input-label for="url" :value="__('Project URL')" />
                <x-text-input id="url" class="block mt-1 w-full" type="url" name="url" :value="old('url')" required autofocus autocomplete="url" placeholder="https://" />
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-2">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" class="block mt-1 w-full rounded border-gray-300" type="textarea" rows="4" name="description" :value="old('description')" required autofocus autocomplete="description"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    Create
                </x-primary-button>
            </div>
        </form>
    </div>

    <div id="editProjectDiv" class="hidden w-11/12 md:w-10/12 lg:w-8/12 mx-auto py-0">
        <h2 class="text-2xl font-semibold text-left m-2">Edit project:</h2>
        <div class="space-y-6 md:grid md:space-y-0 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-4 w-full mx-auto py-8">
            @foreach($projects as $project)
            <div class="p-4 card_container">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto mt-0 mb-auto card">
                    <img class="rounded-t-lg" src="{{ $project->image }}" alt="" />
                    <div class="p-5">
                        <a>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white first-letter:capitalize">{{ $project->title }}</h5>
                        </a>
                        <p class="font-16 font-semibold my-3 text-gray-500 text-sm">{{ $project->subtitle }}</p>

                        <p class="mb-3 font-small text-gray-700 dark:text-gray-400 truncate">{{ $project->description }}</p>

                        <div class="flex editProjectBtns">
                            <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-1.5 mr-2 mb-2 dark:focus:ring-yellow-900 hidden editProjectButton">
                                Edit
                            </button>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 hidden deleteProjectButton">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            <div class="hidden border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form method="POST" action="{{ route('projects.update', $project) }}" class="w-11/12 mx-auto py-3 editForm">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$project->title" required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Subtitle -->
            <div class="mt-2">
                <x-input-label for="subtitle" :value="__('Subtitle')" />
                <x-text-input id="subtitle" class="block mt-1 w-full" type="text" name="subtitle" :value="$project->subtitle" required autofocus autocomplete="subtitle" />
                <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
            </div>

            <!-- Image url -->
            <div class="mt-2">
                <x-input-label for="image" :value="__('Image URL')" />
                <x-text-input id="image" class="block mt-1 w-full" type="url" name="image" :value="$project->image" required autofocus autocomplete="image" placeholder="https://" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <!-- Project url -->
            <div class="mt-2">
                <x-input-label for="url" :value="__('Project URL')" />
                <x-text-input id="url" class="block mt-1 w-full" type="url" name="url" :value="$project->url" required autofocus autocomplete="url" placeholder="https://" />
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-2">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" class="block mt-1 w-full rounded border-gray-300" type="textarea" rows="4" name="description" :value="$project->description" required autofocus autocomplete="description">{{$project->description}}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    Update
                </x-primary-button>
                <button type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 mt-3 py-2 ml-2 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 cancelForm">Cancel</button>
            </div>
        </form>
        </div>
        </div>
            @endforeach

        </div>
    </div>


    @endsection

</x-app-layout>