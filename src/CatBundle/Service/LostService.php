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
    public function isUser(User $user, Lost $lost)
    {
        return $user->getId() == $lost->getUserId();
    }
}