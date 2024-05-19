<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archifes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container-lg bg-success my-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card bg-light my-5">
                    <div class="card-body">
                        <div class="card-title text-center mb-3"><strong>Espace d'Archifage</strong></div>
                            <form method="POST" enctype="multipart/form-data">
                                        <div class="col-12">
                                            <label for="selectNiveauScolaire" class="form-label">Niveau scolaire</label>
                                            <select class="form-select" name="Niveau" require>
                                                <option value="all">Tous les niveaux</option>
                                                <?php for($i = 0; $i<count($data); $i++){?>
                                                    <option value="<?php echo $data[$i]; ?>"><?php echo strtoUpper($data[$i]); ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    <br>
                                        <div class="col-12">
                                            <label for="dateArchife" class="form-label" require>Configurer</label>
                                            <br>
                                            <input type="date" class="form-control" name="dateCours" require>
                                        </div>
                                        </div>
                                    <button type='submit' class="btn btn-primary mx-3 mb-3" name="bouton" value="valider">Valider</button>
                                
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>