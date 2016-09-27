<?php include('users_header.php'); ?>
<div class="container">
	<div class="row">
		<?= anchor('users/add_article','Add Article', ['class'=>'btn btn-success col-xs col-xs-offset-8']); ?> 
	</div>
	<?php $feedback_class= $this->session->flashdata('feedback_class') ;?>
	<div class="alert alert-dismissible <?= $feedback_class?> col-lg-8">
      <?= $this->session->flashdata('feedback'); ?>
    </div>
	<table class="table">
		<thead>
			<th> Sno. </th>
			<th class="col-lg-1"> Title </th>
			<th class="col-lg-5"> Article </th>
			<!-- <th class="col-xs-offset-2"> Action </th> -->
		</thead>	
		<tbody>
		<?php if( count($article) ):
			 $count= $this->uri->segment(3,0);
			 foreach($article as $article): ?>
			<tr>
				<td> <?= ++$count ?></td>
				<td class="col-md-1"> <?php echo $article->title ?></td>
				<td class= "col-md-5"> <?php echo $article->body ?></td>
				<td class="row">
					<div class="col-md-3"><?php echo anchor("users/edit_article/{$article->id}","Edit",['class'=>'btn btn-primary col-lg-12']) ; ?></div>
				
					<div class="col-md-3"><?php echo anchor("users/delete_article/{$article->id}","Delete",["class"=>"btn btn-danger col-lg-12"]) ; ?></div>
				</td>
			</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		</tbody>	
	</table>
	<?php echo $this->pagination->create_links(); ?>
</div>	
<?php include('users_footer.php'); ?>