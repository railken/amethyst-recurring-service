<?php

namespace Railken\LaraOre\RecurringService\Attributes\Locale;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class LocaleAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'locale';

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
        Tokens::NOT_DEFINED    => Exceptions\RecurringServiceLocaleNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\RecurringServiceLocaleNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\RecurringServiceLocaleNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\RecurringServiceLocaleNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'recurringservice.attributes.locale.fill',
        Tokens::PERMISSION_SHOW => 'recurringservice.attributes.locale.show',
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
        return in_array($value, \ResourceBundle::getLocales(''));
    }
}
