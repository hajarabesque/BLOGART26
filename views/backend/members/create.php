<?php
include '../../../header.php';

// On récupère la liste des statuts pour remplir la liste déroulante
$statuts = sql_select("STATUT", "*");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="display-4">Création Membre</h1>
            <hr style="border: 2px solid black;">
        </div>

        <div class="col-md-8 offset-md-2 mt-4">
            <form action="<?php echo ROOT_URL; ?>/api/members/create.php" method="post">

                <div class="form-group mb-3">
                    <label for="prenomMemb">Prénom</label>
                    <input type="text" id="prenomMemb" name="prenomMemb" class="form-control" placeholder="Prénom" required>
                </div>

                <div class="form-group mb-3">
                    <label for="nomMemb">Nom</label>
                    <input type="text" id="nomMemb" name="nomMemb" class="form-control" placeholder="Nom" required>
                </div>

                <div class="form-group mb-3">
                    <label for="pseudoMemb">Pseudo</label>
                    <input type="text" id="pseudoMemb" name="pseudoMemb" class="form-control" placeholder="Pseudo (unique)" required>
                </div>

                <div class="form-group mb-3">
                    <label for="passMemb">Mot de passe</label>
                    <input type="password" id="passMemb" name="passMemb" class="form-control" placeholder="Mot de passe" required>
                </div>

                <div class="form-group mb-3">
                    <label for="eMailMemb">eMail</label>
                    <input type="email" id="eMailMemb" name="eMailMemb" class="form-control" placeholder="email@exemple.com" required>
                </div>

                <div class="form-group mb-3">
                    <label for="numStat">Statut</label>
                    <select id="numStat" name="numStat" class="form-control" required>
                        <option value="">-- Choisir un statut --</option>
                        <?php foreach($statuts as $statut) { ?>
                            <option value="<?php echo $statut['numStat']; ?>">
                                <?php echo $statut['libStat']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Accord RGPD -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="accordMemb" id="accordMemb" required>
                    <label class="form-check-label" for="accordMemb">
                        J'accepte que mes données soient conservées conformément au RGPD.
                    </label>
                </div>

                <!-- Zone reCAPTCHA (Visuel uniquement pour ton projet) -->
                <div class="card p-3 mb-4" style="max-width: 300px; background-color: #f9f9f9;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="captcha_check" required>
                        <label class="form-check-label" for="captcha_check">
                            Je ne suis pas un robot
                        </label>
                        <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" align="right" width="25">
                    </div>
                </div>

                <div class="form-group mt-4">
                    <a href="list.php" class="btn btn-outline-primary px-4">Liste</a>
                    <button type="submit" class="btn btn-outline-success px-4 ms-2">Confirmer la création</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include '../../../footer.php';
?>