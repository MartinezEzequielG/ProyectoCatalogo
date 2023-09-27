<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Category;

/**
     * @Route("/gestionCategory")
     */
class GestionCategoriasController extends Controller
{
    /**
     * @Route("/newCategory", name="newCategory")
     */
    public function newCategoryAction(Request $request)
    {
         //Capturar el repositorio de la tabla contra la DB
        $categoryRepository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $categoryRepository->findAll();
        //var_dump($categories);
         // replace this example code with whatever you need
        return $this->render('front/category.html.twig',array('categories'=>$categories));
    }
}