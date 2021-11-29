<?php

namespace App\Controller\Admin;

use App\Entity\About;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AboutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return About::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('slogan'),
            TextEditorField::new('avatarFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('avatar')->setUploadDir('/public/uploads/about/')->setBasePath('uploads/about')->onlyOnIndex(),
            TextEditorField::new('description'),
            UrlField::new('facebook'),
            UrlField::new('linkedin'),
            UrlField::new('instagram'),
            UrlField::new('twitter'),
        ];
    }
    
}
