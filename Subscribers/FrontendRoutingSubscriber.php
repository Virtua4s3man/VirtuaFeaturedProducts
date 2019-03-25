<?php

namespace VirtuaFeaturedProducts\Subscribers;

use Enlight\Event\SubscriberInterface;

class FrontendRoutingSubscriber implements SubscriberInterface
{
    private $config;

    public function __construct($config)
    {
        //todo $config mimo że podaje serwis klasy CachedConfigReader jest tablicą a nie obiektem CachedConfigReader, dlaczego?
        $this->config = $config;
    }


    public static function getSubscribedEvents()
    {
        return [
          'Enlight_Controller_Action_PreDispatch' => 'addTemplateDir',
          'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail' => 'asignDetails',
        ];
    }

    public function asignDetails(\Enlight_Controller_ActionEventArgs $args)
    {
        /** @var \Shopware_Controllers_Frontend_Detail $subject */
        $view = $args->getSubject()->View();
        $view->assign('vDisplayFeaturedProducts', $this->config['display']);
    }

    public function addTemplateDir(\Enlight_Controller_ActionEventArgs $args)
    {
        $args->getSubject()->View()->addTemplateDir(__DIR__ . '/../Resources/views');
    }
}