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
                <h2>Remplir le tableau</h2>
                <form method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Etudiant</th>
                                <th><?= $data[0];?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 1; $i < count($data) ; $i++): ?>
                            <tr>
                                <td><?= $data[$i]?></td>
                                <td><input type="number" min = "0" max = "20" name="note[]" class="form-control" required></td>
                                
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>