<?php

namespace Gallery\Bundles\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    /**
     * @Route("/albums")
     */
    public function indexAction()
    {

        $albumsWithPreviews = $this->getDoctrine()
            ->getRepository('ApiBundle:Album')
            ->findAlbumWithPreviews();
        
        $result = [];
        foreach ($albumsWithPreviews as $albumsWithPreview) {
            $albumResult['id'] = $albumsWithPreview->getId();
            $albumResult['name'] = $albumsWithPreview->getName();
            $albumResult['previews'] = [];

            foreach ($albumsWithPreview->getAlbumImages() as $image) {
                $preview = [
                    'name' => $image->getName(),
                    'path' => $image->getPath(),
                ];
                $albumResult['previews'][] = $preview;
            }
            $result[] = $albumResult;
        }

        $response = new JsonResponse();
        $response->setData($result);
        return $response;
    }
}
