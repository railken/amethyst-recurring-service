<?php

namespace Railken\Amethyst\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Railken\Amethyst\Schemas\RecurringServiceSchema;
use Railken\Lem\Contracts\EntityContract;

class RecurringService extends Model implements EntityContract
{
    use SoftDeletes;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('amethyst.recurring-service.managers.recurring-service.table');
        $this->fillable = (new RecurringServiceSchema())->getNameFillableAttributes();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);
    }
}
