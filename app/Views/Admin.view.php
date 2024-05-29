<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>

  .card {
  box-sizing: border-box;
  width: 415px;
  height: 270px;
  background: rgba(217, 217, 217, 0.58);
  border: 1px solid white;
  box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
  backdrop-filter: blur(6px);
  border-radius: 17px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s;
  display: flex;
  align-items: center;
  justify-content: center;
  user-select: none;
  font-weight: bolder;
  color: black;
}
@media (max-width: 1405px) {
  .card {
    width: 315px;
  }
}

@media (max-width: 900px) {
  .card {
    width: 460px;
  }
}

.card:hover {
  border: 1px solid black;
  transform: scale(1.05);
}

.card:active {
  transform: scale(0.95) rotateZ(1.7deg);
}
body {
  background-image: url('../public/assets/images/adminbg.png');
  background-size: cover; 
  background-position: center; 
  background-repeat: no-repeat;
}
.icon{
  padding: 20px; 
}
h3 a {
  text-decoration: none; 
  color: inherit; 
}
img{
  width: 70px;
  height: 60px;
  color: black;
}
.row{
  text-align: center;
  margin-bottom: -100px;
}
nav{
  box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
}
.nav-link {
  color: black;
}
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong p-4">

  <div class="container-fluid">

    <a class="navbar-brand" href=""><img src="data:image/jpeg;base64,<?= base64_encode(file_get_contents("../public/assets/images/t2.png")) ?>" alt="ENSAH"></a>

    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href=""><strong>Log out</strong></a>
      </ul>
    
    </div>

  </div>

</nav>

<div class="container mt-5">
    <div class="row pt-5 mb-5">
        <div class="col-lg-4 col-sm-12">
            <h3><a href="<?= ROOT.'/'. 'importationControl'.'/'.'ImporterEtud'?>"></a>
            <div class="card p-3 mb-2"><i class="fa-solid fa-user-plus icon fa-3x"></i>
                Importation des Etudiants
                </div>
              </a></h3>
            </div>
        <div class="col-lg-4 col-sm-12">
                  <h3>
                 <a href="<?= ROOT.'/'. 'AnnoncesControl'?>">
                 <div class="card p-3 mb-2 "><i class="fa-solid fa-share-alt icon fa-3x"></i>
                    Partage des Annonces
                  </div>
                </a></h3>
        </div>
        <div class="col-lg-4 col-sm-12">
    
              <h3>
                <a href="<?= ROOT.'/'. 'ArchifesControl'?>">
                <div class="card p-3 mb-2 "><i class="fa-solid fa-archive icon fa-3x"></i>
                Gestion des Archifages
              </div></a></h3>
            
        </div>
           <div class="card p-3 mb-2 ">
 
           <h3><a href="<?= ROOT . '/assets/images/mdp.csv'?>" download>les mots de passe ici</a></h3>
        </div>
    </div>
    
</div>














<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
