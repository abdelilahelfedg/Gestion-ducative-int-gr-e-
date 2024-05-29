<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>detail des absences</title>
<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<style>
.dataTables_wrapper select,
.dataTables_wrapper .dataTables_filter input {
    color: #4a5568;
    padding-left: 1rem;
    padding-right: 1rem;
    padding-top: .5rem;
    padding-bottom: .5rem;
    line-height: 1.25;
    border-width: 2px;
    border-radius: .25rem;
    border-color: #edf2f7;
    background-color: #edf2f7;
}

table.dataTable.hover tbody tr:hover,
table.dataTable.display tbody tr:hover {
    background-color: #ebf4ff !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    font-weight: 700;
    border-radius: .25rem;
    border: 1px solid transparent;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    color: black !important;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    font-weight: 700;
    border-radius: .25rem;
    background: lightblue !important;
    border: 1px solid transparent;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    color: #fff !important;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    font-weight: 700;
    border-radius: .25rem;
    background: lightblue !important;
    border: 1px solid transparent;
}

table.dataTable.no-footer {
    border-bottom: 1px solid #e2e8f0;
    margin-top: 0.75em;
    margin-bottom: 0.75em;
}

body {
    background-image: url('../public/assets/images/profbg.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
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
        margin-right:5px;
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

th, td {
    text-align: center; 
    vertical-align: middle;
    padding: 8px;
}
</style>
</head>
<body class="bg-blue-200 text-gray-900 tracking-wider leading-normal">

<!-- Ajout du titre centré -->
<h1 class="text-center font-sans font-bold text-white text-xl md:text-2xl my-4">Détails d'absence</h1>

<div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">

<h1 class="flex items-center font-sans font-bold break-normal text-white px-2 py-8 text-xl md:text-2xl">
    <div class="mx-2"></div>
</h1>

<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

<div>Detail d'absence sur <strong><?= $data['info']->Nom .' '. $data['info']->Prenom; ?></strong></div>

<table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
    <thead>
        <tr>
            <th scope="col">nb_seance</th>
            <th scope="col">date</th>
            <th scope="col">Type seance</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($data)-1;$i++): ?>
        <?php $objet = $data[$i]; ?>
        <tr>
            <td><?= $objet->nb_seance ?></td>
            <td><?= $objet->date ?></td>
            <td><?= $objet->type_seance ?></td>
        </tr>
        <?php endfor; ?>
    </tbody>
</table>
<br>
<div class="container mt-3">
    <div class="container5">
        <a href="<?= ROOT . "/" . "HomeProf" ?>"><button class="btn me-1">Retour au home</button></a>
     
    </div>
</div>


 


</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        responsive: true
    })
    .columns.adjust()
    .responsive.recalc();
});
</script>

</body>
</html>
