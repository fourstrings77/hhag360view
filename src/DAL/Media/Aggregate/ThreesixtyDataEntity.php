<?php

namespace Hhag\ThreesixtyViewer\DAL\Media\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ThreesixtyDataEntity extends Entity
{
    use EntityIdTrait;

    protected $imageIndex;
    protected $imageAxis;

    /**
     * @return mixed
     */
    public function getImageIndex()
    {
        return $this->imageIndex;
    }

    /**
     * @param mixed $imageIndex
     */
    public function setImageIndex($imageIndex): void
    {
        $this->imageIndex = $imageIndex;
    }

    /**
     * @return mixed
     */
    public function getImageAxis()
    {
        return $this->imageAxis;
    }

    /**
     * @param mixed $imageAxis
     */
    public function setImageAxis($imageAxis): void
    {
        $this->imageAxis = $imageAxis;
    }



}