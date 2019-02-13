<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     * @Template("@App/product/index.html.twig")
     */
    public function indexAction()
    {
        $products = $this
            ->getDoctrine()
            ->getRepository("AppBundle:Product")
            ->findActive(1);

        return ['products' => $products];
    }

    /**
     * @Route("/products/{id}", name="product_item",requirements={"id": "[0-9]+"})
     * @param Product $products
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template()
     */
    public function showAction(Product $products)
    {
        return $this->render('@App/product/show.html.twig', ['products' => $products]);

    }

    /**
     * @Route("/category/{id}", name="product_by_category")
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template("@App/product/list_by_category.html.twig")
     */
    public function listByCategoryAction(Category $category)
    {

        $products = $this
            ->getDoctrine()
            ->getRepository("AppBundle:Product")
            ->findByCategory($category);
       

        return ['products'=>$products];
    }

}