<?php

namespace Railken\LaraOre\Http\Controllers\Admin;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Api\Http\Controllers\Traits as RestTraits;
use Railken\LaraOre\RecurringService\RecurringServiceManager;

class RecurringServicesController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;

    public $queryable = [
        'id',
        'name',
        'code',
        'description',
        'country',
        'locale',
        'notes',
        'enabled',
        'price_starting',
        'price',
        'price_ending',
        'currency',
        'tax_id',
        'catalogue_id',
        'frequency_unit',
        'frequency_value',
        'created_at',
        'updated_at',
    ];

    public $fillable = [
        'name',
        'code',
        'description',
        'country',
        'locale',
        'notes',
        'enabled',
        'price_starting',
        'price',
        'price_ending',
        'currency',
        'tax_id',
        'tax',
        'catalogue_id',
        'catalogue',
        'frequency_unit',
        'frequency_value',
    ];

    /**
     * Construct.
     */
    public function __construct(RecurringServiceManager $manager)
    {
        $this->queryable = array_merge($this->queryable, array_keys(Config::get('ore.recurring-service.attributes')));
        $this->fillable = array_merge($this->fillable, array_keys(Config::get('ore.recurring-service.attributes')));
        $this->manager = $manager;
        $this->manager->setAgent($this->getUser());
        parent::__construct();
    }

    /**
     * Create a new instance for query.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }
}
