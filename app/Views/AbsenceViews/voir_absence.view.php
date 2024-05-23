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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">nb_absence_cours</th>
                                <th scope="col">nb_absence_tp</th>
                                <th scope="col">nb_absence_total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $objet): ?>
                            <?php
                                // Vérifiez si le nombre d'absences totales est supérieur à 7
                                if ($objet->nb_total > 7) {
                                    // Si oui, utilisez la couleur rouge pour la ligne
                                    $row_color = 'background-color: red;';
                                } else {
                                    // Sinon, utilisez la couleur par défaut (blanc)
                                    $row_color = '';
                                }
                            ?>
                            <tr>
                                <th scope="row">#</th>
                                <td><?= $objet->Email ?></td>
                                <td><?= $objet->Nom ?></td>
                                <td><?= $objet->Prenom ?></td>
                                <td><?= $objet->nb_cours ?></td>
                                <td><?= $objet->nb_tp ?></td>
                                <td style="<?= $row_color ?>"><?= $objet->nb_total ?></td>
                                <td><a href="<?= ROOT . "/" . "AbsenceControl" . "/" . "Detail". "/" . $objet->Email;?>">Detail</a></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

