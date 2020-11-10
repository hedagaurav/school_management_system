<?=$this->extend('layouts/app');?>
<?=$this->section('main');?>

	<form action=<?=base_url('/sub/add')?> method="get">
		<div id="repeater">
			<!-- Repeater Heading -->
			<div class="repeater-heading">
				<h3 class="">List of Subjects</h3>
				<button type="button" class="btn btn-primary pull-right repeater-add-btn">
						Add
				</button>
			</div>

			<div class="items" data-group="subject">
			<!-- Repeater Item Content -->
			<div class="item-content">
					<div class="form-group row">
						<label for="inputSubject" class="col-lg-2 col-form-label">Subject Name</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inputSubject" placeholder="Subject Name" data-name="subject_name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputpassing" class="col-lg-2">Passing Marks</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inputpassing" placeholder="Passing Marks" data-name="passing">
						</div>
					</div>
					<div class="form-group">
						<label for="inputmaximum" class="col-lg-2 control-label">Maximum Marks</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inputmaximum" placeholder="Maximum Marks" data-name="maximum">
						</div>
					</div>
				</div>
				<!-- Repeater Remove Btn -->
				<div class="pull-right repeater-remove-btn">
						<button type="button" class="btn btn-danger remove-btn">
							Remove
						</button>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary btn-block col-lg-6 offset-lg-3">submit</button>
	</form>
<?=$this->endSection();?>