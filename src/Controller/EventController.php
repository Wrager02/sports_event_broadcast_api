<?php

namespace App\Controller;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class EventController extends AbstractController
{
    /**
     * @Route("/api/events/{id}", methods={"GET"})
     * @param int $id
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function getEvent(int $id, SerializerInterface $serializer): Response
    {
        $event = $this->getDoctrine()
            ->getRepository(Event::class)
            ->find($id);

        if (!$event) {
            throw $this->createNotFoundException(
                'No event found for id '.$id
            );
        }

        $jsonEvent = $serializer->serialize($event, 'json');

        return new Response($jsonEvent);
    }
}