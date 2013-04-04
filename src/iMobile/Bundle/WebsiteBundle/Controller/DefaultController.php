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

    /**
     * @Route("/blog")
     * @Template()
     */
    public function blogAction()
    {
        return array();
    }

    /**
     * @Route("/empresa")
     * @Template()
     */
    public function empresaAction()
    {
        return array();
    }

    /**
     * @Route("/preguntas-mas-frecuentes")
     * @Template()
     */
    public function faqAction()
    {
        return array();
    }

    /**
     * @Route("/enlaces")
     * @Template()
     */
    public function enlacesAction()
    {
        return array();
    }

    /**
     * @Route("/contactar")
     * @Template()
     */
    public function contactarAction()
    {
        return array();
    }
}