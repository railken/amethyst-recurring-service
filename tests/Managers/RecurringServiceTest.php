<?php

namespace Railken\Amethyst\Tests\Managers;

use Railken\Amethyst\Fakers\RecurringServiceFaker;
use Railken\Amethyst\Managers\RecurringServiceManager;
use Railken\Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class RecurringServiceTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = RecurringServiceManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = RecurringServiceFaker::class;
}
