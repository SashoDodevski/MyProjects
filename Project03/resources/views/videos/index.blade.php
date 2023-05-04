@extends('layouts.app')

@section('content')
<div class="flex flex-row justify-center grow bg-gray-50">
        <div class="basis-2/3 text-center">
            <h1 class="mt-10 text-2xl text-black">Videos</h1>

            <div class="text-start">
                <a type="button" href="{{ route('videos.create')}}" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-small rounded-lg text-sm px-5 py-1.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800 mb-6 mx-auto">Add new video</a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:gap-6">
            @foreach($videos as $video)
                <div class="flex flex-col mx-auto my-5 border rounded-lg w-full motion-safe:hover:scale-[1.05] transition-all duration-250 bg-gray-50 p-2 overflow-hidden">
                    <div class="w-full bg-gray-50">
                    <a href="{{ route('videos.show', $video)}}" class="w-full"><img class="object-cover w-full rounded-t-lg" src="{{ asset('storage/'.$video->image) }}" alt=""></a>
                    </div>
                    <div class="flex flex-col p-4 leading-normal text-start w-full bg-gray-50">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="{{ route('videos.show', $video)}}">{{ $video->name}}</a></h5>
                        <p class="mb-3 text-xs text-gray-700 dark:text-gray-400">Video URL: <br><a href="{{ $video->video_url}}" class="text-indigo-700 dark:text-indigo-400 hover:border-b hover:border-indigo-700">{{ $video->video_url}}</a></p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

    </div>
@endsection