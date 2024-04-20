<!-- //tout les input sans marque et bouttons -->
<form action="" method="GET">
    <input type="number" name="localisation" id="" placeholder="localisation">
    <input type="text" name="prix" id="" placeholder="prix" value="">
    <input type="text" name="année" id="" placeholder="année">
    <input type="text" name="kilométre" id="" placeholder="kilométre">
</form> 


<!-- //Select marque et les bouttona envoyer en GET -->
<form action="<?= $router->generate('vehicules-marque-filter'); ?>" method="GET">
    <input type="text" name="marque" id="" placeholder="brand">
   
    <input type="submit" value="Recherche">
</form>
<a href="#"><button>Vendre mon véhicule</button></a>
<a href="<?= $router->generate('vehicules-price-filter'); ?>"><button>Filter by price</button></a>
<div class="wrapfilter">
    <?php foreach ($allVehicules as $vehicule) {  ?>
        <div class="divVehiculeFilter">
            <img class="vehiculeFilterImage" src="<?= $imageUrl ?>images/<?= $vehicule->getPicture() ?>" alt="Voiture CategorieTop catégories">
            <div class="textArticleVehicule">
                <h3><?= $vehicule->getTitle() ?></h3>
                <h2><?= $vehicule->getPrice() ?> €</h2>
            </div>
        </div>
    <?php } ?>
</div>