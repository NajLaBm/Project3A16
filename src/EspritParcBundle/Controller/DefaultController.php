<?php

namespace EspritParcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@EspritParc/Default/index.html.twig');
    }
}
