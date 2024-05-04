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
                    <a href="<?= ROOT . "/" . "AbsenceControl" . "/" . "Faire_Absence";?>"><button class="btn btn-success mb-3" type="submit" name="Faire_Absence">Faire Absence</button></a>

                    <form method="POST" enctype="multipart/form-data">
                        <!-- Bouton "Faire Absence" -->
                        <!-- Sélecteur du nombre de séances -->
                        <div class="form-group">
                            <label for="nombre_seance">Nombre de séance</label>
                            <select class="form-select" id="nombre_seance" name="nombre_seance">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <!-- Ajoutez d'autres options selon vos besoins -->
                            </select>
                        </div>
                        
                        <!-- Bouton "Valider" -->
                        <button class="btn btn-success" type="submit" name="submit">Valider</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>

