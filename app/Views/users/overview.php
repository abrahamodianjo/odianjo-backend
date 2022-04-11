<h2><?= esc($title) ?></h2>


<a class = "btn btn-success mb-4" href="<?=base_url()?>/users/create"> Add new user</a>



 <?php
	if(session() ->getFlashdata('status'));
	{
			
			echo '<div class="alert alert-success" role="alert">'." <h4>".session()->getFlashdata('status')."</h4>";
				
		
		
	}
	
?>
<?php //endif; ?>
</div>

<?php if (! empty($users) && is_array($users)): ?>

    <?php foreach ($users as $users_item): ?>

       

        <div class="main">
          
        </div>
        
		
		<div class="card">
  <div class="card-header">
     <h3><?= esc($users_item['title']) ?></h3>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= esc($users_item['title']) ?></h5>
    <p class="card-text">  <?= esc($users_item['name']) ?></p>
	
	<div class="btn-group" role="group" aria-label="Basic example">
  <a href="<?= base_url('users/view/'.$users_item['id']) ?>"button type="button" class="btn btn-primary ">View article</button> </a>
  <a href="<?= base_url('users/update/'.$users_item['id']) ?>" button type="button" class="btn btn-success ">Update Article</button></a>
  <a href="<?= base_url('users/delete_users/'.$users_item['id']) ?>" button type="button" class="btn btn-danger ">Delete Article</button> </a>
</div>
    
  </div>
  <p>
</div>
<p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No users</h3>

    <p>Unable to find any users for you.</p>

<?php endif ?>
