<?php

namespace App\Services;

use App\Models\Post;
use App\Interfaces\SocialMediaServiceInterface;

class TwitterService implements SocialMediaServiceInterface {
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function share(Post $post)
    {
        dd('shared on Twitter!');
    }
}
