<?php


namespace App\Models;


class Post
{

    public function __construct()
    {
        $this->title = "Title";
        $this->body = "TestBody";
    }

    public $title;

    public $body;

}