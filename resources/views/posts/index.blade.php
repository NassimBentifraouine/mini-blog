<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blog') }}
            </h2>

            @auth
            <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 focus:outline-none focus:border-primary-700 focus:ring focus:ring-primary-200 active:bg-primary-700 disabled:opacity-25 transition">
                {{ __('Créer un post') }}
            </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($posts->isEmpty())
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <p class="p-6 text-center text-gray-500">
                    {{ __("Il n'y a aucun post pour le moment.") }}
                </p>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($posts as $post)
                <article class="flex flex-col h-full bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">

                    <a href="{{ route('posts.show', $post) }}">
                        @if ($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image pour {{ $post->title }}"
                             class="w-full h-48 object-cover">
                        @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.008 3.75h.008v.008h-.008v-.008Zm.008 3.75h.008v.008h-.008v-.008Zm.008 3.75h.008v.008h-.008v-.008Z" />
                            </svg>
                        </div>
                        @endif
                    </a>

                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold mb-2">
                            <a href="{{ route('posts.show', $post) }}" class="text-gray-900 hover:text-primary-600">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm flex-grow">
                            {{ Str::limit($post->content, 120) }}
                        </p>
                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <p class="text-xs text-gray-500">
                                Par <strong>{{ $post->user->name }}</strong>
                                le {{ $post->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>

                </article>
                @endforeach

            </div>

            <div class="mt-12">
                {{ $posts->links() }}
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
