<nav class="purple darken-2">
	<div class="nav-wrapper">
	  <div class="col s12">
	    <a href="<?= base_url() ?>" class="breadcrumb">Inicio</a>
	    <a href="<?= base_url() ?>usuarios" class="breadcrumb">Usuarios</a>
	    <a href="#!" class="breadcrumb">Nuevo</a>

	  </div>
	</div>
</nav>
<section class="container">
	<div class="row">
		<h4 class="purple-text text-darken-2">Nuevo usuario</h4>
	</div>
	<form action="enviar_invitacion" method="post">
		<div class="row">
			<div class="input-field col s12">
	          <input id="name" name="name" type="text" class="validate" required>
	          <label for="name">Nombre</label>
	        </div>
		</div>
		<div class="row">
	        <div class="input-field col s12">
	          <input id="email" name="email" type="email" class="validate" required>
	          <label for="email">Email</label>
	        </div>
		</div>
        <div class="row">
	        <div class="input-field col s12">
	          <input type="submit" class="btn-large purple col s12">
	        </div>
        </div>
	</form>
</section>