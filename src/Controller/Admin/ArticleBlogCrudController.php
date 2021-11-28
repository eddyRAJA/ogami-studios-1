<?php

namespace App\Controller\Admin;

use App\Entity\ArticleBlog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Symfony\Flex\Path;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleBlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArticleBlog::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnDetail(),
            TextField::new('title'),
            TextField::new('subject'),
            TextEditorField::new('content'),
            TextField::new('illustrationFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('illustration','image')->setUploadDir('/public/uploads/')->setBasePath('uploads/')->onlyOnIndex(),
            AssociationField::new('category'),
            AssociationField::new('author')->onlyOnIndex(),
            SlugField::new('slug')->setTargetFieldName('title')->onlyOnDetail(),
            DateTimeField::new('created_at')->onlyOnIndex()

        ];
    }
    
}
