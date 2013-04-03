<?php

namespace Vihuvac\Bundle\DataBundle\Util;

use FOS\UserBundle\Util\UserManipulator as BaseManipulator;
use FOS\UserBundle\Model\UserManagerInterface;

/**
 * Executes some manipulations on the users
 *
 * @author Christophe Coevoet <stof@notk.org>
 * @author Luis Cordova <cordoval@gmail.com>
 */
class UserManipulator extends BaseManipulator
{
    /**
     * User manager
     *
     * @var UserManagerInterface
     */
    protected $userManager;

    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Creates a user and returns it.
     *
     * @param string $username
     * @param string $password
     * @param string $email
     * @param Boolean $active
     * @param Boolean $superadmin
     * @param string $name
     * @return \FOS\UserBundle\Model\UserInterface
     */
    public function create($username, $password, $email, $active, $superadmin, $name = null)
    {
        $user = $this->userManager->createUser();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setName($name);
        $user->setPlainPassword($password);
        $user->setEnabled((Boolean)$active);
        $user->setSuperAdmin((Boolean)$superadmin);
        $this->userManager->updateUser($user);

        return $user;
    }
}