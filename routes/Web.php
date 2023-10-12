<?php

namespace routes;

use controllers\ClientController;
use controllers\SampleWebController;
use routes\base\Route;
use utils\Template;

class Web
{
    function __construct()
    {
        $main = new SampleWebController();
        $client = new ClientController();

        // Appel la méthode « home » dans le contrôleur $main.
        Route::Add('/', [$client, 'liste']);
        Route::Add('/rechercher', [$client, 'rechercher']);
        Route::Add('/client/{id}', [$client, 'fiche']);

        // Appel la fonction inline dans le routeur.
        // Utile pour du code très simple, où un tes, l'utilisation d'un contrôleur est préférable.
        Route::Add('/about', function () {
            return Template::render('views/global/about.php');
        });

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}

