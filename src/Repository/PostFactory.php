<?php


namespace App\Repository;


use App\Models\Post;

final class PostFactory
{
    public static function factory(): IGenerator
    {
        return new PostGenerator();
    }
}