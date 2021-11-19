<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\About;
use App\Entity\Compagny;
use App\Entity\User;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ogami Studios');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('About-us', 'fas fa-user-tie', About::class);
        yield MenuItem::linkToCrud('Compagnies', 'fas fa-building', Compagny::class);
        # yield MenuItem::linkToCrud('Illustration', 'fas fa-newspaper', Illustration::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
    }
}
