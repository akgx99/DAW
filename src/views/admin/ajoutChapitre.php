<div class="container">
    <a href="../../admin/cours" class="goBack"><i class="fas fa-arrow-left"> </i> <span>retour à la gestion des cours</span></a>

    <div class="form-admin">
        <?php if(!empty($_POST['name'])): ?>
            <?php require_once(ROOT.'src/forms/admin/ajoutChapitreAction.php') ?>
        <?php endif; ?>
        <?php if(isset($_POST['course_name'])): ?>
            <div class="form-head">
                <h3>Ajout d'un chapitre au cours "<?= $_POST['course_name'] ?>"</h3>
            </div>
            <?php require_once(ROOT.'src/forms/admin/ajoutChapitreForm.php') ?>  
        <?php else: ?>
            
        <?php endif; ?>
    </div>
</div>

</div>