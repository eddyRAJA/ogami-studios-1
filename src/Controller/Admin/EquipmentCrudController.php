<?php

namespace App\Controller\Admin;

use App\Entity\Equipment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EquipmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipment::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextEditorField::new('description'),
            TextEditorField::new('equipMainPictureFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('equipMainPicture','Main Picture')->setUploadDir('/public/uploads/')->setBasePath('uploads/')->onlyOnIndex(),
            TextEditorField::new('equipSecondpictureFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('equipSecondPicture','SecondPicture')->setUploadDir('/public/uploads/')->setBasePath('uploads/')->onlyOnIndex(),
            TextEditorField::new('equipThirdPictureFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('equipThirdPicture','Third Picture')->setUploadDir('/public/uploads/')->setBasePath('uploads/')->onlyOnIndex(),
            DateTimeField::new('created_at')->onlyOnIndex(),
            DateTimeField::new('updated_at')->onlyOnIndex(),
            AssociationField::new('category')
        ];
    }
  
}
