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

		<title>Atualizar Cadastro</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

		<!-- HTML shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- [if lt IE9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
	</head>

	<body>

		<div class="container">

			<div class="row">
				
				<h1>Atualizar Produto</h1>
				<ol class="breadcrumb">
					<li><a href="/">Inicio</a></li>
					<li class="active">Atualizar Produto</li>
				</ol>

				<!-- Formulário de novo cadastro -->
				<form action="/produtos/salvar" name="form_add" method="post">
					
					<!-- Input nome do produto -->
					<div class="row">
						<div class="col-md-8">
							<label>Nome</label>
							<input type="text" name="nome" value="<?php echo $produto->nome ?>"
							class="form-control">
						</div>
					</div>

					<!-- Input preço do produto -->
					<div class="row">
						<div class="col-md-8">
							<label>Preço</label>
							<input type="text" name="preco" value="<?php echo $produto->preco ?>" class="form-control">
						</div>
					</div>

					<!-- Select de produtos -->
					<div class="row">
						<div class="col-md-2">
							<label>Ativo</label>
							<select name="ativo" class="form-control">
								<option value="1" <?php echo  ($produto->ativo == 1 ? ' selected="selected"' : '') ?> >Sim</option>
								<option value="0" <?php echo  ($produto->ativo == 0 ? ' selected="selected"' : '') ?> >Não</option>
							</select>
						</div>
					</div>

					<br />
					<div class="row">
						<div class="col-md-2">
							<input type="hidden" name="id" value="<?php echo $produto->id ?>">
							<button type="submit" class="btn btn-primary">Cadastrar</button>
						</div>
					</div>
					
				</form>

			</div>

		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>