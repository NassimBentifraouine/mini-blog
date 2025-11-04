<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blog') }}
            </h2>

            @auth
            <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-600 focus:outline-none focus:border-orange-700 focus:ring focus:ring-orange-200 active:bg-orange-600 disabled:opacity-25 transition">
                {{ __('Créer un post') }}
            </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($posts->isEmpty())
                    <p class="text-center text-gray-500">
                        {{ __("Il n'y a aucun post pour le moment.") }}
                    </p>
                    @else
                    <div class="space-y-6">
                        @foreach ($posts as $post)
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-4 bg-gray-50 rounded-lg shadow-sm">

                            @if ($post->image_path)
                            <div class="md:col-span-1">
                                <a href="{{ route('posts.show', $post) }}">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image pour {{ $post->title }}" class="w-full h-32 object-cover rounded-lg">
                                </a>
                            </div>
                            @endif

                            <div class="{{ $post->image_path ? 'md:col-span-3' : 'md:col-span-4' }}">
                                <div class="flex justify-between items-baseline">
                                    <h3 class="text-xl font-semibold">
                                        <a href="{{ route('posts.show', $post) }}" class="text-orange-600 hover:text-orange-800">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <span class="text-sm text-gray-500">
                                                {{ $post->created_at->format('d/m/Y') }}
                                            </span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">
                                    Par {{ $post->user->name }}
                                </p>
                                <p class="mt-3 text-gray-700">
                                    {{ Str::limit($post->content, 200) }}
                                </p>
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $posts->links() }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
