<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage des Annonces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-lg bg-primary my-5">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card bg-light my-5">
                <div class="card-body">
                    <div class="card-title text-center mb-3">Espace de Gestion des absences</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">nb_absence_cours</th>
                                <th scope="col">nb_absence_tp</th>
                                <th scope="col">nb_absence_total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $objet): ?>
                            <?php
                                // Vérifiez si le nombre d'absences totales est supérieur à 7
                                if ($objet->nb_total > 7) {
                                    // Si oui, utilisez la couleur rouge pour la ligne
                                    $row_color = 'background-color: red;';
                                } else {
                                    // Sinon, utilisez la couleur par défaut (blanc)
                                    $row_color = '';
                                }
                            ?>
                            <tr>

                                <td><?= $objet->Email ?></td>
                                <td><?= $objet->Nom ?></td>
                                <td><?= $objet->Prenom ?></td>
                                <td><?= $objet->nb_cours ?></td>
                                <td><?= $objet->nb_tp ?></td>
                                <td style="<?= $row_color ?>"><?= $objet->nb_total ?></td>
                                <td><a href="<?= ROOT . "/" . "AbsenceControl" . "/" . "Detail". "/" . $objet->Email;?>">Detail</a></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
 -->

 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cours</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">

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
			background-color: #ebf4ff;

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
  			background-image: url('../public/assets/images/studentbg.png');
  			background-size: cover; 
  			background-position: center; 
  			background-repeat: no-repeat;
		}

		
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			
		}

    th, td {
      text-align: center; 
      vertical-align: middle;
      padding: 8px;
    }
    </style>
    </head>

<body class="bg-blue-200 text-gray-900 tracking-wider leading-normal">

	<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

		<h1 class="flex items-center font-sans font-bold break-normal text-white px-2 py-8 text-xl md:text-2xl">
      <div class="mx-2">Vos Cours</div>
		</h1>

		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

			<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
                    <th scope="col">Email</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">nb_absence_cours</th>
                                <th scope="col">nb_absence_tp</th>
                                <th scope="col">nb_absence_total</th>
					</tr>
				</thead>
				
        <tbody>
        <?php foreach($data as $objet): ?>
                            <?php
                                if ($objet->nb_total > 7) {
                                    $row_color = 'background-color: red;';
                                } else {
                                    $row_color = '';
                                }
                            ?>
                            <tr>

                                <td><?= $objet->Email ?></td>
                                <td><?= $objet->Nom ?></td>
                                <td><?= $objet->Prenom ?></td>
                                <td><?= $objet->nb_cours ?></td>
                                <td><?= $objet->nb_tp ?></td>
                                <td style="<?= $row_color ?>"><?= $objet->nb_total ?></td>
                                <td><a href="<?= ROOT . "/" . "AbsenceControl" . "/" . "Detail". "/" . $objet->Email;?>">Detail</a></td>

                            </tr>
                        <?php endforeach; ?>
       
  </tbody>

			</table>


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
 
