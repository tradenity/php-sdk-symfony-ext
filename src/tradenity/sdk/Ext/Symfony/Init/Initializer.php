<?php

/**
 * Created by IntelliJ IDEA.
 * User: Joseph
 * Date: 14-Nov-16
 * Time: 9:40 AM
 */

namespace Tradenity\SDK\Ext\Symfony\Init;

use Tradenity\SDK\ApiClient;
use Tradenity\SDK\Ext\Symfony\Session\SymfonySessionIdAccessor;

class Initializer
{
    public static function initialize($container)
    {
        $service = $container->get("tradenity.session.service");
        if($container->hasParameter('tradenity_key')) {
           ApiClient::$ApiKey = $container->getParameter('tradenity_key');
        }else{
            throw new \InvalidArgumentException("No Tradenity API key specified.");
        }
        if($container->hasParameter('tradenity_key')) {
            $endPoint = $container->getParameter('tradenity_endpoint');
        }else{
            $endPoint = 'https://api.tradenity.com/v1';
        }
        ApiClient::$apiEndPoint = $endPoint;
        ApiClient::$sessionIdAccessor = new SymfonySessionIdAccessor($service->getRequestStack());
    }

}