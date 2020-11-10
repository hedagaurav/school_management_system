<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	<!-- <div class="d-flex"> -->
	<a href=<?=base_url()?> class="navbar-brand">SMS</a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapse-menu" aria-controls="collapse-menu">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- </div> -->

	<div class="collapse navbar-collapse" id="collapse-menu">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a href=<?=base_url("") ?> class="nav-link">Home</a></li>
			<li class="nav-item"><a href=<?=base_url("section/create") ?> class="nav-link">Create Class</a></li>
			<li class="nav-item"><a href=<?=base_url("section") ?> class="nav-link">Class Dashboard</a></li>
		</ul>
	</div>
</nav>