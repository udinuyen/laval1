<?php

namespace App\Interfaces;

use App\Models\Post;

interface SocialMediaServiceInterface {
    public function share(Post $post);
}