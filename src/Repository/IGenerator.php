<?php
declare(strict_types=1);

namespace App\Repository;
use App\Models\Post;

interface IGenerator
{
    public function GeneratePost(): Post;
}