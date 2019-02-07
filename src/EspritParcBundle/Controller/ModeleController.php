<?php

namespace EspritParcBundle\Controller;

use EspritParcBundle\Entity\Modele;
use EspritParcBundle\EspritParcBundle;
use EspritParcBundle\Form\ModeleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ModeleController extends Controller
{
    public function createAction(Request $request)
    {
        //creation diun objet vide
        $modele=new Modele();
        //creation d'un formulaire
        $form=$this->createForm(ModeleType::class,$modele);
        //recuperation des doonées
       $form= $form->handleRequest($request);
        //validation du formulaire

        if($form->isValid())
        {  //creation de entity manager
            $em=$this->getDoctrine()->getManager();
            //persister les données danns orm
            $em->persist($modele);
            //sauvegarde des données dans bd
            $em->flush();
            return $this->redirectToRoute('read');
        }
        //envoi du formulaire
        return $this->render('@EspritParc/Modele/create.html.twig', array(
        "form"=>$form->createView()
        ));
    }

    public function readAction()
    { $modeles=$this->getDoctrine()->getRepository(Modele::class)->findAll();
        return $this->render('@EspritParc/Modele/read.html.twig', array("modeles"=>$modeles
            // ...
        ));
    }

    public function updateAction($id,Request $request)

    { //preparation de l'entity manager
        $em=$this->getDoctrine()->getManager();

        //preparation de l'objet
        $modele=$em->getRepository(Modele::class)->find($id);
        //preparation du formulaire
        $form=$this->createForm(ModeleType::class,$modele);
        //5/ recuperation du formulaire
        $form=$form->handleRequest($request);
        if($form->isValid())
        {
            $em->flush();
            //redirection
            return $this->redirectToRoute('read');
        }
        //4envoi du formulaire
        return $this->render('@EspritParc/Modele/update.html.twig', array(
           'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {   $em=$this->getDoctrine()->getManager();
    $modele=$em->getRepository(Modele::class)->find($id);
    $em->remove($modele);
    $em->flush();
        return $this->redirectToRoute('read');
    }

    public function rechercheAction( Request $request)
    {  $pays=$request->get('pays');
        if(isset($pays))
        {
            $modeles=$this->getDoctrine()->getRepository(Modele::class)->myFindAll($pays);

            return $this->render ('@EspritParc/Modele/read.html.twig', array(
                'modeles'=>$modeles
            ));

        }
        //preparation form in the view
        //envoi d form l user
        return $this->render('@EspritParc/Modele/recherche.html.twig');
    }
}

//generate entity pour generer get et set