<?php if (isset($_SESSION['username'])&&!empty($courses)): ?>
    <div class="presentation-index">
        <div class="selection-cours">
            <p>Notre selection de cours pour vous</p>

            <div class="buttons">
				<?php /** @var array $courses */
					foreach ($courses as $cours): ?> 
					<div class="button-fill">
						<div class="button-content"><a href="cours/voir/<?= $cours['slug'] ?>"><?= $cours['name'] ?></a></div>
					</div>
				<?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="container">
    <div class="lists">
        <div class="list">
            <div class="list-text">
                <h3>Par des étudiants, pour des étudiants</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id temporibus consequuntur laborum a optio. Laborum expedita ratione fugit esse, consectetur incidunt. Maiores sit excepturi quae nisi ab sapiente aspernatur dignissimos!</p>
            </div>
            <img class="list-img" src="./assets/images/online-courses.svg" alt="">
        </div>

        <div class="list">
            <div class="list-text">
                <h3>Pas de magie seulement du code !</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum a mollitia repellendus neque delectus commodi provident porro! Consequatur, dolores laborum deserunt ducimus aliquid beatae ullam ipsum adipisci quam. Est, tempore!</p>
            </div>
            <img class="list-img" src="./assets/images/code.svg" alt="">
        </div>

        <div class="list">
            <div class="list-text">
                <h3>Sans compter une interface étudiée pour faciliter l'apprentissage</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia reiciendis facilis qui dolore quod illo saepe. Eum libero eveniet quibusdam vero, dolor facilis adipisci dignissimos, ex, nemo pariatur corporis eius.</p>
            </div>
            <img class="list-img" src="./assets/images/book.svg" alt="">
        </div>
    </div>
    
</div>
