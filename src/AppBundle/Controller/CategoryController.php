<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    /**
     * @Route("/categories", name="category_list")
     * @Template("@App/categories/index.html.twig")
     */
    public function indexAction()
    {
        $categories = $this
            ->getDoctrine()
            ->getRepository("AppBundle:Category")
            ->findBy([],['name'=>'ASC']);

        return ['categories' => $categories];
    }

}