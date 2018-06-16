<?php

namespace Railken\LaraOre\RecurringService\Attributes\Currency\Exceptions;

use Railken\LaraOre\RecurringService\Exceptions\RecurringServiceAttributeException;

class RecurringServiceCurrencyNotUniqueException extends RecurringServiceAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'currency';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'RECURRINGSERVICE_CURRENCY_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
