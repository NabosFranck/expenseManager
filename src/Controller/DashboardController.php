<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\Frais;
use App\Entity\Client;
use App\Entity\Comptable;
use App\Entity\Commercial;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil/layout.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ExpenseManager');
    }

    public function configureCrud(): Crud
    {
        return Crud::new()
            // this defines the pagination size for all CRUD controllers
            // (each CRUD controller can override this value if needed)
            ->setPaginatorPageSize(3);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Administrateurs', 'fas fa-users-cog', Admin::class);
        yield MenuItem::linkToCrud('Comptables', 'fas fa-calculator', Comptable::class);
        yield MenuItem::linkToCrud('Commerciaux', 'fa fa-briefcase', Commercial::class);
        yield MenuItem::linkToCrud('Frais', 'fas fa-file-invoice-dollar', Frais::class);
        yield MenuItem::linkToCrud('Client', 'far fa-address-card', Client::class);
    }
}
