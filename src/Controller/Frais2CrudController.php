<?php

namespace App\Controller;

use App\Entity\Frais;
use App\Form\JustifType;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class Frais2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Frais::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('Etat'),
            NumberField::new('Trajet'),
            NumberField::new('Nuit'),
            NumberField::new('Repas'),
            AssociationField::new('commercial'),
            AssociationField::new('client'),
            DateTimeField::new('createdAt'),
            TextField::new('justificatifs'),
        ];
    }


public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInPlural('Frais')
            // the Symfony Security permission needed to manage the entity
            // (none by default, so you can manage all instances of the entity)
            ->setEntityPermission("ROLE_USER")
            
        ;
    }
}
