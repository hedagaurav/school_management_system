<?= $this->extend('layouts/app'); ?>
<?php helper('form'); ?>

<?= $this->section('main'); ?>
    <div class="border border-dark p-3">
        <h1 class="text-center">Create Class</h1>
        <form action="<?= base_url('section/create') ?>" method="post">
            <div class="form-group row">
                <label for="section" class="col-form-label col-md-2">Class Name</label>
                <div class="col-md">
                    <input type="text" name="section" id="section" class="form-control" autofocus>
                </div>
            </div>
            <div id="repeater">
                <!-- Repeater Heading -->
                <div class="repeater-heading d-flex">
                    <h4 class="col-md-4 offset-md-3">List of Subjects</h4>
                    <button type="button" class="btn btn-sm btn-primary repeater-add-btn ml-auto">
                        Add Subject
                    </button>
                </div>

                <div class="items" data-group="subject">
                    <!-- Repeater Item Content -->
                    <div class="item-content">
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="inputSubject" class="">Subject Name</label>
                                <div class="">
                                    <input type="text" class="form-control" id="inputSubject" placeholder="Subject Name" data-name="subject_name" >
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputpassing" class="">Passing Marks</label>
                                <div class="">
                                    <input type="number" class="form-control" id="inputpassing" placeholder="Passing Marks"  data-name="passing_marks" >
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputmaximum" class="">Maximum Marks</label>
                                <div class="">
                                    <input type="number" class="form-control" id="inputmaximum" placeholder="Maximum Marks"  data-name="maximum_marks" >
                                </div>
                            </div>
                        <div class="repeater-remove-btn col-md-2">
                            <br>
                            <button type="button" class="btn btn-danger remove-btn ml-auto">
                                Remove Subject
                            </button>
                        </div>
                        </div>
                    </div>
                    <!-- Repeater Remove Btn -->
<!--                    <div class=" repeater-remove-btn">-->
<!--                        <button type="button" class="btn btn-danger remove-btn ml-auto">-->
<!--                            Remove Subject-->
<!--                        </button>-->
<!--                    </div>-->
                    <div class="clearfix"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block col-md-6 offset-sm-3">Submit data</button>

        </form>
    </div>
<?= $this->endSection(); ?>