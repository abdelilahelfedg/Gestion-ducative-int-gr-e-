<!-- <!DOCTYPE html>
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
</html> -->

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
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Compte rendus</title>
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
      <div class="mx-2">Relevé de Notes</div>
		</h1>

		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

			<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
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
