<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $frais = AssociationField::new("frais");
        $societe = TextField::new('societe');

        if (Crud::PAGE_INDEX === $pageName) {

                return [$frais,$societe];
        }else if
            (Crud::PAGE_EDIT === $pageName) {

                return [$societe];
        }else if
            (Crud::PAGE_DETAIL === $pageName) {

            return [$societe,$frais];
    }
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            
            ->setEntityLabelInPlural('Clients')

            // the Symfony Security permission needed to manage the entity
            // (none by default, so you can manage all instances of the entity)
            ->setEntityPermission("ROLE_USER")
            
        ;
    }
}
