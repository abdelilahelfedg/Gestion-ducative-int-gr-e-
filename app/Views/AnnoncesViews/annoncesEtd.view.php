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

<div class="container mt-5">
    <h2>Annonces</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Objet</th>
                <th>Niveau</th>
                <th>File</th>
                <th>Prof</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php for ($i = 0; $i < count($data); $i++): ?>
                    <tr>
                        <td><?= htmlspecialchars($data[$i]->Objet) ?></td>
                        <td><?= htmlspecialchars($data[$i]->Niveau) ?></td>
                        <td><a href="<?= ROOT . '/assets/images/' . htmlspecialchars($data[$i]->File) ?>" target="_blank">Télécharger</a></td>
                        <td><?= htmlspecialchars($data[$i]->Prof) ?></td>
                    </tr>
                <?php endfor; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
