<?php


namespace App\Models;


use DateTime;

class Post
{

    public function __construct(string $title, string $body, string $imageUrl, string $author, string $avatar)
    {
        $this->title = $title;
        $this->body = $body;
        $this->imageUrl = $imageUrl;
        $this->author = $author;
        $this->avatar = $avatar;
        $this->creationTime = new DateTime();
    }

    public $title;

    public $body;

    public $author;

    public $avatar;

    public $creationTime;

    public $imageUrl;

}