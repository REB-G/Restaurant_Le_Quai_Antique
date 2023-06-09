<?php

namespace App\Controller\Admin;

use App\Entity\Menus;
use App\Entity\Users;
use App\Entity\Dishes;
use App\Entity\HomePage;
use App\Entity\Services;
use App\Entity\Allergies;
use App\Entity\Categories;
use App\Entity\Restaurant;
use App\Entity\OpeningDays;
use App\Entity\Reservation;
use App\Entity\FamousDishes;
use App\Entity\ReservationTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Restaurant Le Quai Antique - Administration')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Page d\'accueil', 'fas fa-list', HomePage::class);
        yield MenuItem::LinkToCrud('Plats de la page d\'accueil', 'fas fa-list', FamousDishes::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-list', Users::class);
        yield MenuItem::linkToCrud('Allergies', 'fas fa-list', Allergies::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categories::class);
        yield MenuItem::linkToCrud('Plats', 'fas fa-list', Dishes::class);
        yield MenuItem::linkToCrud('Menus', 'fas fa-list', Menus::class);
        yield MenuItem::linkToCrud('Réservations', 'fas fa-list', Reservation::class);
        yield MenuItem::linkToCrud('Restaurant', 'fas fa-list', Restaurant::class);
        yield MenuItem::linkToCrud('Jours d\'ouverture', 'fas fa-list', OpeningDays::class);
        yield MenuItem::linkToCrud('Heures possible de réservation', 'fas fa-list', ReservationTime::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-list', Services::class);
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-home', 'app_home_page_index');
        yield MenuItem::linkToLogout('Se déconnecter', 'fa fa-exit');
    }
}
