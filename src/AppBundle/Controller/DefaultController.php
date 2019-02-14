<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\FeedBack;
use AppBundle\Form\FeedBackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
    {
        $test = 'test';
        $array = [1, 2, 3];
        $value = false;
        return $this->render('@App/default/index.html.twig', ['test' => $test, 'array' => $array, 'value' => $value]);
    }

    /**
     * @Route("/feedback", name="feedback")
     * @param Request $request
     * @return Response
     */
    public function feedbackAction(Request $request)
    {
//        $q=$request->get('test');
//
        $form = $this->createForm(FeedBackType::class);
        $form->add('submit', SubmitType::class);
        $form->handleRequest($request);


        if($form->isSubmitted() and $form->isValid()){
            $feedBack = $form->getData();
            $em=$this->getDoctrine()->getManager();//menedjer su6nosti
            $em->persist($feedBack);// на подобии git add .
            $em->flush();//git commit
            $this->addFlash('success','Saved');
           return  $this->redirectToRoute('feedback');
        }



        //        $feedBack=new FeedBack();
//        $feedBack->setEmail('sosati@mail.ru');
//        $feedBack->setName('SERII');
//        $feedBack->setMessage('MESSAGE');
//        $em=$this->getDoctrine()->getManager();
//        $category=new Category();
//        $category->setName('new_catergpru');
//        $category->setActive('1');
        return $this->render('@App/default/feedback.html.twig', ['feedback_form' => $form->createView()]);

    }
}
