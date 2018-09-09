<?php

namespace Railken\LaraOre\RecurringService;

use Faker\Factory;
use Railken\Bag;
use Railken\LaraOre\Tax\TaxFaker;
use Railken\Laravel\Manager\BaseFaker;

class RecurringServiceFaker extends BaseFaker
{
    /**
     * @var string
     */
    protected $manager = RecurringServiceManager::class;

    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

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
        $bag->set('tax_id', TaxFaker::make()->parameters()->toArray());
        $bag->set('frequency_unit', 'days');
        $bag->set('frequency_value', 10);

        return $bag;
    }
}
