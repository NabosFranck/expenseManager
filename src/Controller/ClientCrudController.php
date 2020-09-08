<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientCrudController extends AbstractCrudController
{
    
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    public function configureFields(string $pageName ): iterable
    {
        // $total = $this->getDoctrine()->getRepository(Frais::class)->findAll();
        // $totalt = $this->clientRepository->totalFraisClient($total);
       
        return [
            TextField::new('societe'),
            AssociationField::new("frais")->hideOnForm(),
        ];
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

    // public function fraisAll(){
    //     $total = $this->getDoctrine()->getRepository(Frais::class)->findAll();
    //     dd($total);
    // }

}
