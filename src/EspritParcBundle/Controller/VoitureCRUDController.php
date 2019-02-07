<?php

namespace EspritParcBundle\Controller;

use EspritParcBundle\Entity\Voiture;
use EspritParcBundle\Form\VoitureRecherche;
use EspritParcBundle\Form\VoitureType;

use EspritParcBundle\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class VoitureCRUDController extends Controller
{

    public function createAction(Request $request)
    {
        //creation diun objet vide
        $voiture = new Voiture();
        //creation d'un formulaire
        $form = $this->createForm(VoitureType::class, $voiture);
        //recuperation des doonées
        $form = $form->handleRequest($request);
        //validation du formulaire

        if ($form->isValid()) {  //creation de entity manager
            $em = $this->getDoctrine()->getManager();
            //persister les données danns orm
            $em->persist($voiture);
            //sauvegarde des données dans bd
            $em->flush();
            return $this->redirectToRoute('readv');
        }
        //envoi du formulaire
        return $this->render('@EspritParc/Voiture/create.html.twig', array(
            "form" => $form->createView()
        ));
    }

    public function readAction()
    {
        //recup données
        $voitures = $this->getDoctrine()->getRepository(Voiture::class)->findAll();

        return $this->render('@EspritParc/Voiture/afficher.html.twig', array("voitures" => $voitures

        ));
    }

    public function updateAction($ref, Request $request)

    { //preparation de l'entity manager
        $em = $this->getDoctrine()->getManager();

        //preparation de l'objet
        $voiture = $em->getRepository(Voiture::class)->find($ref);
        //preparation du formulaire
        $form = $this->createForm(VoitureType::class, $voiture);
        //5/ recuperation du formulaire
        $form = $form->handleRequest($request);
        if ($form->isValid()) {
            $em->flush();
            //redirection
            return $this->redirectToRoute('readv');
        }
        //4envoi du formulaire
        return $this->render('@EspritParc/Voiture/update.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($ref)
    {
        $em = $this->getDoctrine()->getManager();
        $voiture = $em->getRepository(Voiture::class)->find($ref);
        $em->remove($voiture);
        $em->flush();
        return $this->redirectToRoute('readv');
    }

    public function rechercheAction(Request $request)
    {
        //creation diun objet vide
        $voiture = new Voiture();
        //creation d'un formulaire
        $form = $this->createForm(VoitureRecherche::class, $voiture);
        //recuperation des doonées
        $form = $form->handleRequest($request);
        //validation du formulaire

        if ($form->isValid()) {
            $datemc = $voiture->getDatemc();
            $voitures = $this->getDoctrine()->getRepository(Voiture::class)->rechercheDate($datemc);
            return $this->render('@EspritParc/Voiture/afficher.html.twig', array(
                'voitures' => $voitures
            ));

        }
        //preparation form in the view
        //envoi d form l user
        return $this->render('@EspritParc/Voiture/recherchev.html.twig', array('form' => $form->createView()));
    }

    public function trouverAction(Request $request)
    {

        return $this->render('@EspritParc/Voiture/chercher.html.twig');
    }
}
