<?php

namespace App\Controller;

use App\Entity\Adherant;
use App\Form\AdherantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AdherantController extends AbstractController
{
    /**
     * @Route("/adherant", name="adherant")
     */
    public function index(): Response
    {
        $list=$this->getDoctrine();
        $list=  $list->getRepository(Adherant::class)->findAll();
        return $this->render('adherant/Show.html.twig', [
            'list'=>$list
        ]);
    }
    /**
     * @Route("/adherant/add", name="addadherantpage")

     */
    public function addAdherant(Request $request){
        //1. création d'un objet vide
        $c= new Adherant();
        //2.Création du formulaire
        $form= $this->createForm(AdherantType::Class,$c);
        //4.récupérer les données
        $form= $form->handleRequest($request);
        //5. vérifier la validité des données
        if($form->isSubmitted() and $form->isValid()){
            //6. Sauvegarder les données dans la BD
            $em=$this->getDoctrine()->getManager();
            $em->persist($c);
            $em->flush();
        }
        //3.envoi du formulaire vers l'utilisateur
        return $this->render('adherant/add.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}
