<?php
/*
#####################################################
Builds XML file for a gallery based on the filesystem

FileName:   images.php
Author:     Uptonic
#####################################################
*/

// Include class file
require_once(dirname(__FILE__).'/lib/protos.utils.php');
require_once(dirname(__FILE__).'/lib/function.recurse.php');
require_once(dirname(__FILE__).'/lib/config.php');

// Get file structure
$albums = scan_directory_recursively('gallery');

// Let's build some XML
$doc = new DOMDocument("1.0", "UTF-8");
$doc->formatOutput = TRUE;

// Create root node for the gallery
$r = $doc->createElement( "figure" );
$r->setAttribute('class', "slideshow");
$doc->appendChild($r);

// Cycle through albums
foreach($albums as $album) {
	
	// Ignore albums that don't contain content
	if($album['content'] != NULL){
	
		// New album tag
		$a = $doc->createElement('ul');
		$a->setAttribute('data-gallery-name', $album['name']);
		$a->setAttribute('id', "slides");
		
		// Sort the images as named
    $album['content'] = orderAsc($album['content'], 'file');
		
		// Loop through album files				
		foreach($album['content'] as $image) {
		  $li = $doc->createElement('li');
			$img = $doc->createElement('img');

			$img->setAttribute('src', $image['file']);
			$img->setAttribute('title', getImageTitle($image['file']));
      
      $li->appendChild($img);
			$a->appendChild($li);
		}
		
		// Close the album tag
		$r->appendChild($a);
	}
}

$doc->save("images.xml");
header('Location: images_success.php');
?>