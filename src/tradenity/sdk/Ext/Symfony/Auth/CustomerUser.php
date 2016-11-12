<?php
/**
 * Created by IntelliJ IDEA.
 * User: joseph
 * Date: 7/26/16
 * Time: 1:22 PM
 */
namespace Tradenity\SDK\Ext\Symfony\Auth;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

class CustomerUser implements UserInterface, EquatableInterface
{
    public $customer;
    private $username;
    private $password;
    private $salt;
    private $roles = ['ROLE_USER'];

    public function __construct($customer)
    {
        $this->customer = $customer;
        $this->username = $customer->username;
        $this->password = $customer->password;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof CustomerUser) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }
}