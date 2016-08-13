<?php

namespace SaleProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SaleProductBundle:Default:index.html.twig');
    }
}
