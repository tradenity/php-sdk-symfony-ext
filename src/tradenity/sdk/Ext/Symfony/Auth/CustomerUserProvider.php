<?php
/**
 * Created by IntelliJ IDEA.
 * User: joseph
 * Date: 7/26/16
 * Time: 1:22 PM
 */
// src/AppBundle/Security/User/WebserviceUserProvider.php
namespace Tradenity\SDK\Ext\Symfony\Auth;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Tradenity\SDK\Resources\Customer;

class CustomerUserProvider implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {

        $customer = Customer::findOneBy(['username' => $username]);

        if (! is_null($customer)) {

            return new CustomerUser($customer);
        }else {
            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof CustomerUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'AppBundle\Auth\CustomerUser';
    }
}
