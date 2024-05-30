<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage des Annonces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class='bg-primary'>
<nav class="navbar navbar-expand-lg bg-body-tertiary p-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= ROOT . "/HomeAdmin"?>"><strong>Ensah</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= ROOT . "/logout"?>">Log out</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
      </ul>
      
    </div>
  </div>
</nav>
<div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card bg-light my-5">
                    <div class="card-body">
                        <div class="card-title text-center mb-3">Espace de Partage des Annonces</div>
                        <form method="POST" enctype="multipart/form-data">
                            <label for="email" class="form-label">Objet de l'annonce</label>
                            <input type="text" name="Objet" id="email" class="form-control mb-3" placeholder="Objet" required>
                            
                            
                            <label class="form-label">Choisir un fichier</label>
                            <input type="file" name="pdf" class="form-control" required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
