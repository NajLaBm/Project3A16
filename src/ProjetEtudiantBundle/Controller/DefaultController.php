<?php

namespace ProjetEtudiantBundle\Controller;

use ProjetEtudiantBundle\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function readAction()
    {
         $projets=$this->getDoctrine()->getRepository(Projet::class)->findAll();


        return $this->render('@ProjetEtudiant\Projet\read.html.twig', array("projets"=>$projets));
    }


    public function addAction(Request $request)
    {
        //creation diun objet vide
        $projet=new projet();
        //creation d'un formulaire
        $form=$this->createForm(Projet::class,$projet);
        //recuperation des doonées
        $form= $form->handleRequest($request);
        //validation du formulaire

        if($form->isValid())
        {  //creation de entity manager
            $em=$this->getDoctrine()->getManager();
            //persister les données danns orm
            $em->persist($projet);
            //sauvegarde des données dans bd
            $em->flush();
            return $this->redirectToRoute('readp');
        }
        //envoi du formulaire
        return $this->render('@ProjetEtudiant/Projet/create.html.twig', array(
            "form"=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository(Projet::class)->find($id);
        $em->remove($modele);
        $em->flush();
        return $this->redirectToRoute('readp');
    }

}
