<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
        // replace this example code with whatever you need
        return $this->render('front/index.html.twig');
    }

    /**
     * @Route("/product", name="product")
     */
    public function productAction(Request $request)
    {
        //Capturar el repositorio de la tabla contra la DB
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $products = $productRepository->findAll();
        //var_dump($products);
        return $this->render('front/product.html.twig',array('products'=>$products));
    }

    /**
     * @Route("/category", name="category")
     */
    public function categoryAction(Request $request)
    {
        //Capturar el repositorio de la tabla contra la DB
        $categoryRepository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $categoryRepository->findAll();
        //var_dump($categories);
        // replace this example code with whatever you need
        return $this->render('front/category.html.twig',array('categories'=>$categories));
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('front/login.html.twig');
    }

    /**
     * @Route("/user", name="user")
     */
    public function userAction(Request $request)
    {
        //Capturar el repositorio de la tabla contra la DB
        //$userRepository = $this->getDoctrine()->getRepository(User::class);
        //$users = $userRepository->findAll();
        //var_dump($users);
        // replace this example code with whatever you need
        return $this->render('front/user.html.twig');//,array('users'=>$users));
    }

}
