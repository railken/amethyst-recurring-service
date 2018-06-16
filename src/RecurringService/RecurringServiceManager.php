<?php

namespace Railken\LaraOre\RecurringService;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Facades\Config;

class RecurringServiceManager extends ModelManager
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = RecurringService::class;
    
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Name\NameAttribute::class,
        Attributes\Notes\NotesAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\Code\CodeAttribute::class,
        Attributes\Description\DescriptionAttribute::class,
        Attributes\Country\CountryAttribute::class,
        Attributes\Locale\LocaleAttribute::class,
        Attributes\Enabled\EnabledAttribute::class,
        Attributes\PriceStarting\PriceStartingAttribute::class,
        Attributes\Price\PriceAttribute::class,
        Attributes\PriceEnding\PriceEndingAttribute::class,
     ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\RecurringServiceNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->attributes = array_merge($this->attributes, array_values(Config::get('ore.recurring-service.attributes')));

        $this->setRepository(new RecurringServiceRepository($this));
        $this->setSerializer(new RecurringServiceSerializer($this));
        $this->setValidator(new RecurringServiceValidator($this));
        $this->setAuthorizer(new RecurringServiceAuthorizer($this));

        parent::__construct($agent);
    }
}
