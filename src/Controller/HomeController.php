<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mercure\PublisherInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'Home',
        ]);
    }

    /**
     * @Route("/push", name="push")
     */
    public function push(Request $request, PublisherInterface $publisher)
    {
        $update = new Update(
            '/chat',
            json_encode(['messase'=> 'Hello world'])
        );
        $publisher($update);

        return $this->json('Done');
    }
}
