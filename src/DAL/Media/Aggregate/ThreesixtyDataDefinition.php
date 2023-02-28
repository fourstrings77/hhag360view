<?php

namespace Hhag\ThreesixtyViewer\DAL\Media\Aggregate;


use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IntField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;


class ThreesixtyDataDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'hhag_media_threesixty_data';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            new FkField('media_id', 'mediaId', \Shopware\Core\Content\Media\MediaDefinition::class, 'id'),
            (new IntField('image_index', 'imageIndex'))->addFlags(new Required(), new ApiAware()),
            (new StringField('image_axis', 'imageAxis'))->addFlags(new Required(), new ApiAware()),

            new OneToOneAssociationField('threesixtyData', 'media_id', 'id', ThreesixtyDataDefinition::class)
        ]);
    }
}