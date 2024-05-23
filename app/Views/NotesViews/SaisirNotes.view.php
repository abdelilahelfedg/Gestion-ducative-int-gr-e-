<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisir Espace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
                   <?php if(isset($_GET['message'])){?>
                       <div class="card-body">
                        <div class="container mt-5">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>les notes sont enregistre/Modifier avec Succes</strong> 
                            </div>
                            </div> 
                            </div>
                    <?php }?>
<div class="container-lg bg-primary my-5">

        <div class="row justify-content-center">
            <div class="col-5">
            
                <div class="card bg-light my-5">
                
                    <div class="card-body">
                    
                        <div class="card-title text-center mb-3">saisir les informations</div>
                        <form method="POST" enctype="multipart/form-data">
                            
                            
                            
                            <div class="form-floating">
                                <select name="Module" class="form-select mb-3" id="floatingSelect" aria-label="Floating label select example">
                                    <?php for($i = 0; $i < count($data)-4; $i ++):?>
                                       <option ><?= $data[$i];?></option>
                                    <?php endfor; ?>
                                    
                                </select>
                                <label for="floatingSelect">Select Module</label>
                            </div>
                            <div class="form-floating">
                                <select name="Categorie" class="form-select mb-3" id="floatingSelect" aria-label="Floating label select example">
                                    <?php for($i = count($data)-4; $i < count($data); $i ++):?>
                                       <option ><?= $data[$i];?></option>
                                    <?php endfor; ?>
                                    
                                </select>
                                <label for="floatingSelect">Choisir la categorie des notes</label>
                            </div>
                            
                            <button class="btn btn-primary my-3">Confirmer</button>
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