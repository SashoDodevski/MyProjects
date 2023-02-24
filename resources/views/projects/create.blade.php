<x-app-layout>
    @section('content')
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 w-11/12 md:w-10/12 lg:w-8/12 mx-auto">
        <ul class="flex flex-wrap">
            <li class="mr-2">
                <a href="{{ route('project.create') }}" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500">Add Project</a>
            </li>
            <li class="mr-2">
                <a href="{{ route('project.edit') }}" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Edit Project</a>
            </li>
        </ul>
    </div>

    <div class="flex flex-col justify-center items-center grow w-11/12 md:w-10/12 mx-auto my-auto">
        <form method="POST" action="{{ route('projects.store') }}" class="lg:w-1/3 w-11/12 md:w-1/2 mx-auto py-3">
            @csrf

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
                <x-input-label for="image" :value="__('Image')" />
                <x-text-input id="image" class="block mt-1 w-full" type="url" name="image" :value="old('image')" required autofocus autocomplete="image" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <!-- Project url -->
            <div class="mt-2">
                <x-input-label for="url" :value="__('Url')" />
                <x-text-input id="url" class="block mt-1 w-full" type="url" name="url" :value="old('url')" required autofocus autocomplete="url" />
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

    
    @endsection

</x-app-layout>