<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Modifier les absences</title>
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
        .btn {
        background-color: #28a745;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        border: none;
        cursor: pointer;
        width: 30%;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #218838;
    }

    .container5 {
        display: flex;
        justify-content: flex-end;
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

    .button2 {
  display: inline-block;
  transition: all 0.2s ease-in;
  position: relative;
  overflow: hidden;
  z-index: 1;
  color: #090909;
  padding: 0.7em 1.7em;
  cursor: pointer;
  font-size: 18px;
  border-radius: 0.5em;
  background: #e8e8e8;
  border: 1px solid #e8e8e8;
  box-shadow: 6px 6px 12px #c5c5c5, -6px -6px 12px #ffffff;
}

.button2:active {
  color: #666;
  box-shadow: inset 4px 4px 12px #c5c5c5, inset -4px -4px 12px #ffffff;
}

.button2:before {
  content: "";
  position: absolute;
  left: 50%;
  transform: translateX(-50%) scaleY(1) scaleX(1.25);
  top: 100%;
  width: 140%;
  height: 180%;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 50%;
  display: block;
  transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -1;
}

.button2:after {
  content: "";
  position: absolute;
  left: 55%;
  transform: translateX(-50%) scaleY(1) scaleX(1.45);
  top: 180%;
  width: 160%;
  height: 190%;
  background-color: #009087;
  border-radius: 50%;
  display: block;
  transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -1;
}
    </style>
    </head>

<body class="bg-blue-200 text-gray-900 tracking-wider leading-normal">

	<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

		<h1 class="flex items-center font-sans font-bold break-normal text-white px-2 py-8 text-xl md:text-2xl">
        <button class="btn"><a href="<?= ROOT . "/" . "HomeProf"?>">Retour au home</a></button>
            <br>
      <div class="mx-2">Modifier l'absence</div>

		</h1>

		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <form  id="myForm" action="<?=ROOT . "/" . "AbsenceControl" ."/" ."Update" ; ?>"  method="POST">

			<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
                <tr>
    
                                <th scope="col">Email</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Absent</th>
                            </tr>
				</thead>
				
        <tbody>
        <?php if (!empty($data)):?>    
            <?php foreach($data as $objet):?>
            <?php if (gettype($objet) == 'object'):?>    
            <tr>

                <td><?=$objet->Email?></td>
                <td><?=$objet->Nom?></td>
                <td><?=$objet->Prenom?></td>
                <td><input class="form-check-input" type="checkbox" name="absent1[]" value="<?=$objet->Email;?>" <?php if(isset($objet->absent)){ if ($objet->absent == true) echo "checked";} ?>></td>
            </tr>
            <?php endif;?>    
            <?php endforeach;?>
        <?php endif;?>
        
  </tbody>

  

			</table>
            <div class="container5">
                <button class="btn" id="submjitBtn" type="submit" name="absent_modif" value="submit">Valider</button>
                </form>
            </div>     
		</div>

	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true,
                    paging: false // Désactiver la pagination
				})
				.columns.adjust()
				.responsive.recalc();
		});
        $(document).ready(function() {
        $('#submitBtn').on('click', function(event) {
            // Empêche la soumission du formulaire par défaut
            event.preventDefault();
            
            // Affiche une boîte de dialogue avec un message d'alerte
            if (confirm("Voulez-vous vraiment modifier ces absences ?")) {
                // Si l'utilisateur clique sur "OK", soumet le formulaire
                $('#myForm').submit();
            } else {
                // Sinon, ne soumet pas le formulaire
                return false;
            }
        });
    });
	</script>

</body>

</html>
