<?= $this->extend('layouts\app.php'); ?>

<?= $this->section('main');?>
  <div class="d-flex mb-3">
	<h3>List of Students</h3>
      <a href="<?=base_url('student/register') ?>" class="btn btn-outline-primary ml-auto">Register New</a>
  </div>
  <div>
      <table class="table">
          <tr class="">
              <th>sr no</th>
              <th>student name</th>
              <th>Enrolled in </th>
              <th class="text-center" colspan="2">Action</th>
          </tr>
        <?php if(!empty($students)): ?>

             ?>
          <?php $i=1; foreach ($students as $student): ?>
                <tr>
                    <th><?= $i; ?></th>
                    <td><?= $student['student_name'] ?></td>
                    <td><?= $student['class_name'] ?></td>
                    <td class="text-center">
		            <?php if ( $student['student_status'] == null): ?>
                        <a href="<?=base_url('student/grade/'.$student['id'].'/class/'.$student['class_id']) ?>" class="btn btn-info">grade
                        </a>
                    <?php endif; ?>
                      <?php //else: ?>

                        <a href="<?=base_url('student/result/'.$student['id']) ?>" class="btn btn-success">
                          <?php echo  ( $student['student_status'] == null)? "Generate Result":"See Result"; ?>
                        </a>

                        <a href="<?=base_url('student/delete/'.$student['id']) ?>" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
            <?php $i++; endforeach; ?>
        <?php else: ?>
            <tr><td colspan="3" class="text-center">No Record Found.</td></tr>
        <?php endif; ?>
      </table>
  </div>
<?= $this->endSection();?>