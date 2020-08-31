<?php
namespace App\EventSubscriber;

use App\Entity\Admin;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminSubscriber implements EventSubscriberInterface
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setAdminPwd'],
        ];
    }

    public function setAdminPwd(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Admin)) {
            return;
        }
        $hash= $this->passwordEncoder->encodePassword($entity, $entity->getPassword());
        $entity->setPassword($hash);
        $entity->setRoles(['ROLE_ADMIN']);
        
    }

    
}