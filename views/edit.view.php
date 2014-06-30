<div class="row">
	<div class="span-12">
		<form method="post">
			<div><input type="text" name="title" placeholder="Title" value="<?= $post->title ?>" /></div>
			<div><input type="text" name="author" placeholder="Author" value="<?= $post->author ?>" /></div>
			<div><textarea placeholder="Body" name="body" rows="6" cols="24"><?= $post->body ?></textarea></div>
			<input class="btn btn-primary" type="submit" value="Submit" />
		</form>
	</div>
</div>