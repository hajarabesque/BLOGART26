<?php
include '../../../header.php';

if(isset($_GET['numStat'])){
    $numStat = $_GET['numStat'];
    $libStat = sql_select("STATUT", "libStat", "numStat = $numStat")[0]['libStat'];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification Statut</h1>
        </div>
        <div class="col-md-12">
            <!-- L'action pointe vers l'API d'update -->
            <form action="<?php echo ROOT_URL . '/api/statuts/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="libStat">Nom du statut</label>
                    
                
                    <input id="numStat" name="numStat" type="hidden" value="<?php echo($numStat); ?>" />
                    
                    <input id="libStat" name="libStat" class="form-control" type="text" value="<?php echo($libStat); ?>" autofocus="autofocus" />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Liste</a>
                    <button type="submit" class="btn btn-warning">Confirmer la modification</button>
                </div>
            </form>
        </div>
    </div>
</div>
