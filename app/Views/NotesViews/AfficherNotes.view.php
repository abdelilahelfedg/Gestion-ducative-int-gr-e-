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

        <div class="container mt-5">
                <h2><?="Tableau d'affichage: ". $_SESSION['Etudiant'][0]->Prenom ." ". $_SESSION['Etudiant'][0]->Nom?></h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <?php for($i = 0; $i < 5; $i++){?>
                           <th scope="col"><?= $data[$i]?></th>
                        <?php unset($data[$i]); } ?>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $key=> $value){ 
                            if($key != 'moyenne_general'){?>
                            <tr>
                            <th scope="row"><?=$key?></th>
                            <?php for( $i = 0; $i < count($value); $i++){
                                if($value[$i] == -1){$value[$i] = '-' ;}?>
                                <td><?= $value[$i]?></td>
                            <?php }?>
                            <?php }?>
                            
                            </tr>
                        <?php }?>
                        
                    </tbody>
                </table>
                <h3>Moyenne General:  </h3> <?= $data['moyenne_general'] ?>
                 
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>