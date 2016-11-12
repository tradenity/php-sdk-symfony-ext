<?php

/**
 * Created by IntelliJ IDEA.
 * User: joseph
 * Date: 4/1/16
 * Time: 10:16 AM
 */
namespace Tradenity\SDK\Ext\Symfony\Services;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionService
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getRequestStack()
    {
        return $this->requestStack;
    }
}