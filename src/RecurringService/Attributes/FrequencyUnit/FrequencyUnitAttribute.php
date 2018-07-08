<?php

namespace Railken\LaraOre\RecurringService\Attributes\FrequencyUnit;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class FrequencyUnitAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'frequency_unit';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = true;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\RecurringServiceFrequencyUnitNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\RecurringServiceFrequencyUnitNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\RecurringServiceFrequencyUnitNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\RecurringServiceFrequencyUnitNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'recurringservice.attributes.frequency_unit.fill',
        Tokens::PERMISSION_SHOW => 'recurringservice.attributes.frequency_unit.show',
    ];

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed          $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        return in_array($value, ['hours', 'days', 'weeks', 'months', 'years']);
    }
}
