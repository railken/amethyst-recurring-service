<?php

namespace Railken\Amethyst\Schemas;

use Railken\Amethyst\Attributes as AmethystAttributes;
use Railken\Amethyst\Managers\CatalogueManager;
use Railken\Amethyst\Managers\TaxManager;
use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class RecurringServiceSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('name')
                ->setRequired(true)
                ->setUnique(true),
            Attributes\TextAttribute::make('code')
                ->setRequired(true)
                ->setUnique(true),
            Attributes\LongTextAttribute::make('description'),
            Attributes\LongTextAttribute::make('notes'),
            AmethystAttributes\CountryAttribute::make('country'),
            AmethystAttributes\CurrencyAttribute::make('currency'),
            AmethystAttributes\LocaleAttribute::make('locale'),
            Attributes\BooleanAttribute::make('enabled'),
            Attributes\NumberAttribute::make('price_starting'),
            Attributes\NumberAttribute::make('price'),
            Attributes\NumberAttribute::make('price_ending'),
            Attributes\EnumAttribute::make('frequency_unit', ['hours', 'days', 'weeks', 'months', 'years']),
            Attributes\NumberAttribute::make('frequency_value'),
            Attributes\BelongsToAttribute::make('tax_id')
                ->setRelationName('tax')
                ->setRelationManager(TaxManager::class),
            Attributes\BelongsToAttribute::make('catalogue_id')
                ->setRelationName('catalogue')
                ->setRelationManager(CatalogueManager::class),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
            Attributes\DeletedAtAttribute::make(),
        ];
    }
}
