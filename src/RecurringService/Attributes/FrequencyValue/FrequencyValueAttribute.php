<?php

namespace Railken\LaraOre\RecurringService\Attributes\FrequencyValue;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class FrequencyValueAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'frequency_value';

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
        Tokens::NOT_DEFINED    => Exceptions\RecurringServiceFrequencyValueNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\RecurringServiceFrequencyValueNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\RecurringServiceFrequencyValueNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\RecurringServiceFrequencyValueNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'recurringservice.attributes.frequency_value.fill',
        Tokens::PERMISSION_SHOW => 'recurringservice.attributes.frequency_value.show',
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
        return v::length(1, 255)->validate($value);
    }
}
