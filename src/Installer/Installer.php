<?php

namespace Hhag\ThreesixtyViewer\Installer;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Installer
{
    const MEDIA_FOLDER_ID="8ed9780026724d7b9e9d44c4269dc6be";

    protected $container;
    protected $context;

    public function __construct(ContainerInterface $container, Context $context){
        $this->container = $container;
        $this->context = $context;
    }


    public function createMediaFolder(){
        $mediaFolderRepository = $this->container->get('media_folder.repository');

        $criteria = new Criteria([self::MEDIA_FOLDER_ID]);

        $mediafolder = $mediaFolderRepository->search($criteria, $this->context);

        if($mediafolder->getTotal() > 0){
            return;
        }
        $configId = Uuid::randomHex();
        $mediaFolderRepository->create([
            [
                'id' => self::MEDIA_FOLDER_ID,
                'name' => '360 Viewer',
                'configurationId' => $configId,
                'config' => [
                    'id' => $configId,
                ]
            ]
        ], $this->context);
    }
}