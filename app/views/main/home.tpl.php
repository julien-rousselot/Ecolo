          <main>
            <section class="categories">
              <h3>Top catégories</h3>
                <div class="categories-top">
                  <article><img src="#" alt="Top Categorie"></article>
                  <article><img src="#" alt="Top Categorie"></article>
                  <article><img src="#" alt="Top Categorie"></article>
                  <article><img src="#" alt="Top Categorie"></article>
                  <article><img src="#" alt="Top Categorie"></article>
                </div>
              <h3>Top Véhicules</h3> 
                <div class="categories-vehicules">
                  <?php for ( $count = 0 ; $count < 3 ; $count++ ) { ?>
                  <div class="incategorie"><img class="img-categories" src="<?= $imageUrl ?>images/<?= $bestVehicules[$count]->getPicture()?>" alt="Voiture CategorieTop catégories">
                  <h3><?= $bestVehicules[$count]->getTitle() ?></h3>
                  <h2><?= $bestVehicules[$count]->getPrice() ?> €</h2>
                </div>
                 <?php } ?>
                </div>

              <h3>Top Emplois</h3>
                <div class="categories-emplois">
                  <article><img src="#" alt="Top Emplois"></article>
                  <article><img src="#" alt="Top Emplois"></article>
                  <article><img src="#" alt="Top Emplois"></article>
                  <article><img src="#" alt="Top Emplois"></article>
                  <article><img src="#" alt="Top Emplois"></article>
                </div>
            </section>
          </main>

         
          <?php
          //  dump(get_defined_vars()); 
          //pour voir toutes les variables qu'appel la classe
      
        
                 