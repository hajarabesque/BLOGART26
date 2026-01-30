<?php
include '../../../header.php';

if (isset($_GET['numMemb'])) {
    $numMemb = $_GET['numMemb'];
    
    // 1. Récupérer les infos du membre
    $membre = sql_select("MEMBRE", "*", "numMemb = $numMemb")[0];

    // 2. Récupérer tous les statuts possibles pour la liste déroulante
    $statuts = sql_select("STATUT", "*");
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Modification Membre</h1>
            <hr style="border: 2px solid black;">
        </div>

        <div class="col-md-8 offset-md-2 mt-4">
            <form action="<?php echo ROOT_URL; ?>/api/members/update.php" method="post">
                
                <!-- ID caché indispensable pour l'UPDATE -->
                <input type="hidden" name="numMemb" value="<?php echo $membre['numMemb']; ?>">

                <div class="form-group mb-3">
                    <label>Prénom</label>
                    <input type="text" name="prenomMemb" class="form-control" value="<?php echo $membre['prenomMemb']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Nom</label>
                    <input type="text" name="nomMemb" class="form-control" value="<?php echo $membre['nomMemb']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Pseudo (ne peut pas être modifié)</label>
                    <input type="text" class="form-control" value="<?php echo $membre['pseudoMemb']; ?>" readonly disabled>
                </div>

                <div class="form-group mb-3">
                    <label>eMail</label>
                    <input type="email" name="eMailMemb" class="form-control" value="<?php echo $membre['eMailMemb']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Statut</label>
                    <select name="numStat" class="form-control">
                        <?php foreach($statuts as $statut) { ?>
                            <option value="<?php echo $statut['numStat']; ?>" <?php echo ($statut['numStat'] == $membre['numStat']) ? 'selected' : ''; ?>>
                                <?php echo $statut['libStat']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label>Accord RGPD</label>
                    <select name="accordMemb" class="form-control">
                        <option value="1" <?php echo ($membre['accordMemb'] == 1) ? 'selected' : ''; ?>>Oui</option>
                        <option value="0" <?php echo ($membre['accordMemb'] == 0) ? 'selected' : ''; ?>>Non</option>
                    </select>
                </div>

                <div class="form-group mt-4">
                    <a href="list.php" class="btn btn-outline-primary px-4">List</a>
                    <button type="submit" class="btn btn-outline-warning px-4 ms-2">Confirmer la modification</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include '../../../footer.php'; ?>