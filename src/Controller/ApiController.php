<?php

namespace App\Controller;

use App\Models\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class ApiController extends AbstractController
{

    /**
     * @Route(path="/api/feed", methods={"GET"})
     * @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(new Post());

    }
}
