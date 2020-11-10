<?= $this->extend('layouts\app.php');?>

<?= $this->section('main');?>
    <div class="d-flex mb-2">

        <h3 class="col-md-9 text-center">List of Classes</h3>


        <div class="ml-auto col-md-3">
            <a href="<?=base_url('section/create') ?>" class="btn btn-outline-primary ">Create New</a>
        </div>
    </div>
    <div>
        <table class="table">
            <tr class="">
                <th class="text-center">Sr No</th>
                <th class="text-center">Class</th>
                <th class="text-center">Subjects</th>
                <th class="text-center">Action</th>
            </tr>

          <?php $i = 1;?>
          <?php if (!empty($classdata)) :?>
            <?php foreach ($classdata as $class):?>
                  <tr>
                      <th class="text-center"><?=$i?></th>
                      <td class="text-center"><?=$class['class_name']?></td>
                      <td class="text-center"><?=$class['list_of_sub']?></td>
                      <td class="text-center">
<!--                          <a href="--><?//=base_url('section/edit/'.$class['id']) ?><!--" class="btn btn-warning">Edit</a>-->
                          <a href="<?=base_url('section/delete/'.$class['id']) ?>" class="btn btn-danger">Delete</a>
                      </td>
                      <td class=""></td>
                  </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          <?php else: ?>
              <tr><td colspan="3" class="text-center">No Record Found.</td></tr>
          <?php endif; ?>
        </table>


    </div>
<?= $this->endSection();?>