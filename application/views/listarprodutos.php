<?php
	defined('BASEPATH') OR exit('No direct script access alloweb');
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Lista da Tabela de Produtos">
		<meta name="author" content="Brauner Fernandes Azevedo - braunerhot@hotmail.com">

		<title>Lista da Tabela de Produtos</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

		<!-- HTML shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- [if lt IE9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.margin-button15 { margin-bottom: 15px; }
		</style>
	</head>

	<body>
	
		<div class="container">

			<div class="row">
				<h1>Lista de Produtos</h1>

				<a href="produtos/add" class="btn btn-success margin-button15">Novo Produto</a>

				<table class="table table-bordered">
					
					<thead>
						<tr>
							<th class="text-center">Produto</th>
							<th class="text-center">Preço</th>
							<th class="text-center">Ações</th>
						</tr>						
					</thead>

					<?php
						$contador = 0;
						foreach ($produtos as $produto)
						{
							echo '<tr>';
								echo '<td>'.$produto->nome.'</td>';
								echo '<td class="text-right">'.$produto->preco.'</td>';
								echo '<td class="text-center">';
									echo '<a href="/produtos/editar/'.$produto->id.'" title="Editar" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
									echo '<a href="/produtos/apagar/'.$produto->id.'" title="Apagar" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
									echo '<a href="/produtos/detalhes/'.$produto->id.'" title="Editar" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>';
								echo '</td>';
							echo '</tr>';
						$contador++;
						}
					?>

				</table>

				<div class="row">
					<div class="col-md-12">
						Total de Registros: <?php echo $contador ?>
					</div>
				</div>
				
			</div>

		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>