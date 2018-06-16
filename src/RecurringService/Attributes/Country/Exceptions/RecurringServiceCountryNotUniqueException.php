<?php

namespace Railken\LaraOre\RecurringService\Attributes\Country\Exceptions;

use Railken\LaraOre\RecurringService\Exceptions\RecurringServiceAttributeException;

class RecurringServiceCountryNotUniqueException extends RecurringServiceAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'country';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'RECURRINGSERVICE_COUNTRY_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
