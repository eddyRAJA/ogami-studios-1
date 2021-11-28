<?php

namespace App\Controller\Admin;

use App\Entity\Team;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TeamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Team::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('firstname'),
            TextField::new('lastname'),
            EmailField::new('email'),
            TextField::new('jobTitle'),
            TextField::new('city'),
            TextField::new('avatarFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('avatar','image')->setUploadDir('/public/uploads/about/')->setBasePath('uploads/about')->onlyOnIndex(),
            TextField::new('phoneNumber'),
            UrlField::new('facebookLink'),
            UrlField::new('linkedinLink'),
            UrlField::new('twiterLink'),
            UrlField::new('instaLink'),
            DateTimeField::new('created_at')->onlyOnIndex(),
            DateTimeField::new('updated_at')->onlyOnIndex(),
            SlugField::new('slug')->setTargetFieldName('firstname')->hideOnForm(),


        ];
    }
    
}
