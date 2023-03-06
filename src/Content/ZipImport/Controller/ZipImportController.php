<?php

namespace Hhag\ThreesixtyViewer\Content\ZipImport\Controller;

use PHPUnit\Util\Json;
use setasign\Fpdi\PdfParser\StreamReader;
use Shopware\Core\Content\ImportExport\Exception\FileNotFoundException;
use Shopware\Core\Content\Media\Exception\MediaNotFoundException;
use Shopware\Core\Content\Media\Exception\UploadException;
use Shopware\Core\Content\Media\File\FileSaver;
use Shopware\Core\Content\Media\MediaService;
use Shopware\Core\Framework\Context;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Stream;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Shopware\Core\Content\Media\File\MediaFile;

#[Route(defaults:['_routeScope'=> ['api']])]
/**
 * @Route(defaults={"_routeScope"={"api"}})
 */
class ZipImportController extends AbstractController
{
    protected $mediaService;
    protected $fileSaver;

    public function __construct(MediaService $mediaService, FileSaver $fileSaver){
        $this->mediaService = $mediaService;
        $this->fileSaver = $fileSaver;
    }
    #[Route(path: '/api/_action/zip-import/upload', name: 'api.action.zip_import.upload', methods: ['POST'])] /*Symfony > 6*/

    /**
     * @param Request $request
     * @param Context $context
     * @return JsonResponse
     *
     * @Route("/api/_action/zip-import/upload", name="api.action.zip_import.upload", methods={"POST"})
     */
    public function upload(Request $request, Context $context): Response{

        $file = $request->files->get('file');

        if($file === null){
            throw new \Exception('Uploaded file is invalid');
        }
        $test = null;
        try{
            $zipArchive = new \ZipArchive();
            $zipArchive->open($file);

            $zipEntries = $zipArchive->count();

            $fileInfo = [];
            for($i = 0; $i < $zipEntries; $i++){
                $meta = $zipArchive->statIndex($i);

                if($meta['size'] > 0){
                    $stream = stream_get_contents($zipArchive->getStream($meta['name']));
                    $fileInfo[] = [
                        'base64' => base64_encode($stream),
                        'stream' => $stream,
                        'meta' => $meta
                    ];
                }


            }
            $zipArchive->close();
            $test = $this->createMediaFile($fileInfo, $context);


        } catch(\Exception $e){
            return new JsonResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse([], 200);
    }

    private function createMediaFile(Array $data, Context $context){

        if(!is_array($data) || count($data) == 0){
            return;
        }

        foreach($data as $mediaEntry){
            $re = '/(x|y)\/\D+(\d+)/m';

            preg_match_all($re, $mediaEntry['meta']['name'], $matches, PREG_SET_ORDER, 0);

            $uploadedFileRaw = imagecreatefromstring($mediaEntry['stream']);

            if($uploadedFileRaw){
                imagejpeg($uploadedFileRaw, sys_get_temp_dir().'/image.jpeg', 100);
                imagedestroy($uploadedFileRaw);
            }
             $uploadedFile = new UploadedFile(sys_get_temp_dir().'/image.jpeg', 'image.jpeg', 'image/jpeg', null, true);

            $mediaFile = new MediaFile($uploadedFile->getPathname(), $uploadedFile->getMimeType(), $uploadedFile->getClientOriginalExtension(), $uploadedFile->getSize());

            $mediaId = $this->mediaService->createMediaInFolder("", $context, false);

            try{
                $this->fileSaver->persistFileToMedia(
                    $mediaFile,
                    pathinfo($uploadedFile->getFilename(), PATHINFO_FILENAME),
                    $mediaId,
                    $context
                );
            } catch (MediaNotFoundException $exception){
                throw new UploadException($exception->getMessage());
            }

        }
    }
}