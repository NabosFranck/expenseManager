<?php

// App/EventListener/JWTListener.php

namespace App\EventListener;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JWTListener
{
    /**
     * Replaces the data in the generated
     *
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        /** @var $user \App\Entity\Commercial */
        $user = $event->getUser();
        // add new data
        $payload['id'] = $user->getId();
        $payload['username'] = $user->getUsername();

        $event->setData($payload);
    }
}