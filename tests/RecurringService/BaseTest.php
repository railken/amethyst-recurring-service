<?php

namespace Railken\LaraOre\Tests\RecurringService;

use Railken\Bag;
use Railken\LaraOre\Tax\TaxManager;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\RecurringServiceServiceProvider::class,
        ];
    }

    /**
     * @return \Railken\LaraOre\Tax\Tax
     */
    public function newTax()
    {
        $am = new TaxManager();
        $bag = new Bag();
        $bag->set('name', 'Vat 22%');
        $bag->set('description', 'Give me');
        $bag->set('calculator', 'x*0.22');

        return $am->findOrCreate($bag->toArray())->getResource();
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
        $bag->set('country', 'IT');
        $bag->set('locale', 'it_IT');
        $bag->set('enabled', true);
        $bag->set('price_starting', 40);
        $bag->set('price', 10);
        $bag->set('price_ending', 10);
        $bag->set('currency', 'EUR');
        $bag->set('tax_id', $this->newTax()->id);
        $bag->set('frequency_unit', 'days');
        $bag->set('frequency_value', 10);

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
