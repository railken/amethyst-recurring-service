<?php

namespace Railken\LaraOre\RecurringService\Exceptions;

class RecurringServiceNotFoundException extends RecurringServiceException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'RECURRINGSERVICE_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
