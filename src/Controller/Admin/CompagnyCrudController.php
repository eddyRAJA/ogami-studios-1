<?php

namespace App\Controller\Admin;

use App\Entity\Compagny;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

class CompagnyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compagny::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            NumberField::new('phoneNumber'),
            EmailField::new('email'),
            TextField::new('adress'),
            TextField::new('city'),
            TextField::new('state'),
            NumberField::new('faxNumber'),
            SlugField::new('slug')->setTargetFieldName('name')->onlyOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['name' => 'DESC']);
    }
    
}
