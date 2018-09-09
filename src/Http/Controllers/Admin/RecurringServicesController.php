<?php

namespace Railken\LaraOre\Http\Controllers\Admin;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Api\Http\Controllers\RestConfigurableController;
use Railken\LaraOre\Api\Http\Controllers\Traits as RestTraits;

class RecurringServicesController extends RestConfigurableController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;

    /**
     * The config path.
     *
     * @var string
     */
    public $config = 'ore.recurring-service';

    /**
     * The attributes that are queryable.
     *
     * @var array
     */
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

    /**
     * The attributes that are fillable.
     *
     * @var array
     */
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
}
