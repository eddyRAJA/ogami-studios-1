<?php

namespace App\Controller\Admin;

use App\Entity\Illustration;
use App\Entity\Studio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class StudioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Studio::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextEditorField::new('description'),
            ImageField::new('studioFrontPicture','image')->setUploadDir('/public/uploads/')->setBasePath('uploads/'),
            ImageField::new('studioIndoorPicture','image')->setUploadDir('/public/uploads/')->setBasePath('uploads/'),
            ImageField::new('studioBackgroundPicture','image')->setUploadDir('/public/uploads/')->setBasePath('uploads/'),
            DateTimeField::new('created_at')->onlyOnIndex(),
            DateTimeField::new('updated_at')->onlyOnIndex(),
            SlugField::new('slug')->setTargetFieldName('name')->hideOnForm(),
            
        ];
    }
   
}
