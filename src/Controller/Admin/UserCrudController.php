<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('firstname'),
            TextField::new('lastname'),
            # TextField::new('password'),
            TextField::new('email'),
            TextField::new('adress'),
            TextField::new('city'),
            TextField::new('state'),
            NumberField::new('phoneNumber'),
            TextField::new('jobName'),

    /*        DateTimeField::new('createdAt')->setFormTypeOptions([
                        'html5' => true,
                        'years' => range(date('Y'), date('Y') + 5),
                        'widget' => 'single_text',
            ]),
            # created_at
            # TextField::new('compagny'),*/
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['lastname' => 'DESC']);
    }
    
}
