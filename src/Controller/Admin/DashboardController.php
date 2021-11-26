<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\About;
use App\Entity\ArticleBlog;
use App\Entity\ArticleBlogCategory;
use App\Entity\Compagny;
use App\Entity\Contact;
use App\Entity\Equipment;
use App\Entity\EquipmentCategory;
use App\Entity\Gallery;
use App\Entity\Illustration;
use App\Entity\News;
use App\Entity\Newsletter;
use App\Entity\Studio;
use App\Entity\Team;
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
        # yield MenuItem::linkToCrud('s', 'fas fa-users', ::class);
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Compagnies', 'fas fa-building', Compagny::class);
        yield MenuItem::linkToCrud('Galeries', 'fas fa-users', Gallery::class);
        yield MenuItem::linkToCrud('Illustrations', 'fas fa-newspaper', Illustration::class);
        yield MenuItem::linkToCrud('Studios', 'fas fa-newspaper', Studio::class);
        yield MenuItem::linkToCrud('EquipmentCategories', 'fas fa-newspaper', EquipmentCategory::class);
        yield MenuItem::linkToCrud('About-us', 'fas fa-user-tie', About::class);
        yield MenuItem::linkToCrud('Equipments', 'fas fa-users', Equipment::class);
        yield MenuItem::linkToCrud('ArticleBlogCategories', 'fas fa-users', ArticleBlogCategory::class);
        yield MenuItem::linkToCrud('ArticleBlogs', 'fas fa-users', ArticleBlog::class);
        yield MenuItem::linkToCrud('Teams', 'fas fa-users', Team::class);
        yield MenuItem::linkToCrud('News', 'fas fa-users', News::class);
        yield MenuItem::linkToCrud('Newsletters', 'fas fa-users', Newsletter::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-users', Contact::class);
    }
}
