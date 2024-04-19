<form action="" method="GET">
    <input type="number" name="prix" id="" placeholder="prix">
    <input type="text" name="localisation" id="" placeholder="localisation" value="">
        <select name="marque" id="">
            <?php foreach($allVehicules as $vehicule){ ?>
                <option value=""><?= $vehicule->getBrand()?></option>
            <?php }?>
        </select>
    <input type="text" name="année" id="" placeholder="année">
    <input type="text" name="kilométre" id="" placeholder="kilométre">
    <input type="submit" value="Recherche">
</form>


    <a href="<?= $router->generate('vehicules-price-filter'); ?>"><button>Filter by price</button></a>
    <h1 class="vehiculeFilterTitre">Véhicules éléctriques</h1>

<div class="wrapfilter">
    <?php
    foreach($allPriceFilterVehicules as $vehicule){ ?>
        <div class="divVehiculeFilter">
            <img class="vehiculeFilterImage" src="<?=$baseUrl?>/images/<?=$vehicule->getPicture()?>" alt="toutes les voitures par filtre de prix">
            <div class="textArticleVehicule">
                <h3><?= $vehicule->getTitle()?></h3>
                <h3><?= $vehicule->getPrice()?>€</h3>
                <h5>Année <?= $vehicule->getYear()?></h5>
                <h5>Kilométre <?= $vehicule->getKilometer()?></h5>
            </div>
        </div>
    <?php }?>  
</div>