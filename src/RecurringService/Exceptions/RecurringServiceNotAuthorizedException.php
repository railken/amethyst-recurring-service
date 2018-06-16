<?php

namespace Railken\LaraOre\RecurringService\Exceptions;

class RecurringServiceNotAuthorizedException extends RecurringServiceException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'RECURRINGSERVICE_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
