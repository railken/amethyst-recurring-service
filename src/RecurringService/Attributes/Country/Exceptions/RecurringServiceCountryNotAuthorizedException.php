<?php

namespace Railken\LaraOre\RecurringService\Attributes\Country\Exceptions;

use Railken\LaraOre\RecurringService\Exceptions\RecurringServiceAttributeException;

class RecurringServiceCountryNotAuthorizedException extends RecurringServiceAttributeException
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
    protected $code = 'RECURRINGSERVICE_COUNTRY_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
