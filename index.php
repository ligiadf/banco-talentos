<!DOCTYPE html>
<html lang="pt-br">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Banco de talentos</title>

	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome/css/all.css" rel="stylesheet">
	<link href="css/business-frontpage.css" rel="stylesheet">

	<style type="text/css">
		body { padding-top: 0; }
	</style>
</head>

<body>

<?php
	$url = 'dados.json'; // path to your JSON file
	$data = file_get_contents($url); // put the contents of the file into a variable
	$pessoas = json_decode($data); // decode the JSON feed

	if (isset($_GET['filtro'])) {
		$filtro = htmlspecialchars($_GET['filtro']);
	}
	else {
		$filtro = ' ';
	}

?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	  <a class="navbar-brand" href="/">Lorem ipsum</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item">
			<a class="nav-link" href="/banco-talentos/termos-uso.php">Termos e condições de uso</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="">Lorem ipsum</a>
		  </li>
		</ul>
	  </div>
	</div>
  </nav>

  <!-- Header -->
  <header class="bg-info py-5 mb-5">
	<div class="container h-100">
	  <div class="row h-100 align-items-center">
		<div class="col-lg-12">
		  <h1 class="display-4 text-white mt-5 mb-2">Banco de talentos</h1>
		  <p class="lead mb-5 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non possimus ab labore provident mollitia. Id assumenda voluptate earum corporis facere quibusdam quisquam iste ipsa cumque unde nisi, totam quas ipsam.</p>
		</div>
	  </div>
	</div>
  </header>

  <!-- Page Content -->
  <div class="container">

	<div class="row">
	  <div class="col-md-8 mb-5">
		<h2>Lorem ipsum</h2>
		<hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
		<a class="btn btn-info btn-lg" href="#">Lorem</a>
	  </div>
	  <div class="col-md-4 mb-5">
		<h2>Contato</h2>
		<hr>
		<address>
		  <strong>Lorem ipsum</strong>
		  <br>Lorem ipsum
		  <br>
		</address>
		<address>
		  <a href="#">Lorem ipsum</a><br>
		</address>
	  </div>
	</div><!-- /.row -->

	<div class="row">
		<div class="col-12 mt-2 mb-3">
			<h2 id="filtrar">Como consultar o Banco de Talentos?</h2>
		</div>

		<form class="form-inline col-12" action="/banco-talentos#filtrar" method="GET">
			<label for="filtro">Veja lista de habilidades ou digite para filtrar pessoas, ex: Catalogação</label><br>
			<input type="text" class="form-control col-8 col-md-8 mt-2 mr-1" id="filtro" name="filtro" value="<?php if ($filtro !== ' ') { echo $filtro; }  ?>">
			<button type="submit" class="btn btn-secondary mt-2"><i class="fas fa-filter fa-xs"></i> Filtrar</button>
		</form>

	</div><!-- /.row -->

	<div class="row">
		<div class="col-12 mt-4 mb-3">
			<h2 id="lista">Profissionais cadastrados <small class="h5"><a href="/banco-talentos#lista" class="text-info">Exibir todos</a></small></h2>
			<p>Os profissionais são responsáveis pelas informações divulgadas.</p>
		</div>

	<?php foreach ($pessoas as $pessoa) : ?>

	<?php
		$habilidade = $pessoa->{'Habilidades'};
		$habilidade = explode(", ", $habilidade); // valores para array = lista no card
		$habilidades = implode(", ", $habilidade); // valores para string = filtro


		// Data atual em EPOCH
		$dt_atual = time();

		// Transformar data de DD/MM/AAAA para MM/DD/AAAA
		$dt_vence_DD = substr($pessoa->{'Vencimento'},0,2);
		$dt_vence_MM = substr($pessoa->{'Vencimento'},3,2);
		$dt_vence_AAAA = substr($pessoa->{'Vencimento'},6,4);

		// Junta no novo formato e transforma em EPOCH
		$dt_vence = strtotime($dt_vence_MM."/".$dt_vence_DD."/".$dt_vence_AAAA);

?>
	<?php 
	if ( stripos($habilidades, $filtro) !== FALSE && $pessoa->{'Exibir'} == 'Sim' && $dt_vence > $dt_atual && $pessoa->{'Declaro ter lido e estar de acordo com os termos e condições de uso do Banco de Talentos da ARB.'} == 'Sim' ) : ?>
		<div class="col-md-12 col-lg-4 mb-5">
			<div class="card h-100">
			  <div class="card-body">
				<h4 class="card-title text-info mb-1"><?php echo $pessoa->{'Nome completo'}; ?></h4>
				<h6 class="mt-2 mb-3">
					<small class="text-muted">
						<?php echo $pessoa->{'Categoria'}; ?>
						<?php if ( $pessoa->{'Categoria'} == 'Bibliotecário' ): 
							 echo $pessoa->{'Registro no Conselho'}; 
						endif; ?>
						
					</small>
				</h6>
				<h6 class="card-subtitle mb-2"><?php echo $pessoa->{'Descrição'}; ?></h6>
				<p class="card-text">
					<small><ul class="list-inline">
						<li>Habilidades:</li>
						<?php foreach ($habilidade as $i) : ?>
							<li class="list-inline-item">&ndash; <?php echo $i ?></li>
						<?php endforeach; ?><!-- habilidades no card -->
					</ul></small>
				</p>
			  </div>
			  <div class="card-footer">
					<?php if ($pessoa->{'Cidade'}) : ?>
						<p><i class="fas fa-map-marker-alt"></i> <?php echo $pessoa->{'Cidade'}; ?></p>
					<?php endif; ?>
					<?php if ($pessoa->{'Disponível para trabalhar em outra localidade'} == 'Sim') : ?>
						<p><i class="fas fa-route"></i> Disponível para trabalhar em outra localidade</p>
					<?php endif; ?>
					<?php if ($pessoa->{'Telefone'}) : ?>
						<p><i class="fas fa-phone"></i> <?php echo $pessoa->{'Telefone'}; ?></p>
					<?php endif; ?>
					<?php if ($pessoa->{'E-mail'}) : ?>
						<p><i class="fas fa-email"></i> <?php echo $pessoa->{'E-mail'}; ?></p>
					<?php endif; ?>
					<ul class="list-unstyled list-inline">
						<?php if ($pessoa->{'Facebook'}) : ?>
							 <li class="list-inline-item"><a class="card-link" href="<?php echo $pessoa->{'Facebook'}; ?>"><i class="fab fa-facebook"></i> Facebook</a></li>
						<?php endif; ?>
						<?php if ($pessoa->{'Twitter'}) : ?>
							 <li class="list-inline-item"><a class="card-link" href="<?php echo $pessoa->{'Twitter'}; ?>"><i class="fab fa-twitter"></i> Twitter</a></li>
						<?php endif; ?>
						<?php if ($pessoa->{'LinkedIn'}) : ?>
							 <li class="list-inline-item"><a class="card-link" href="<?php echo $pessoa->{'LinkedIn'}; ?>"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
						<?php endif; ?>
						<?php if ($pessoa->{'Currículo Lattes'}) : ?>
							 <li class="list-inline-item"><a class="card-link" href="<?php echo $pessoa->{'Currículo Lattes'}; ?>"><i class="fas fa-file-alt"></i> Currículo Lattes</a></li>
						<?php endif; ?>
						<?php if ($pessoa->{'Site'}) : ?>
							 <li class="list-inline-item"><a class="card-link" href="<?php echo $pessoa->{'Site'}; ?>"><i class="fas fa-link"></i> Site</a></li>
						<?php endif; ?>
						<?php if ($pessoa->{'Blog'}) : ?>
							 <li class="list-inline-item"><a class="card-link" href="<?php echo $pessoa->{'Blog'}; ?>"><i class="fas fa-link"></i> Blog</a></li>
						<?php endif; ?>
					</ul>
			  </div>
			</div>
		  </div>
		  <?php endif; ?><!-- filtro -->
	<?php //endforeach; ?><!-- habilidade para filtro -->
<?php endforeach; ?><!-- pessoa -->
	</div><!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
	<div class="container">
	  <p class="m-0 text-center text-white">Banco de talentos</p>
	  <p class="m-0 text-center text-white">Desenvolvido por <a class="text-white" href="https://lfreitas.info" title="Acesse o site de LFreitas">LFreitas</a> &ndash; Licença MIT CC BY-NC 4.0.</p>
	  <p class="m-0 text-center text-white">Tema <a class="text-warning" href="https://startbootstrap.com/templates/business-frontpage/">Business Frontpage</a> por Start Bootstrap.</p>
	</div>
	<!-- /.container -->
  </footer>

	<script src="vendor/jquery/jquery-3.4.0.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>