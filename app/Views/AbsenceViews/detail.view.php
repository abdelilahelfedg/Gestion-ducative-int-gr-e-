<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage des Absences</title>
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
                    <div>Detail d'absence sur <strong><?= $data['info']->Nom .' '. $data['info']->Prenom;   ?></strong></div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nb_seance</th>
                                <th scope="col">date</th>
                                <th scope="col">Type seance</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i=0;$i<count($data)-1;$i++):?>

                            <?php $objet = $data[$i]; ?>

                            <tr>
                                <th scope="row">#</th>
                                <td><?= $objet->nb_seance ?></td>
                                <td><?= $objet->date ?></td>
                                <td><?= $objet->type_seance ?></td>
                               
                         
                            </tr>
                        <?php endfor;?>    
                        </tbody>
                    </table>
        </div>
            </div>
    </div>
</div>
</body>
</html>

