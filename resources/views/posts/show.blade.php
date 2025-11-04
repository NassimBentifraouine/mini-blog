<x-app-layout>

    <div class="py-12 bg-white">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 px-4 sm:px-0">
                {{ $post->title }}
            </h1>

            <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center px-4 sm:px-0">

                <div class="flex items-center space-x-4 text-sm text-gray-500">
                    <span>
                        Par <strong>{{ $post->user->name }}</strong>
                    </span>
                    <span class="hidden sm:inline">·</span>
                    <span>
                        {{ $post->created_at->format('d/m/Y') }}
                    </span>
                    @if($post->published_at == null)
                    <span class="ml-2 px-2 py-0.5 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">
                            Brouillon
                        </span>
                    @endif
                </div>

                <div class="flex items-center space-x-2 mt-4 sm:mt-0">
                    @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}" class="inline-flex items-center px-3 py-1.5 bg-orange-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 focus:outline-none focus:border-yellow-600 focus:ring focus:ring-yellow-200 active:bg-yellow-500 transition">
                        {{ __('Modifier') }}
                    </a>
                    @endcan
                    @can('delete', $post)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 transition">
                            {{ __('Supprimer') }}
                        </button>
                    </form>
                    @endcan
                </div>
            </div>

            @if ($post->image_path)
            <div class="mt-8">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image pour {{ $post->title }}"
                     class="w-full h-auto rounded-lg shadow-lg">
            </div>
            @endif

            <div class="mt-12">
                <div class="prose prose-lg max-w-none text-gray-800">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
