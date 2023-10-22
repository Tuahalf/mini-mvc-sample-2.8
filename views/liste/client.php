<div class="card">
    <div class="card-body">
        <form action="/rechercher" method="post">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <input type="search" name="text" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher" required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Rechercher</button>
            </div>
        </form>
    </div>
</div>
<br>
<div class="shadow-md relative overflow-x-auto sm:rounded-lg">
    <div class="card-body">
        Les clients
    </div>
</div>
<br>
<div class="shadow-lg relative overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-600">
        <tr>
            <th class="px-6 py-3">Id</th>
            <th class="px-6 py-3">Nom Prénom</th>
            <th class="px-6 py-3">email</th>
            <th class="px-6 py-3">Téléphone</th>
        </tr>
            <?php
                foreach ($clients as $leClient) {
                    echo '<tr>';
                    echo '<td class="px-6 py-2">' . $leClient->getId().'</td>';
                    echo '<td class="px-6 py-2">' . $leClient->getNom().' '. $leClient->getPrenom().'</td>';
                    echo '<td class="px-6 py-2">' . $leClient->getEmail().'</td>';
                    echo '<td class="px-6 py-2">' . $leClient->getTelephone().'</td>';
                    echo '<td class="px-0 py-2"> <a href=/client/'.$leClient->getId().'>Fiche</a> </td>';
                    echo '</tr>';
                }
            ?>
    </table>
    <?php
    if($page!=-1){ ?>
        <a href=?page=<?=$page-1?>><-Page précédente</a>
        <a href=?page=<?=$page+1?> class="absolute bottom-0 right-0">Page suivante-></a>
    <?php } ?>
    
</div>