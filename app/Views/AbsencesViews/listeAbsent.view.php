<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage des Absence</title>
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
                    <div>Récapitulatif des absents pour la <strong><?= $data['nb_seance'].' séance ' .$data['date'].'  '. $data['type']  ;  ?></strong></div>
                    <div>Liste des Absents <br><strong><?= count($data['etud']). ' Absents';?></strong> </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data['etud'] as $etudiant):?>
                            <tr>
                                <th scope="row">#</th>
                                <td><?= $etudiant->Nom ?></td>
                                <td><?= $etudiant->Prenom ?></td>
                               
                         
                            </tr>
                        <?php endforeach;?>    
                        </tbody>
                    </table>
                    <form action="" method="POST">
                        <button class="btn btn-success" type="submit" name="passer">Passer</button>
                    </form>
        </div>
            </div>
    </div>
</div>
</body>
</html>
