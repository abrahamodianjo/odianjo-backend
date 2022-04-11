<h2><?= esc($title) ?></h2>


<a class = "btn btn-success mb-4" href="<?=base_url()?>/news/create"> Create New Article </a>



 <?php
	if(session() ->getFlashdata('status'));
	{
			
			echo '<div class="alert alert-success" role="alert">'." <h4>".session()->getFlashdata('status')."</h4>";
				
		
		
	}
	
?>
<?php //endif; ?>
</div>

<?php if (! empty($news) && is_array($news)): ?>

    <?php foreach ($news as $news_item): ?>

       

        <div class="main">
          
        </div>
        
		
		<div class="card">
  <div class="card-header">
     <h3><?= esc($news_item['title']) ?></h3>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= esc($news_item['title']) ?></h5>
    <p class="card-text">  <?= esc($news_item['body']) ?></p>
	
	<div class="btn-group" role="group" aria-label="Basic example">
  <a href="<?= base_url('news/view/'.$news_item['id']) ?>"button type="button" class="btn btn-primary ">View article</button> </a>
  <a href="<?= base_url('news/update/'.$news_item['id']) ?>" button type="button" class="btn btn-success ">Update Article</button></a>
  <a href="<?= base_url('news/delete_news/'.$news_item['id']) ?>" button type="button" class="btn btn-danger ">Delete Article</button> </a>
</div>
    
  </div>
  <p>
</div>
<p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>
