<?php
	foreach($images as $image) : ?>
		<a href="static/watermarked_images/<?=$image['src']?>">
			<img src="static/thumbnails/<?=$image['src']?>"/>
		</a>
<?php endforeach ?>