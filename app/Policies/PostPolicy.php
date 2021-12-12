<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Post $post)//the current authenticated user and the post model that we want to delete
    {
        return $user->id === $post->user_id;
    }
}
