<?php

namespace Skonsoft\CompanyHierarchyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SkonsoftCompanyHierarchyBundle:Default:index.html.twig', array('name' => $name));
    }
}
