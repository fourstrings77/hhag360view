<?php

namespace Hhag\ThreesixtyViewer\DAL\Extension;

use Hhag\ThreesixtyViewer\DAL\Media\Aggregate\ThreesixtyDataDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class MediaExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToOneAssociationField('threesixtyData', 'id', 'media_id', ThreesixtyDataDefinition::class, true)
        );
    }

    public function getDefinitionClass(): string
    {
        return ThreesixtyDataDefinition::class;
    }
}