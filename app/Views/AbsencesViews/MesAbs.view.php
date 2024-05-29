<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes absences</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

.container{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 100px;
}
.form {
  background-color: #fff;
  box-shadow: 0 10px 60px rgb(0, 0, 0);
  border: 1px solid rgb(159, 159, 160);
  border-radius: 20px;
  padding: 2rem .7rem .7rem .7rem;
  text-align: center;
  font-size: 1.125rem;
  width: 550px;
}

.form-title {
  color: #000000;
  font-size: 1.8rem;
  font: Montserrat, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol, "Noto Color Emoji" !important;
  font-weight: 500;
}

.form-paragraph {
  margin-top: 10px;
  font-size: 0.9375rem;
  color: rgb(105, 105, 105);
}

.drop-container {
  background-color: #fff;
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 10px;
  margin-top: 2.1875rem;
  border-radius: 10px;
  border: 2px dashed rgb(171, 202, 255);
  color: #444;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
  display: flex;
}

.drop-container:hover {
  background: rgba(0, 140, 255, 0.164);
  border-color: rgba(17, 17, 17, 0.616);
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}

#file-input {
  width: 350px;
  max-width: 100%;
  color: #444;
  padding: 2px;
  background: #fff;
  border-radius: 10px;
  border: 1px solid rgba(8, 8, 8, 0.288);
}

#file-input::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #084cdf;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

#file-input::file-selector-button:hover {
  background: #0d45a5;
}

.input {
  border: none;
  outline: none;
  border-radius: 15px;
  padding: 1em;
  margin-left: 15px;
  background-color: #ccc;
  box-shadow: inset 2px 5px 10px rgba(0,0,0,0.1);
  transition: 300ms ease-in-out;
}
select{
  width: 260px;
}

button {
  --hover-shadows: 5px 5px 8px #121212, -5px -5px 8px #303030;
  --accent: fuchsia;
  font-weight: bold;
  border: none;
  border-radius: 1.1em;
  background-color:  #004225;
  cursor: pointer;
  color: white;
  width: 490px;
  height: 50px;
  margin-top: 10px;
  transition: box-shadow ease-in-out 0.3s, background-color ease-in-out 0.1s, letter-spacing ease-in-out 0.1s, transform ease-in-out 0.1s;
}

button:hover {
  box-shadow: var(--hover-shadows);
}
body {
  background-image: url('../public/assets/images/profbg.png');
  background-size: cover; 
  background-position: center; 
  background-repeat: no-repeat;
}

    </style>
</head>
<body>

<div class="container">
<form class="form" method="POST" enctype="multipart/form-data">
  <span class="form-title">Espace de Gestion des absences</span>
  <div class="form-paragraph">

    
    <select name="module_abs" class="input">
    <option value="" disabled selected>Choisissez un module Voir des Absences</option>

            <?php foreach ($data as $matrice): ?>
                <option value="<?php echo $matrice->id_module ; ?>"><?php echo $matrice->nom ; ?></option>
                        <?php endforeach; ?>

                    </select>
  </div>
 <button type="submit" name="voir_absence">Valider</button>

 <a href="<?= ROOT."/"."HomeProf"?>"><button>Retour</button></a>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
