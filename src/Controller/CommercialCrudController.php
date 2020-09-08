<?php

namespace App\Controller;

use App\Entity\Commercial;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommercialCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commercial::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('password')->onlyWhenCreating(),
            TextField::new('email'),
            TextField::new('nom'),
            TextField::new('prenom')
        ];
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Commerciaux')
            ->setEntityPermission("ROLE_USER")
            ->setPaginatorPageSize(5)
        ;
    }

}
