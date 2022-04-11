<h2><?= esc($title) ?></h2>



<form action="<?php echo base_url();?>/users/update" method="post">
   
 <?= csrf_field() ?>   

<div class=" mb-3">
<input type="hidden" name="id" id="id" value="<?= esc($users['id'])?>">
      <div class="form-group">
	  
    <label for="title " class="form-label">Title</label>
    <input type="input" name ="title" value="<?= esc ($users['title']) ?>" class="form-control" /><br />
   
    <label for="name " class="form-label">Name</label>
    <input type="input" name ="name" value="<?= esc ($users['name']) ?>" class="form-control" /><br />
   
    <label for="surname " class="form-label">Surname</label>
    <input type="input" name ="surname" value="<?= esc ($users['surname']) ?>" class="form-control" /><br />
   
    <label for="email " class="form-label">Email</label>
    <input type="input" name ="email" value="<?= esc ($users['email']) ?>" class="form-control" /><br />
   
    <label for="city " class="form-label">City</label>
    <input type="input" name ="city" value="<?= esc ($users['city']) ?>" class="form-control" /><br />
   
   
    <input type="submit" class="btn btn-primary" name="submit" value="Update users item" />
	
	</div>
</form>

