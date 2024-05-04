<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    </head>

<body>

<div class="container">
      <h1 class='text-center m-5'>Votre Cours</h1>
      <table class="table">
        <thead class="thead-light">
      <tr>
        <th> </th>
        <th>Titre</th>
        <th>Type de fichier</th>
        <th colspan="2">Fichier</th>
        <th>Prof</th>
      </tr>
  </thead>
  <tbody>

          <?php for($i = 0; $i < count($data); $i++):?>
            <tr>
                <td></td>
                <td><?= $data[$i]->Titre ?></td>
                <td><?= ucfirst($data[$i]->Type) ?></td>
                <td> <a href="<?= ROOT . '/assets/uploads/'. $data[$i]->File ?>" target="_blank">
                <?php
                $icon = '';
                $file_extension = pathinfo($data[$i]->File, PATHINFO_EXTENSION);
                if ($file_extension == 'pdf') {
                    $icon = 'fa-solid fa-file';
                } elseif ($file_extension == 'mp4') {
                    $icon = 'fa-solid fa-play';
                }
                ?>
                <i class="fa-solid <?= $icon ?>"></i>
            </a></td>
            <td><a href="<?= ROOT . '/assets/images/'. $data[$i]->File ?>" download><i class="fa-solid fa-download"></i></a></td>
                <td><?= $data[$i]->Prof ?></td>
            </tr>
            
          <?php endfor; ?>
       
  </tbody>
</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

