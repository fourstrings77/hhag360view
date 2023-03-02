<?php

namespace Hhag\ThreesixtyViewer\Content\ZipImport\Controller;

use Shopware\Core\Framework\Context;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(defaults:['_routeScope'=> ['api']])]
class ZipImportController extends AbstractController
{
    public function __construct(){

    }
    #[Route(path: '/api/_action/zip-import/upload', name: 'api.action.zip_import.upload', methods: ['POST'])]
    public function upload(Request $request, Context $context): JsonResponse{
        die('dion some action...');
    }
}