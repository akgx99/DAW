<div class="container">
    <h1>Phrase d'accroche</h1>

    <div class="buttons">
        <div class="button">
            <div class="button-content">Explorer</div>
        </div>
        <div class="button">
            <div class="button-content">En Cours</div>
        </div>
        <div class="button">
            <div class="button-content">Achevés</div>
        </div>
        <div class="button">
            <div class="button-content">Date</div>
        </div>
    </div>
    <div class="lists">
        <?php /** @var array $courses */
        foreach ($courses as $cours): ?> 
            <div class="list">
                <div class="list-text">
                    <h2><a href="cours/voir/<?= $cours['slug'] ?>"><?= $cours['name'] ?></a></h2>
                </div>
                <img class="list-img" src="//<?= HOST . '/' . FOLDER_ROOT ?>/assets/images/<?= $cours['image'] ?>">
            </div>
        <?php endforeach ?>
    </div>
</div>