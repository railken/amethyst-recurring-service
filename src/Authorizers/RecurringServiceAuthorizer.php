<?php

namespace Railken\Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class RecurringServiceAuthorizer extends Authorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'recurring-service.create',
        Tokens::PERMISSION_UPDATE => 'recurring-service.update',
        Tokens::PERMISSION_SHOW   => 'recurring-service.show',
        Tokens::PERMISSION_REMOVE => 'recurring-service.remove',
    ];
}
