<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ProductType;
use AppBundle\Entity\Product;

/**
     * @Route("/gestionProduct")
     */
class GestionProductosController extends Controller
{
    /**
     * @Route("/newProduct", name="newProduct")
     */
    public function newProdcutAction(Request $request)
    {
        $product = new Product();
        //Construccion de formulario
        $form = $this->createForm(ProductType::class, $product);
        //Traemos la informoacion
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //Rellena la Entity Product
            $product = $form->getData();
            $product->setName("");
            $product->setCategory("");
            $product->setImage("");

            //Almacenar new product
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();
    
            return $this->redirectToRoute('product', array('id' => $product->getId()));
        }
        //$var_dump($products);
        // replace this example code with whatever you need
        return $this->render('gestionProduct/newProduct.html.twig',array('form'=> $form->createView()));
    }
}