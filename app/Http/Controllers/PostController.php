<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- AJOUTE ÇA

class PostController extends Controller
{
    /**
     * Affiche une liste paginée des posts.
     */
    public function index()
    {
        $posts = Post::with('user')
            ->latest()
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau post.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Enregistre un nouveau post dans la base de données.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $data['image_path'] = $path;
        }

        $request->user()->posts()->create($data);

        return redirect()->route('posts.index')
        ->with('success', 'Article créé avec succès.');
    }

    /**
     * Affiche un post spécifique.
     */
    public function show(Post $post)
    {
        $post->load('user');
        return view('posts.show', compact('post'));
    }

    /**
     * Affiche le formulaire pour modifier un post existant.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Met à jour un post spécifique dans la base de données.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $request->validated();

        if ($request->hasFile('image')) {

            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }

            $path = $request->file('image')->store('posts', 'public');
            $data['image_path'] = $path;
        }

        $post->update($data);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Article mis à jour avec succès.');
    }

    /**
     * Supprime un post spécifique de la base de données.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Article supprimé avec succès.');
    }
}
