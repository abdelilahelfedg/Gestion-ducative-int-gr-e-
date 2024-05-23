<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary p-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<div class="container my-5 ">
    <div class="row pt-5 mb-5">
        <div class="col-md-4">
            <div class="card p-3 mb-2 ">
                <a href="<?= ROOT."/"."NotesControl/Saisir"?>" class="btn btn-lg btn-info border border-0">Saisir Notes</a>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                 <a href="<?= ROOT."/"."NotesControl/Modifier"?>" class="btn btn-lg btn-info border border-0">Modifier Notes</a>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 mb-2">
              <div class="card-body">
                <?php if(isset($_GET['message'])){ ?>
                    <div class="container mt-5">
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erreur! la somme des pourcentages doit etre egale a 100</strong>
                      </div>
                    </div>
                <?php }?>
                <?php if(isset($_GET['message2'])){ ?>
                    <div class="container mt-5">
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erreur! il faut que au moins la note de DS et Examen doivent etre saisie</strong>
                      </div>
                    </div>
                <?php }?>
                <?php if(isset($_GET['message3'])){ ?>
                    <div class="container mt-5">
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Calcule de la moyenne fait avec Success</strong>
                      </div>
                    </div>
                <?php }?>
                <h5 class="card-title">Select Module</h5>
                <form action="<?= ROOT ."/" ."NotesControl/ChoixModule" ?>" method="POST">
                    
                    <div class="form-floating">
                        <select name="Module" class="form-select mb-3" id="floatingSelect" aria-label="Floating label select example">
                            
                            <?php for($i = 0; $i < count($data); $i ++):?>
                                <option><?= $data[$i];?></option>
                            <?php endfor; ?>
                        </select>
                        <label for="floatingSelect">Select Module</label>
                    </div>
                    <button id="validationBtn" class="btn btn-primary">valider</button>
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