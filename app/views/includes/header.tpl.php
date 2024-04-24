<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>écolo'O</title>
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/reset.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/style.css">
</head>
    <body>
        <div class="container">
          <header>
            <section>
              <nav class="nav1">
                <ul class="nav1-ul">
                  <li><a href="<?= $router->generate('main-home')?>"><h1>Écol'O</h1></li></a>
                  <li><input type="search"  placeholder="🔎" class="research-bar"></li>
                  <a href="<?= $router->generate('connexion')?>"><li><h2>Connexion</h2></li></a>
                  <li><h2>Favoris</h2></li>
                  <li><h2>Panier</h2></li>
                </ul> 
              </nav>

              <nav class="nav2">
                <ul class="nav2-ul">
                <a href="<?= $router->generate('catalogue-vehicules')?>"><li><h2 class="dropdown">Véhicules</h2></li></a>
                    <ul class="dropdown-content drop-one">
                        <?php foreach($allVehicules as $vehicule){ ?><a href="#"><li><?= $vehicule->getBrand() ?></li></a> <?php }?>
                    </ul>
                  <li><h2 class="dropdown">Emplois</h2></li>
                    <ul class="dropdown-content drop-two">
                        <?php foreach($allEmploi as $emploi){ ?><a href="#"><li><?= $emploi->getName() ?></li></a> <?php }?>
                    </ul>
                  <li><h2 class="dropdown">Immobilier</h2></li>
                    <ul class="dropdown-content drop-three">
                        <?php foreach($allImmobilier as $immobilier){ ?><a href="#"><li><?= $immobilier->getName() ?></li></a> <?php }?>
                    </ul>
                  <li><h2 class="dropdown">Marché</h2></li>
                    <ul class="dropdown-content drop-four">
                        <?php foreach($allMarche as $marche){ ?><a href="#"><li><?= $marche->getName() ?></li></a> <?php }?>
                    </ul>
                  <li><h2 class="dropdown">Services</h2></li>
                    <ul class="dropdown-content drop-five">
                        <?php foreach($allService as $service){ ?><a href="#"><li><?= $service->getName() ?></li></a> <?php }?>
                    </ul>
                  <li><h2 class="dropdown">Travail avec nous</h2></li>
                    <ul class="dropdown-content drop-six">
                        <?php foreach($allTravailavecnous as $travailpournous){ ?><a href="#"><li><?= $travailpournous->getName() ?></li></a> <?php }?>
                    </ul>
                </ul>
              </nav>

            </section> 
          </header>