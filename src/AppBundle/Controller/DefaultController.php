<?php

namespace AppBundle\Controller;

use AppBundle\Form\FeedBackType;
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
    {
        $test = 'test';
        $array = [1, 2, 3];
        $value = false;
        return $this->render('@App/default/index.html.twig', ['test' => $test, 'array' => $array, 'value' => $value]);
    }

    /**
     * @Route("/feedback", name="feedback")
     */
    public function feedbackAction()
    {
        $form = $this->createForm(FeedBackType::class);
        return $this->render('@App/default/feedback.html.twig', ['feedback_form' => $form->createView()]);

    }
}
