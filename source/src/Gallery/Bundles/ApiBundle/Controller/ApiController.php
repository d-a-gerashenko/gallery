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
     * @return Response
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
     * @param int $id
     * @param int $page
     * @return Response
     * @Route("/album/{id}/{page}", defaults={"page" = 1})
     */
    public function showAction($id, $page)
    {
        $album = $this->getDoctrine()->getRepository('ApiBundle:Album')->find($id);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $album->getAlbumImages(),
            $page
        );
        $serializer = $this->container->get('serializer');
        $normalizer = $this->container->get('get_set_method_normalizer');
        $normalizer->setIgnoredAttributes(['album']);

        $result = [
            'pagination' => $pagination->getPaginationData(),
            'albumImages' => $pagination
        ];
        return new Response($serializer->serialize($result, 'json'));
    }

}
