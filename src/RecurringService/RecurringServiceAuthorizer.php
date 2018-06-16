<?php

namespace Railken\LaraOre\RecurringService;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class RecurringServiceAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'recurring_service.create',
        Tokens::PERMISSION_UPDATE => 'recurring_service.update',
        Tokens::PERMISSION_SHOW   => 'recurring_service.show',
        Tokens::PERMISSION_REMOVE => 'recurring_service.remove',
    ];
}
