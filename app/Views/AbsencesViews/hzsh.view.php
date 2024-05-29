<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Statistiques des absents</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.min.css" rel="stylesheet">
<style>
    /* CSS personnalisé pour DataTables */
    
    
    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
        color: #4a5568;
        padding: .5rem 1rem;
        line-height: 1.25;
        border-width: 2px;
        border-radius: .25rem;
        border-color: #edf2f7;
        background-color: #edf2f7;
    }

    table.dataTable.hover tbody tr:hover,
    table.dataTable.display tbody tr:hover {
        background-color: #ebf4ff;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-weight: 700;
        border-radius: .25rem;
        border: 1px solid transparent;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: black !important;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .1), 0 1px 2px rgba(0, 0, 0, .06);
        font-weight: 700;
        border-radius: .25rem;
        background: lightblue !important;
        border: 1px solid transparent;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: #fff !important;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .1), 0 1px 2px rgba(0, 0, 0, .06);
        font-weight: 700;
        border-radius: .25rem;
        background: lightblue !important;
        border: 1px solid transparent;
    }

    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;
        margin: 0.75em 0;
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
        background-color: #667eea !important;
    }

    .btn {
        background-color: #28a745;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        border: none;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #218838;
    }

    .container5 {
        display: flex;
        justify-content: flex-end;
    }
    a{
        margin-right:7px;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
        padding: 8px;
    }
    body {
        background-color: rgba(191,219,254,var(--tw-bg-opacity));
        background-image: url('../public/assets/images/profbg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
</head>
<body class="bg-blue-200 text-gray-900 tracking-wider leading-normal">
<div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
    <h1 class="flex items-center font-sans font-bold break-normal text-white px-2 py-8 text-xl md:text-2xl">
        <div class="mx-2">Espace de Gestion des absences</div>
    </h1>
    <div id="recipients" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <table id="example" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nombre absence en cours</th>
                    <th scope="col">Nombre absence en tp</th>
                    <th scope="col">Nombre absence total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $objet): ?>
                <tr>
                    <td><?= $objet->Email ?></td>
                    <td><?= $objet->Nom ?></td>
                    <td><?= $objet->Prenom ?></td>
                    <td><?= $objet->nb_cours ?></td>
                    <td><?= $objet->nb_tp ?></td>
                    <td><?= $objet->nb_total ?></td>
                    <td><a href="<?= ROOT . "/" . "AbsenceControl" . "/" . "Detail" . "/" . $objet->Email; ?>" class="text-primary">Detail</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <div class="container5">
        <a href="<?= ROOT."/"."HomeProf"?>"><button class="btn">Retour au home</button></a>
            <form action="<?= ROOT."/"."AbsenceControl"?>" method="POST">
            <button class="btn" type="submit" name="retour_en_arriere" value="submit">Retour en arrière</button>
            </form>
        </div>        
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>


<script>
   new DataTable('#example', {
    responsive: true
});
  
</script>

</body>
</html>
