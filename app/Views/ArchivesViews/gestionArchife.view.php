
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
  width: 350px;
  height: 254px;
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

.card:hover {
  border: 1px solid black;
  transform: scale(1.05);
}

.card:active {
  transform: scale(0.95) rotateZ(1.7deg);
}
body {
  background-image: url('../public/assets/images/pexels-vojtech-okenka-127162-392018.png');
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

    <a class="navbar-brand" href="../app/Views/Admin.view.php"><img src="data:image/jpeg;base64,<?= base64_encode(file_get_contents("../public/assets/images/t2.png")) ?>" alt="ENSAH"></a>

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
          <a class="nav-link" href="#">Log out</a>
      </ul>

    </div>

  </div>

</nav>

<div class="container mt-5">
    <div class="row pt-5 mb-5">
        <div class="col-md-4">
            <h3>
              <a href="<?= ROOT.'/'. 'ArchifesCourse'?>">
            <div class="card p-3 mb-2 "><i class="fa-solid fa-file icon fa-3x"></i>
                Archifer les Cours
                </div>
              </a></h3>
            </div>
        <div class="col-md-4">
                  <h3>
                 <a href="<?= ROOT.'/'. 'ArchifesAnnonces'?>">
                 <div class="card p-3 mb-2 "><i class="fa-solid fa-folder icon fa-3x"></i>
                    Archifer les Annonces
                  </div>
                </a></h3>
                
           
        </div>
        <div class="col-md-4">
    
              <h3>
                <a href="<?= ROOT.'/'. 'Consulter'?>">
                <div class="card p-3 mb-2 "><i class="fa-solid fa-archive icon fa-3x"></i>
                Consulter l'Archive
              </div></a></h3>
            
        </div>
    </div>
    
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>