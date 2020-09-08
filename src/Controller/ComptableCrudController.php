<?php

namespace App\Controller;

use App\Entity\Comptable;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ComptableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comptable::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('password')->onlyWhenCreating(),
            TextField::new('email')->onlyOnForms(),
            TextField::new('nom'),
            TextField::new('prenom')
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Comptables')
            ->setEntityPermission("ROLE_ADMIN")
        ;
    }
}
