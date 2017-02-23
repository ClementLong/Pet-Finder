<?php

namespace Tests\CatBundle\Service;

use AppBundle\Entity\User;
use CatBundle\Entity\Found;
use CatBundle\Service\FoundService;

class FoundServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var FoundService */
    private $SUT;

    protected function setUp()
    {
        $this->SUT = new FoundService();
    }

    /**
     * @test
     */
    public function it_should_return_false_when_found_is_not_from_the_given_user_and_the_user_is_not_admin()
    {
        $user = new User();
        $found = new Found();
        $found->setUserId(1);

        $areSame = $this->SUT->hasAccess($user, $found);

        $this->assertFalse($areSame);
    }

    /**
     * @test
     */
    public function it_should_return_true_when_found_is_from_the_given_user_and_the_user_is_not_admin()
    {
        $user = new User();
        $found = new Found();

        $areSame = $this->SUT->hasAccess($user, $found);

        $this->assertTrue($areSame);
    }

    /**
     * @test
     */
    public function it_should_return_true_when_lost_is_not_from_the_given_user_and_the_user_is_admin()
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $lost = new Found();
        $lost->setUserId(1);

        $areSame = $this->SUT->hasAccess($user, $lost);

        $this->assertTrue($areSame);
    }
}