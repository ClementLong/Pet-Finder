<?php

namespace Tests\CatBundle\Service;

use AppBundle\Entity\User;
use CatBundle\Entity\Lost;
use CatBundle\Service\LostService;

class LostServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var LostService */
    private $SUT;

    protected function setUp()
    {
        $this->SUT = new LostService();
    }

    /**
     * @test
     */
    public function it_should_return_false_when_lost_is_not_from_the_given_user_and_the_user_is_not_admin()
    {
        $user = new User();
        $lost = new Lost();
        $lost->setUserId(1);

        $areSame = $this->SUT->hasAccess($user, $lost);

        $this->assertFalse($areSame);
    }

    /**
     * @test
     */
    public function it_should_return_true_when_lost_is_from_the_given_user_and_the_user_is_not_admin()
    {
        $user = new User();
        $lost = new Lost();

        $areSame = $this->SUT->hasAccess($user, $lost);

        $this->assertTrue($areSame);
    }

    /**
     * @test
     */
    public function it_should_return_true_when_lost_is_not_from_the_given_user_and_the_user_is_admin()
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $lost = new Lost();
        $lost->setUserId(1);

        $areSame = $this->SUT->hasAccess($user, $lost);

        $this->assertTrue($areSame);
    }
}