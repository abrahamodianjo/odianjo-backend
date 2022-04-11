<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="<?php echo base_url();?>/users/create" method="post">
    <?= csrf_field() ?>

<div class=" mb-3">
    <label for="title " class="form-label">Title</label>
    <input type="input" name="title" class="form-control" /><br />
	
	<label for="name " class="form-label">Name</label>
    <input type="input" name="name" class="form-control" /><br />
	
	<label for="surname " class="form-label">Surname</label>
    <input type="input" name="surname" class="form-control" /><br />
	
	<label for="email " class="form-label">Email</label>
    <input type="input" name="email" class="form-control" /><br />
	
	<label for="city " class="form-label">City</label>
    <input type="input" name="city" class="form-control" /><br />

    <input type="submit" class="btn btn-primary" name="submit" value="Create users item" />
	
	</div>
</form>