<?php

namespace Railken\LaraOre\RecurringService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Tax\Tax;
use Railken\Laravel\Manager\Contracts\EntityContract;

class RecurringService extends Model implements EntityContract
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'notes',
        'code',
        'description',
        'country',
        'locale',
        'enabled',
        'price_starting',
        'price',
        'price_ending',
        'currency',
        'tax_id',
        'frequency_unit',
        'frequency_value',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->fillable = array_merge($this->fillable, array_keys(Config::get('ore.recurring-service.attributes')));
        $this->table = Config::get('ore.recurring-service.table');
        parent::__construct($attributes);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
}
