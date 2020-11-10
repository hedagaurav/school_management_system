<?= $this->extend('layouts\app.php'); ?>
<?php helper('form'); ?>
<?= $this->section('main');?>
  <div>
    <h1 class="text-center">Enroll Student</h1>
      <div>
          <form action="<?=base_url('student/register') ?>" method="post">
              <div>
                  <label for="student_name">Student Name</label>
                  <input type="text" name="student_name" id="student_name" value="<?= set_value('student_name') ?>">
              </div>
              <div>
                  <label for="email">Student Email</label>
                  <input type="email" name="student_email" id="email" value="<?= set_value('student_email') ?>">
              </div>
              <div>
                  <label for="dob">Date of birth</label>
                  <input type="date" name="student_dob" id="dob" min="" max="2000-12-31" value="<?= set_value('student_dob') ?>">
              </div>

              <div>
                  <label for="student_class">Enroll In </label>
                  <select name="student_class" id="student_class">
                      <option value="<?=null?>">Select class to enroll</option>
	                  <?php foreach ($section as $class): ?>
                        <option value="<?=$class['id'] ?>" <?=set_select('student_class',$class['id'])  ?>><?= $class["class_name"]?></option>
	                  <?php endforeach; ?>
                  </select>
              </div>
              <button class="btn btn-primary col-md-8 offset-md-2 col-sm-6 offset-sm-3">submit form</button>
          </form>
      </div>
  </div>

<?= $this->endSection();?>