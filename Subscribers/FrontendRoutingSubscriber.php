<?php

namespace VirtuaFeaturedProducts\Subscribers;

use Enlight\Event\SubscriberInterface;

class FrontendRoutingSubscriber implements SubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
          'Enlight_Controller_Action_PreDispatch' => 'addTemplateDir',
        ];
    }

    public function addTemplateDir(\Enlight_Controller_ActionEventArgs $args)
    {
        $args->getSubject()->View()->addTemplateDir(__DIR__ . '/../Resources/views');
    }
}