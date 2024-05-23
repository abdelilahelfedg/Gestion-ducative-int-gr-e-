<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage des Annonces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<table class="table m-5 me-5">
  <thead class="table-light">
      <tr>
        <th>Etudiant</th>
        <th>Niveau</th>
        <th>Date de depot</th>
        <th>heure de depot</th>
        <th>file</th>
      </tr>
  </thead>
  <tbody> 
          
          <?php for($i = 0; $i < count($data); $i++):?>
            <tr>
                <td><?= $data[$i]->nom_prenom ?></td>
                <td><?= $data[$i]->Niveau ?></td>
                <td><?= $data[$i]->date_depot ?></td>
                <td><?= $data[$i]->time_depot ?></td>
                <td><a href="<?= ROOT . '/assets/ComptesRendus/'. $data[$i]->File ?>">lien</a></td>
                
            </tr>
            
          <?php endfor; ?>
         
  </tbody>
</table>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>