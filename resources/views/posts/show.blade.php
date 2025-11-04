<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4 sm:mb-0">
                {{ $post->title }}
            </h2>

            <div class="flex items-center space-x-2">
                @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 focus:outline-none focus:border-yellow-600 focus:ring focus:ring-yellow-200 active:bg-yellow-500 disabled:opacity-25 transition">
                    {{ __('Modifier') }}
                </a>
                @endcan
                @can('delete', $post)
                <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit">
                        {{ __('Supprimer') }}
                    </x-danger-button>
                </form>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($post->image_path)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image pour {{ $post->title }}" class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow-lg">
                    </div>
                    @endif

                    <div class="mb-6 text-sm text-gray-600">
                        <p>
                            <strong>Auteur :</strong> {{ $post->user->name }}
                        </p>
                        <p>
                            <strong>Créé le :</strong> {{ $post->created_at->format('d/m/Y \à H:i') }}
                        </p>
                        @if ($post->published_at)
                        <p>
                            <strong>Publié le :</strong> {{ $post->published_at->format('d/m/Y \à H:i') }}
                        </p>
                        @else
                        <p>
                            <strong class="text-red-500">Statut :</strong> Brouillon
                        </p>
                        @endif
                    </div>

                    <div class="prose max-w-none">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
