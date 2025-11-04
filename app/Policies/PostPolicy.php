<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Détermine si l'utilisateur peut voir tous les posts.
     * (Pas utilisé par un contrôleur resource, mais bon à savoir)
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut voir un post spécifique.
     * Note : 'show' est public, donc cette règle s'applique si l'utilisateur
     * est connecté. Les invités sont gérés par le middleware 'auth' dans le contrôleur.
     */
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut créer un post.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut modifier (update) le post.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Détermine si l'utilisateur peut supprimer le post.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Détermine si l'utilisateur peut restaurer un post (si SoftDeletes est utilisé).
     */
    public function restore(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Détermine si l'utilisateur peut supprimer définitivement un post.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }
}
