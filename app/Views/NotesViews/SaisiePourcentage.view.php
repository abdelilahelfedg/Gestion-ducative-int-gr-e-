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
                <h2>Saisir le pourcentage</h2>
                <form action="<?= ROOT ."/" ."NotesControl/SaisirPourcentage/?Module=".$data[0]."&Niveau=".$data[1] ?>" method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <?php unset($data[0]);
                                     unset($data[1]);
                                 for ($i = 2; $i < count($data)+2 ; $i++): ?>
                                   <th><?= $data[$i];?></th>
                                <?php endfor; ?>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                            <?php for ($i = 0; $i < count($data) ; $i++): ?>
                                <td><input type="number" min = "0" max = "100" name=<?="pourcentage". $i?> class="form-control" required></td>
                            <?php endfor; ?>
                            </tr>
                           
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">valider</button>
                    
                </form>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
