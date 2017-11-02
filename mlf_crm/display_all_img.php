<?php

	echo "jkhkjgh";

	$dirname = "events_images/CHENNAI RELIEF/thumbnail/";
	$images = glob($dirname."*.*");
	foreach($images as $image) {
		echo '<img src="'.$image.'" /><br />';
	}


?>