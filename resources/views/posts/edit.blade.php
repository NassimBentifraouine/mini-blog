<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">{{ __('Oups !') }}</strong>
                        <span class="block sm:inline">{{ __('Il y a des erreurs dans votre formulaire.') }}</span>
                        <ul class="mt-3 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH') <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Titre') }}</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" value="{{ old('title', $post->title) }}" required autofocus>
                        </div>

                        <div class="mt-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Contenu') }}</label>
                            <textarea name="content" id="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>{{ old('content', $post->content) }}</textarea>
                        </div>

                        <div class="mt-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Changer l\'image (optionnel)') }}</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <p class="mt-1 text-sm text-gray-500">{{ __("Formats acceptés : JPG, JPEG, PNG, GIF, WebP. Poids max : 2Mo.") }}</p>

                            @if ($post->image_path)
                            <div class="mt-4">
                                <span class="block text-sm font-medium text-gray-700">Image actuelle :</span>
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image de {{ $post->title }}" class="mt-2 w-full max-w-sm rounded-lg shadow-md">
                            </div>
                            @endif
                        </div>

                        <div class="mt-4">
                            <label for="published_at" class="block text-sm font-medium text-gray-700">{{ __('Date de publication (optionnel)') }}</label>
                            <input type="datetime-local" name="published_at" id="published_at" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                            <p class="mt-1 text-sm text-gray-500">{{ __("Laissez vide pour enregistrer en tant que brouillon.") }}</p>
                        </div>

                        <div class="mt-6">
                            <x-primary-button>
                                {{ __('Mettre à jour') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
