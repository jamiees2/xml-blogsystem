
<?php foreach($posts as $id => $post) { ?>
	<div class="row">
		<div class="span-12">
			<h3><?= $post->title ?></h3>
			<blockquote><?= $post->author ?></blockquote>
			<p><?= $post->body ?></p>
			<a href="/edit/<?= $parameters[0] ?>/<?= $id ?>" class="btn btn-success">Edit</a>
			<a href="/delete/<?= $parameters[0] ?>/<?= $id ?>" class="btn btn-danger">Delete</a>
		</div>
	</div>
<?php } ?>
<hr />
<div class="row">
	<div class="span-12">
		<a href="/new/<?= $parameters[0] ?>" class="btn btn-primary">New</a>
	</div>
</div>