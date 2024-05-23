<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage des Annonces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-lg bg-primary my-5">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card bg-light my-5">
                <div class="card-body">
                    <div class="card-title text-center mb-3">Espace de Gestion des absences</div>

                    <form method="POST" enctype="multipart/form-data">
    <div class="form-floating">
        <?php ($filieres = $data['filière']); ?>
        <select name="module" class="form-select mb-3" id="floatingSelect" aria-label="Floating label select example">
        <option value="" disabled selected>Choisissez une module</option>

            <?php foreach ($filieres as $filiere): ?>
                <optgroup label="<?php echo $filiere; ?>">
                    <?php foreach ($data as $matrice): ?>
                        <?php if (is_object($matrice) && $matrice->filière == $filiere): ?>
                            <?php if ($matrice->email_prof_tp == $_SESSION['Professeur'][0]->Email && $matrice->email_prof_cours == $_SESSION['Professeur'][0]->Email): ?>
                                <option value="<?php echo $matrice->id_module . '/TP' .'/'. $filiere; ?>"><?php echo $matrice->nom .' TP'; ?></option>
                                <option value="<?php echo $matrice->id_module . '/Cours' .'/'. $filiere; ?>"><?php echo $matrice->nom .' cours'; ?></option>
                            <?php elseif ($matrice->email_prof_cours == $_SESSION['Professeur'][0]->Email): ?>
                                <option value="<?php echo $matrice->id_module . '/Cours' . '/'.$filiere; ?>"><?php echo $matrice->nom .' cours'; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $matrice->id_module . '/TP' . '/'.$filiere; ?>"><?php echo $matrice->nom .' TP'; ?></option>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </optgroup>
            <?php endforeach; ?>
        </select>
        <label for="floatingSelect">Choisissez le module</label>
    </div>
    <button class="btn btn-primary" type="submit" name="submit">Valider</button>
</form>


                </div>
            </div>
        </div>
