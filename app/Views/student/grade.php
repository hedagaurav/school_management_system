<?= $this->extend('layouts/app') ?>

<?php $this->section("main"); ?>
	<div class="border border-dark">
        <h1 class="text-center">Grade Students</h1>
        <div class="m-3">
            <form action="<?=base_url('student/grade') ?>" method="post">
                <input type="hidden" name="student_id" value="<?= $student['student_id']?>">
                <input type="hidden" name="class_id" value="<?= $student['class_id']?>">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="student_name" class="">Student Name</label>
                        <input type="text" name="student_name" id="student_name" class="form-control col-md" value="<?= $student['student_name'] ?>" readonly>
                    </div>

                    <div class="form-group col">
                        <label for="class" class="">Class</label>
                        <input type="text" readonly name="student_class" value="<?=$student['class_name']?>" class="form-control col-md">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="" class="">E-mail</label>
                        <input type="text" readonly name="student_email" value="<?=$student['student_email']?>" class="form-control col-md">
                    </div>

                    <div class="form-group col">
                        <label for="" class="">DOB</label>
                        <input type="text" readonly name="student_dob" value="<?=$student['student_dob'] ?>" class="form-control col-md">
                    </div>
                </div>

                <h4 class="text-center">Subjects</h4>
                <p class="alert-danger"> <span class="">Note : </span> put for loop here to add multiple subjects</p>
              <?php

                foreach($subjects as $subject): ?>

                    <div class="form-row border border-info mb-2">
                        <input type="hidden" name="subject_id[]" value="<?=$subject['id']  ?>">
                        <div class="form-group mx-2 col-md-3 col-sm-8 ">
                            <br>
                            <label for="english" class="col-form-label-lg"><?= $subject['subject_name']; ?></label>
                        </div>
                        <div class="form-group col-md">
                            <label for="" class="">marks obtained</label>
                            <input type="text" name="marks_obtained[]" class="form-control col-md">
                        </div>
                        <div class="form-group col-md">
                            <label for="">Out of /</label>&nbsp;<label>Maximum marks</label>
                            <input type="text" readonly name="maximum_marks[]" value="<?= $subject['maximum_marks'] ?>" class="form-control col-md">
                        </div>
                    </div>
                <?php endforeach; ?>

                    <button class="btn btn-primary mt-3 col-md-6 offset-md-3 col-sm-8 offset-sm-2">Geenrate Report</button>
            </form>
        </div>
    </div>
<?php $this->endSection(); ?>
