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
                    <form  action="<?=ROOT . "/" . "AbsenceControl"  ?>" method="POST">
                    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Absent</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $objet):?>
            <tr>
                <th scope="row">#</th>
                <td><?=$objet->Email?></td>
                <td><?=$objet->Nom?></td>
                <td><?=$objet->Prenom?></td>
                <td><input class="form-check-input" type="checkbox" name="absent1[]" value="<?=$objet->Email;?>"></td>
            </tr>
            <?php endforeach;?>

        </tbody>
    </table>
    <input type="hidden" name="date_absence" value="<?=date('Y-m-d H:i:s')?>">
    <button class="btn btn-Success" type="submit" name="absent" value="submit">Valider</button>
    </form>

</div>

</body>
</html>