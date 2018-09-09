<?php

namespace Railken\LaraOre\RecurringService\Attributes\TaxId;

use Railken\Laravel\Manager\Attributes\BelongsToAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class TaxIdAttribute extends BelongsToAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'tax_id';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = false;

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
        Tokens::NOT_DEFINED    => Exceptions\RecurringServiceTaxIdNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\RecurringServiceTaxIdNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\RecurringServiceTaxIdNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\RecurringServiceTaxIdNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'recurringservice.attributes.tax_id.fill',
        Tokens::PERMISSION_SHOW => 'recurringservice.attributes.tax_id.show',
    ];

    /**
     * Retrieve the name of the relation.
     *
     * @return string
     */
    public function getRelationName()
    {
        return 'tax';
    }

    /**
     * Retrieve eloquent relation.
     *
     * @param \Railken\LaraOre\RecurringService\RecurringService $entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getRelationBuilder(EntityContract $entity)
    {
        return $entity->tax();
    }

    /**
     * Retrieve relation manager.
     *
     * @param \Railken\LaraOre\RecurringService\RecurringService $entity
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getRelationManager(EntityContract $entity)
    {
        return new \Railken\LaraOre\Tax\TaxManager($this->getManager()->getAgent());
    }
}
