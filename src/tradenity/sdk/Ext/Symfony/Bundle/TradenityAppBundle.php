<?php

/**
 * Created by IntelliJ IDEA.
 * User: Joseph
 * Date: 14-Nov-16
 * Time: 9:47 AM
 */
namespace Tradenity\SDK\Ext\Symfony\Bundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tradenity\SDK\Ext\Symfony\Init\Initializer;

class TradenityAppBundle extends Bundle
{
    public function boot()
    {
        Initializer::initialize($this->container);
    }
}