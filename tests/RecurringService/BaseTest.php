<?php

namespace Railken\LaraOre\Tests\RecurringService;

use Railken\Bag;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\RecurringServiceServiceProvider::class,
        ];
    }

    /**
     * Retrieve correct Bag of parameters.
     *
     * @return Bag
     */
    public function getParameters()
    {
        $bag = new Bag();
        $bag->set('name', str_random(40));
        $bag->set('code', str_random(40));
        $bag->set('description', str_random(40));
        $bag->set('notes', str_random(40));
        $bag->set('country', "IT");
        $bag->set('locale', "it_IT");

        return $bag;
    }

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../..', '.env');
        $dotenv->load();

        parent::setUp();

        $this->artisan('migrate:fresh');
        $this->artisan('vendor:publish', ['--provider' => 'Railken\LaraOre\RecurringServiceServiceProvider', '--force' => true]);
        $this->artisan('lara-ore:user:install');
        $this->artisan('migrate');
    }
}
