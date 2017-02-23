<?php

namespace CatBundle\Service;

use AppBundle\Entity\User;
use CatBundle\Entity\Lost;

class LostService
{
    /**
     * @param User $user
     * @param Lost $lost
     * @return bool
     */
    public function hasAccess(User $user, Lost $lost)
    {
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return true;
        }

        return $user->getId() == $lost->getUserId();
    }
}