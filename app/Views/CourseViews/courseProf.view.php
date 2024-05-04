<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage des Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container-lg bg-primary my-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card bg-light my-5">
                    <div class="card-body">
                        <div class="card-title text-center mb-3">Espace de Partage des Cours</div>
                        <form method="POST" enctype="multipart/form-data">
                            <label for="email" class="form-label">Objet de cours</label>
                            <input type="text" name="Titre" id="email" class="form-control mb-3" placeholder="Objet" required>
                            
                            <div class="form-floating">
                                <select name="Filiere" class="form-select mb-3" id="floatingSelect" aria-label="Floating label select example">
                                    <?php for($i = 0; $i < count($data); $i ++):?>
                                       <option ><?= $data[$i];?></option>
                                    <?php endfor; ?>
                                    
                                </select>
                                <label for="floatingSelect">Selectionner le Niveau</label>
                            </div>

                            <div>
                                <label>Selectionner le Type</label><br>
                                <input type='radio' name='Type' value='cours' required> Cours
                                <input type='radio' name='Type' value='td/tp'> Td/Tp
                                <input type='radio' name='Type' value='correction'> Correction
                            </div><br>
                            <label class="form-label">Choisir un fichier</label>
                            <input type="file" name="course" class="form-control" required>
                            <button class="btn btn-primary my-3">Partager</button>
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