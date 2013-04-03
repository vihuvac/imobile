<?php

namespace iMobile\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/{_locale}", requirements={"_locale" = "\w{2}"})
 */
class DefaultController extends Controller
{
    /**
     * @Route("/inicio")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}