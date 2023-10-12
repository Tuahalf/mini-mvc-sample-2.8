<?php

namespace controllers;

use controllers\base\WebController;
use models\ClientsModele;
use utils\Template;

class ClientController extends WebController
{
    private $clientModele;

    function __construct()
    {
        $this->clientModele = new ClientsModele;
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
}
