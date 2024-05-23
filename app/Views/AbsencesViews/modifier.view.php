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
                    <form  id="myForm" action="<?=ROOT . "/" . "AbsenceControl" ."/". "Update" ?>" method="POST">
                    <select name="nb_seance" id="">
                    <option value="" disabled selected>Choisissez la seance à modifier</option>
                    <?php foreach($data as $seance):?>
                    <option value="<?=$seance->nb_seance; ?>"><?=$seance->nb_seance; ?></option>
                    <?php endforeach;?>
                    </select>
                    <button class="btn btn-success" type="submit" name="supprimer" value="submit">Supprimer</button>
                    <button class="btn btn-success" type="submit" name="modifier_seance" value="submit">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>