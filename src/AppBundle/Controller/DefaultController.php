<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {   $test='test';
        $array=[1,2,3];
        $value=false;
        return $this->render('default/index.html.twig',['test'=>$test,'array'=>$array,'value'=>$value]);
    }

    /**
     * @Route("/feedback", name="feedback") 
     */
    public function feedbackAction()
    {
      return $this->render('default/feedback.html.twig');

    }
}
