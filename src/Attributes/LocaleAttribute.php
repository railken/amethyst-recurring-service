<?php

namespace Railken\Amethyst\Attributes;

use Railken\Lem\Attributes\EnumAttribute;

class LocaleAttribute extends EnumAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'locale';

    /**
     * Create a new instance.
     *
     * @param string $name
     * @param array  $options
     */
    public function __construct(string $name = null, array $options = [])
    {
        if (empty($options)) {
            $options = \ResourceBundle::getLocales('');
        }

        parent::__construct($name, $options);
    }
}
