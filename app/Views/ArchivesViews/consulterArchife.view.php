<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archife</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    </head>

<body>

<div class="container">
      <h1 class='text-center m-5'>Archife</h1>
      <table class="table">
        <thead class="thead-light">
      <tr>
        <th></th>
        <th>Titre</th>
        <th>Date d'Archifage</th>
        <th>Type de Fichier</th>
        <th>Récupérer</th>
      </tr>
  </thead>
  <tbody>
          <?php for($i = 0; $i < count($data); $i++){?>
            <tr>
                <td></td>
                <td><?= $data[$i]['Titre'] ?></td>
                <td><?= $data[$i]['DateArch'] ?></td>
                <?php if($data[$i]['Origine'] == 'Document'){?>
                  <td><?= $data[$i]['Origine'] ?></td>
                  <td><a href="<?php ROOT . '/assets/uploads/'. $data[$i]['Fichier'] ?>" download><i class="fa-solid fa-download"></i></a></td>
                <?php }else{ ?>
                  <td><?= $data[$i]['Origine'] ?></td>
                  <td><a href="<?php ROOT . '/assets/images/'. $data[$i]['Fichier'] ?>" download><i class="fa-solid fa-download"></i></a></td> <!-- à etre changé selon le grand MVC final-->
                <?php }?>
            </tr>
            
          <?php } ?>
       
  </tbody>
</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

