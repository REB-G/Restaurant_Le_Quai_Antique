<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JSONResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class APIController extends AbstractController
{
    #[Route('/api', name: 'app_a_p_i')]
    public function index(
        Request $request,
        ManagerRegistry $doctrine,
        EntityManagerInterface $entityManager
    ): JSONResponse
    {
        $entityManager = $doctrine->getManager();
        $reservation = new Reservation();
        $form = $this->createForm(ReservationFormType::class, $reservation);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $reservation = $form->getData();
            $entityManager->persist($reservation);
            $entityManager->flush();
            
            return $this->json([
                'status' => 'ok',
                'message' => 'Réservation effectuée avec succès !',
            ]);
        } else {
            return $this->json([
                'status' => 'nok',
                'message' => 'Impossible d\'effectuer la réservation, nombre de places disponibles insuffisant !',
            ]);
        }
        return $this->json([]);
    }
}
