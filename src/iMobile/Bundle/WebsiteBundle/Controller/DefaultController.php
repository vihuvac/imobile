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
     * @Route("/nuestra-misión-y-visión")
     * @Template()
     */
    public function myvAction()
    {
        return array();
    }

    /**
     * @Route("/novedades")
     * @Template()
     */
    public function novedadesAction()
    {
        return array();
    }

    /**
     * @Route("/servicios")
     * @Template()
     */
    public function serviciosAction()
    {
        return array();
    }

    /**
     * @Route("/equipos")
     * @Template()
     */
    public function equiposAction()
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