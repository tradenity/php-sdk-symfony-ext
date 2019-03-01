<?php
/**
 * Created by IntelliJ IDEA.
 * User: joseph
 * Date: 3/31/16
 * Time: 11:29 PM
 */

namespace Tradenity\SDK\Ext\Symfony\Session;

use Tradenity\SDK\SessionIdAccessor;
use Symfony\Component\HttpFoundation\Request;

class SymfonySessionIdAccessor implements SessionIdAccessor
{
    protected $requestStack;

    public function __construct($requestStack)
    {
        $this->requestStack = $requestStack;
    }

    function storeSessionId($id)
    {
        $s = $this->requestStack->getCurrentRequest()->getSession();
        if($s) {
            $s->set("auth_token", $id);
        }
    }

    function getSessionId()
    {
        $s = $this->requestStack->getCurrentRequest()->getSession();
        if($s != null) {
            return $s->get("auth_token");
        }
        return null;
    }

    function reset()
    {
        $s = $this->requestStack->getCurrentRequest()->getSession();
        if($s != null) {
            $s->remove("auth_token");
        }
    }

    function hasSessionId()
    {
        $s = $this->requestStack->getCurrentRequest()->getSession();
        if($s) {
            return $s->has("auth_token");
        }else{
            return false;
        }
    }
}