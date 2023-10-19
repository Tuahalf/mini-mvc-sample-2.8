<?php

namespace controllers;

use controllers\base\WebController;
use models\ClientsModele;
use models\AdresseModel;
use models\classes\Adresse;
use utils\Template;

class ClientController extends WebController
{
    private $clientModele;
    private $adresseModele;
    private $adresse;

    function __construct()
    {
        $this->clientModele = new ClientsModele;
        $this->adresseModele = new AdresseModel;
        $this->adresse = new Adresse;
    }

    function liste($page = 0): string
    {
        $clients = $this->clientModele->liste(10, $page);
        return Template::render(
            "views/liste/client.php",
            array("page" => $page, "clients" => $clients)
        );
    }

    function rechercher()
    {
        $clients = $this->clientModele->recherche($_POST["text"]);
        return Template::render(
            "views/liste/client.php",
            array("clients" => $clients)
        );
    }

    public function fiche($id = "")
    {
        $clients = $this->clientModele->getByClientId($id);
        return Template::render(
            "views/liste/fiche.php",
            array("clients" => $clients)
        );
    }

    public function adresse($id = "")
    {
        $clients = $this->clientModele->getByClientId($id);
        return Template::render(
            "views/liste/adresse.php",
            array("clients" => $clients)
        );
    }

    public function ajoutAdresse($id = "")
    {
        $data = array();
        $clients = $this->clientModele->getByClientId($id);
        if(isset($_POST["nom"]) && isset($_POST["rue"]) && isset($_POST["cp"]) && isset($_POST["ville"])){
            $adresse=new Adresse();
            $adresse->setNom($_POST["nom"]);
            $adresse->setRue($_POST["rue"]);
            $adresse->setCodePostal($_POST["cp"]);
            $adresse->setVille($_POST["ville"]);
            $adresse->setClientId($id);
            $result=$this->adresseModele->creerAdresseClient($adresse);
            if($result){
                return $this->redirect("/client/$id");
            }
            else{
                $data["error"] = "L'ajout de l'adresse à échoué";
            }
        }
        else{
            $data["error"] = "Il manque des informations";
        }
        return Template::render("views/liste/adresse.php", $data);
    }

    public function suppAdresse($id = "")
    {
        $clients = $this->clientModele->getByClientId($id);
        return Template::render(
            "views/liste/fiche.php",
            array("clients" => $clients)
        );
    }
}
