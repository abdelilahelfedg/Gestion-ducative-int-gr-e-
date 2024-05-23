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
                <h2>Modifier Notes</h2>
                <form method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Etudiant</th>
                                <th><?= $categorie?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php unset($data['categorie']);
                            foreach($data as $key => $value): ?>
                            <tr>
                                <td><?= $key?></td>
                                <td><input value="<?= $value?>" type="number" min = "0" max = "20" name="note[]" class="form-control" required></td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>