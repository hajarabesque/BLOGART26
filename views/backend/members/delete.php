<?php
include '../../../header.php';

// 1. Récupération du membre à supprimer
if (isset($_GET['numMemb'])) {
    $numMemb = $_GET['numMemb'];
    
    // Requête avec jointure pour récupérer le libellé du Statut
    $membre = sql_select(
        "MEMBRE INNER JOIN STATUT ON MEMBRE.numStat = STATUT.numStat", 
        "MEMBRE.*, STATUT.libStat", 
        "numMemb = $numMemb"
    )[0];

    // Formatage de la date (pour passer de YYYY-MM-DD à DD/MM/YYYY)
    $dateCrea = date("d/m/Y H:i:s", strtotime($membre['dtCreaMemb']));
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="display-4">Suppression Membre</h1>
            <hr style="border: 2px solid black;">
        </div>

        <div class="col-md-8 offset-md-2 mt-4">
            <!-- Formulaire pointant vers l'API de suppression -->
            <form action="<?php echo ROOT_URL; ?>/api/members/delete.php" method="post">
                
                <!-- ID caché pour l'envoi -->
                <input type="hidden" name="numMemb" value="<?php echo $membre['numMemb']; ?>">

                <!-- Numéro (Readonly) -->
                <div class="form-group mb-3">
                    <label>Numéro</label>
                    <input type="text" class="form-control" value="<?php echo $membre['numMemb']; ?>" readonly>
                </div>

                <!-- Pseudo (Readonly) -->
                <div class="form-group mb-3">
                    <label>Pseudo</label>
                    <input type="text" class="form-control" value="<?php echo $membre['pseudoMemb']; ?>" readonly>
                </div>

                <!-- Date création (Readonly) -->
                <div class="form-group mb-3">
                    <label>Date création</label>
                    <input type="text" class="form-control" value="<?php echo $dateCrea; ?>" readonly>
                </div>

                <!-- Prénom (Readonly) -->
                <div class="form-group mb-3">
                    <label>Prénom</label>
                    <input type="text" class="form-control" value="<?php echo $membre['prenomMemb']; ?>" readonly>
                </div>

                <!-- Nom (Readonly) -->
                <div class="form-group mb-3">
                    <label>Nom</label>
                    <input type="text" class="form-control" value="<?php echo $membre['nomMemb']; ?>" readonly>
                </div>

                <!-- eMail (Readonly) -->
                <div class="form-group mb-3">
                    <label>eMail</label>
                    <input type="text" class="form-control" value="<?php echo $membre['eMailMemb']; ?>" readonly>
                </div>

                <!-- Statut (Readonly) -->
                <div class="form-group mb-4">
                    <label>Statut</label>
                    <input type="text" class="form-control" value="<?php echo $membre['libStat']; ?>" readonly>
                </div>

                <!-- Zone reCAPTCHA (Placeholder) -->
                <div class="card p-3 mb-4" style="max-width: 300px; background-color: #f9f9f9;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="captcha" required>
                        <label class="form-check-label" for="captcha">
                            Je ne suis pas un robot
                        </label>
                        <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" align="right" width="25">
                    </div>
                </div>

                <!-- Boutons -->
                <div class="form-group">
                    <a href="list.php" class="btn btn-outline-primary px-4">List</a>
                    <button type="submit" class="btn btn-outline-danger px-4 ms-2">Confirmer Delete ?</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include '../../../footer.php';
?>