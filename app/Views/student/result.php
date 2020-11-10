<?= $this->extend('layouts\app.php'); ?>

<?= $this->section('main');?>
	<div class="border border-warning">
        <a href="<?=base_url('student')?>">Go Back</a>
            <h1 class="text-center">Student Result</h1>
        <div class="col-md-10 offset-md-1 text-center border border-dark">
            <h3>University Name</h3>
            <p>University address University address University address</p>
        </div>
      <?php if (!empty($result)): ?>
          <div class="col-md-10 offset-md-1 border border-dark my-2">
              <div class="d-flex">
                  <p class="font-weight-bold col-md-3">student id</p>
                  <p class="col"><?=$result['student_id']?></p>
              </div>
              <div class="d-flex">
                  <p class="font-weight-bold col-md-3">Student Name</p>
                  <p class="col"><?=$result['student_name']?></p>
              </div>
              <div class="d-flex">
                  <p class="font-weight-bold col-md-3">Class</p>
                  <p class="col"><?=$result['class_name']?></p>
              </div>
              <div class="d-flex">
                  <p class="font-weight-bold col-md-3">Email</p>
                  <p class="col"><?=$result['student_email']?></p>
              </div>
              <div class="d-flex">
                  <p class="font-weight-bold col-md-3">DOB</p>
                  <p class="col"><?=$result['student_dob']?></p>
              </div>
              <div class="col-md-12">
                  <h5 class=""><span class="font-weight-bold">Result : </span> <?php echo ($result['student_status'] == "pass") ? strtoupper("CONGRATULATIONS! You are Passed and Promoted to Next Standard.") : strtoupper("sorry! You Failed in this class. Please appear for the exams again."); ?></h5>
              </div>
          </div>
      <?php endif; ?>
    </div>
<?= $this->endSection(); ?>