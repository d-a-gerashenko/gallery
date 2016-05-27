<?php

namespace Gallery\Bundles\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ApiController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
    }
}
