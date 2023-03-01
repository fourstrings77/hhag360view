<?php

namespace Hhag\ThreesixtyViewer\DAL\Media\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
/**
 * @method void               add(ThreesixtyDataEntity $entity)
 * @method void               set(string $key, ThreesixtyDataEntity $entity)
 * @method ThreesixtyDataEntity[]    getIterator()
 * @method ThreesixtyDataEntity[]    getElements()
 * @method ThreesixtyDataEntity|null get(string $key)
 * @method ThreesixtyDataEntity|null first()
 * @method ThreesixtyDataEntity|null last()
 */
class ThreesixtyDataCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ThreesixtyDataEntity::class;
    }
}