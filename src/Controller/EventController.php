<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController
{
    /**
     * @Route("/api/events")
     */
    public function get(): Response
    {
        return new Response(
            '<html><body><h1>Event</h1></body></html>'
        );
    }
}