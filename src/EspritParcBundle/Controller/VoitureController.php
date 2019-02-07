<?php

namespace EspritParcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VoitureController extends Controller
{
    public function afficherAction()
    {
        return $this->render('@EspritParc/Voiture/afficher.html.twig', array(
            // ...
        ));
    }
    // envoi des données
    public function homeAction()
    { $marque="bmw";
        return $this->render('@EspritParc/Voiture/home.html.twig', array(
           "marque"=>$marque
        ));
    }
    //recuperation des données di client
    public function hometAction($marque)
    {
        return $this->render('@EspritParc/Voiture/home.html.twig', array(
            "marque"=>$marque
        ));
    }

//affichage tableau
    public function indextableAction()
    { //$voitures=array("bmw","audi","mercedes");
        $voitures= array(array("id"=>1,"marque"=>"wv","serie"=>"200 tun 1000"),array("id"=>2,"marque"=>"bmw","serie"=>"124 tun 1001"),array("id"=>3,"marque"=>"mercedes","serie"=>"207 tun 1002"));
        return $this->render('@EspritParc/Voiture/indextable.html.twig', array(
            "voitures"=>$voitures
        ));
    }




}
