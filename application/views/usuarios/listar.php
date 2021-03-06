<nav class="blue darken-2">
	<div class="nav-wrapper">
	  <div class="col s12">
	    <a href="<?= base_url() ?>" class="breadcrumb">Inicio</a>
	    <a href="#!" class="breadcrumb">Usuarios</a>
	  </div>
	</div>
</nav>
<section class="container">
	<div class="row">
		<?php foreach ($users->result() as $user) { ?>	
			<div class="card small col s12 m6 l3">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="data:image/png;base64,<?= $user->avatar ?>">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4"><?= $user->username ?><i class="material-icons right">more_vert</i></span>
			      <p><a href="usuarios/permisos/<?= $user->user_id ?>">editar permisos</a></p>
			    </div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4"><?= $user->firts_name ?><i class="material-icons right">close</i></span>
			      <p><i class="material-icons">email</i><?= $user->email ?></p>
			    </div>
			</div>
		<?php } ?>
	</div>
<div class="fixed-action-btn">
	<a href="usuarios/nuevo" class="btn-floating btn-large waves-effect waves-light blue lighten-1"><i class="material-icons">add</i></a>
</div>
