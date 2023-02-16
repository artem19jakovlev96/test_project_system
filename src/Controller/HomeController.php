<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Entity\Products;
use App\Form\OrderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home" )
     * @param Request $request
     * @return Response
     */
    public function index(Request $request){
        $forRender['title'] = 'Оформить заказ';
        $em=$this->getDoctrine()->getManager();
        $Order=new Orders();
        $form= $this->createForm(OrderType::class, $Order);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){

            $Order->setProductid($Order->getProductidstr()->getId());
            $em->persist($Order);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        $forRender['Order'] = $form->createView();
        return $this->render('index.html.twig', $forRender);
    }
    /**
     * @Route("/getProgucts/", name="get_products")
     * @param Request $request
     * @return JsonResponse
     */
    public function GetProducts(Request $request){
        $Products=$this->getDoctrine()->getRepository(Products::class)->findAll();
        $json=array();
        foreach ($Products as $key=>$product){
            $json[$product->getId()]=array('name'=>$product->getName(),'price'=>$product->getPrice());
        }
        $response = new JsonResponse( $json ,Response::HTTP_OK);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        return $response;

    }

}