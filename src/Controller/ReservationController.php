<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Services;
use App\Entity\Users;
use App\Controller\SecurityController;
use App\Form\ReservationFormType;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReservationRepository;
use App\Repository\ReservationTimeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        ReservationRepository $reservationRepository,
        ManagerRegistry $doctrine,
        SecurityController $security
        ): Response
    {
        $entityManager = $doctrine->getManager();
        $reservation = new Reservation();
        $form = $this->createForm(ReservationFormType::class, $reservation);

        //NE FONCTIONNE PAS !!!!!!
        //Je récupère les infos de l'utilisateur connecté pour les pré-remplir dans le formulaire.
        // if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
        //     $user = $security->getUser();
        //     $email = $user->getEmail();
        //     $name = $user->getName();
        //     $firstname = $user->getFirstname();
        //     $defaultNumberOfGuests = $user->getDefaultNumberOfGuests();
        //     //Problème pour gérer les allergies car table de jointure ????
        //     //$allergy = $user->getAllergy();
        //     //dd($user, $email, $name, $firstname, $defaultNumberOfGuests);

        //     //$reservation->setUser($user);
        //     $reservation->setEmail($email);
        //     $reservation->setName($name);
        //     $reservation->setFirstname($firstname);
        //     $reservation->setNumberOfGuests($defaultNumberOfGuests);
        //     //$reservation->addAllergy($allergy);
        //     //dd($reservation);
        //}

        // $service = "midi";
        // $date = new \DateTime('2021-09-01');
        // $qb = $this->createQueryBuilder('r')
        // ->select('SUM(r.numberOfGuests)')
        // ->andWhere('r.serviceId = :service')
        // ->andWhere('r.reservationDate = :date')
        // ->setParameter('service', $service)
        // ->setParameter('date', $date->format('Y-m-d'));
    
        // $test = $qb->getQuery()->getSingleScalarResult();


        //$resasbdd = $reservationRepository->findAll();
        $testNumberOfGuests = $reservationRepository->findAll(['numberOfGuests' => 3]);
        //$testDate = $reservationRepository->findOneBy(['reservationDate' => ])->getReservationDate();
        //$testService = $reservationRepository->findOneBy(['service' => 1])->getService();
        //Cette ligne crée une erreur lors de la réservation.
        //$numberOfGuests = $reservationRepository->countNbrOfPeople("1");
        //$numberOfGuests = $reservationRepository->findOneBySomeField("midi");
        // $testName = $reservationRepository->findOneBy(['name' => 'Weasley'])->getName();
    
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'reservationForm' => $form->createView(),
            //'test' => $test,
            //'resasbdd' => $resasbdd,
            // 'testName' => $testName,
        ]);
    }
}
