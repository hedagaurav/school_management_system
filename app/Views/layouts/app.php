<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SMS <?= isset($title)? ": ".$title : "Web App" ?></title>
	<link rel="stylesheet" href=<?=base_url("assets/css/bootstrap.min.css")?> >

	<script src=<?=base_url("assets/js/jquery-3.5.1.slim.min.js")?> ></script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
</head>
<body>
	<header>
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
					<li class="nav-item"><a href=<?=base_url("section") ?> class="nav-link">Class Dashboard</a></li>

					<li class="nav-item"><a href=<?=base_url("student") ?> class="nav-link">Student Dashboard</a></li>



				</ul>
			</div>
		</nav>

	</header>
	
    <main class="container-fluid col-md-10 offset-md-1 col-sm-12 p-sm-0 row border border-danger">
<!--        <div class="col-md-2 border border-dark p-sm-0"><h3>sidebar sidebar</h3></div>-->
        <div class="col-md-8 border border-dark">
            <h3 class="">School Management System</h3>
          <?php
            if(session()->has('success')){
              echo '<div class="alert alert-success"><h4 class="alert-heading text-center">Success</h4>'.
                session()->getFlashdata('success').'</div>';
            } elseif(session()->has('error')){
              echo '<div class="alert alert-danger"><h4 class="alert-heading text-center">Alert!</h4>'.
                session()->getFlashdata('error').'</div>';
            } elseif(session()->has('warning')){
	            echo '<div class="alert alert-warning"><h4 class="alert-heading text-center">Warning!</h4>'.
		            session()->getFlashdata('warning').'</div>';
            }
          ?>
          <?= $this->renderSection('main');?>
        </div>
        <div class="col-md-4 border border-dark">
            <h3>Documentation</h3>
            <div>
                <p>this side contains the notes regarding the current page.</p>
                <ul>
                    <li>note 1</li>
                    <li>note 2</li>
                    <li>note 3</li>
                </ul>
            </div>
        </div>

    </main>


    <script src=<?=base_url("assets/js/bootstrap.bundle.min.js")?>></script>
    <script src=<?=base_url("assets/js/repeater.js")?>></script>
    <script>
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
</body>
</html>