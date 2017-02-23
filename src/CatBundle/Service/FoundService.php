<?php

namespace CatBundle\Service;

use AppBundle\Entity\User;
use CatBundle\Entity\Found;

class FoundService
{
    /**
     * @param User $user
     * @param Found $found
     * @return bool
     */
    public function hasAccess(User $user, Found $found)
    {
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return true;
        }
        
        return $user->getId() == $found->getUserId();
    }
}