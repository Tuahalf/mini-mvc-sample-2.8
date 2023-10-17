<div class="mx-20">
    <div class="shadow-md relative sm:rounded-lg bg-neutral-100">
        <div class="card-body font-bold">
            Client / <?= $clients->getNom() ?> / Information
        </div>
    </div>
    <br>
    <div class="shadow-md relative sm:rounded-lg bg-neutral-100">
        <h2 class="font-bold mt-2 ml-2">Données générales</h2>
        <br>
        <div class="grid grid-cols-2 gap-8">
            <div class="shadow-md relative sm:rounded-lg bg-neutral-200 mx-8">
                <h2 class="mt-2 ml-2 font-bold">Nom</h2>
                <p class="mt-2 ml-2 mb-2"><?= $clients->getNom() ?></p>
            </div>
            <div class="shadow-md relative sm:rounded-lg bg-neutral-200 mx-8">
                <h2 class="mt-2 ml-2 font-bold">Prénom</h2>
                <p class="mt-2 ml-2 mb-2"><?= $clients->getPrenom() ?></p>
            </div>
            <div class="shadow-md relative sm:rounded-lg bg-neutral-200 mb-8 mx-8">
                <h2 class="mt-2 ml-2 font-bold">Téléphone</h2>
                <p class="mt-2 ml-2 mb-2"><?= $clients->getTelephone() ?></p>
            </div>
            <div class="shadow-md relative sm:rounded-lg bg-neutral-200 mb-8 mx-8">
                <h2 class="mt-2 ml-2 font-bold">Email</h2>
                <p class="mt-2 ml-2 mb-2"><?= $clients->getEmail() ?></p>
            </div>
        </div>
    </div>
    <br><br>
    <div class="shadow-md relative sm:rounded-lg bg-neutral-100">
        <div class="card-body font-bold">
            Les produits
        </div>
    </div>
    <br>
    <div class="shadow-md relative overflow-x-auto sm:rounded-lg bg-neutral-100">
        <div class="card-body">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-600">
                <tr>
                    <th class="px-6 py-3">Id</th>
                    <th class="px-6 py-3">Nom</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6 py-3">Prix</th>
                    <th class="px-6 py-3">Créé le</th>
                </tr>
                <?php foreach ($clients->lesProduits() as $leProduit) { ?>
                    <tr>
                        <th> <?= $leProduit->getId(); ?> </th>
                        <th> <?= $leProduit->getNom(); ?> </th>
                        <th> <?php $chaine = $leProduit->getDescription();

                                if (strlen($chaine) > 10) {
                                    $chaine = substr($chaine, 0, 10);
                                }

                                echo $chaine; ?> </th>
                        <th> <?= $leProduit->getPrix(); ?> </th>
                        <th> <?= $leProduit->getId(); ?> </th>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <br><br>
    <!-- Deuxième tableau ici, enveloppé dans un div séparé -->
    <div class="shadow-md relative sm:rounded-lg bg-neutral-100">
        <div class="card-body font-bold">
            Les adresses
        </div>
    </div>
    <br>
    <div class="shadow-md relative overflow-x-auto sm:rounded-lg bg-neutral-100">
        <div class="card-body">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-600">
                <tr>
                    <th class="px-6 py-3">Nom</th>
                    <th class="px-6 py-3">Rue</th>
                    <th class="px-6 py-3">Code Postal</th>
                    <th class="px-6 py-3">Ville</th>
                </tr>
                <?php foreach ($clients->lesAdresses() as $lAdresse) { ?>
                    <tr>
                        <th> <?= $lAdresse->getNom(); ?> </th>
                        <th> <?= $lAdresse->getRue(); ?> </th>
                        <th> <?= $lAdresse->getCodePostal(); ?></th>
                        <th> <?= $lAdresse->getVille(); ?> </th>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</div>