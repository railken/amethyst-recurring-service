<?php

namespace Railken\Amethyst\Fakers;

use Faker\Factory;
use Railken\Bag;
use Railken\Lem\Faker;

class RecurringServiceFaker extends Faker
{
    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('name', $faker->name);
        $bag->set('code', $faker->name);
        $bag->set('description', $faker->text);
        $bag->set('notes', $faker->text);
        $bag->set('country', 'IT');
        $bag->set('locale', 'it_IT');
        $bag->set('enabled', true);
        $bag->set('price_starting', 40);
        $bag->set('price', 10);
        $bag->set('price_ending', 10);
        $bag->set('currency', 'EUR');
        $bag->set('tax', TaxFaker::make()->parameters()->toArray());
        $bag->set('frequency_unit', 'days');
        $bag->set('frequency_value', 10);
        $bag->set('catalogue', CatalogueFaker::make()->parameters()->toArray());

        return $bag;
    }
}
