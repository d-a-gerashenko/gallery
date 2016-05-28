<?php

namespace Gallery\Bundles\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Acl\Exception\Exception;

use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{
    /**
     * @Route("/albums")
     */
    public function listAction()
    {

        $albumsWithPreviews = $this->getDoctrine()
            ->getRepository('ApiBundle:Album')
            ->findAlbumWithPreviews();
        
        $serializer = $this->container->get('serializer');
        $this->container->get('object_normalizer')->setIgnoredAttributes(['album']);

        return new Response($serializer->serialize($albumsWithPreviews, 'json'));
    }

    /**
     * @Route("/album/{id}")
     */
    public function showAction($id)
    {
        $album = $this->getDoctrine()->getRepository('ApiBundle:Album')->find($id);
        if (!$album) {
            throw new Exception('cannot find album');
        }

        $serializer = $this->container->get('serializer');

        $this->container->get('object_normalizer')->setIgnoredAttributes(['album']);
        return new Response($serializer->serialize($album, 'json'));
    }
}
