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
    public function isUser(User $user, Found $found)
    {
        return $user->getId() == $found->getUserId();
    }
}