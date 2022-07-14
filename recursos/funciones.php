<?php

function nombre_foto($foto, $nombre){
	$extencion = pathinfo( $foto , PATHINFO_EXTENSION );
	global $ext;
switch ($extencion) {
	case 'png':
	$nuevo = "$nombre.png";
	$ext = '1';
	break;
	case 'jpg':
	$nuevo = "$nombre.jpg";
	$ext = '1';
	break;
	case 'jpeg':
	$nuevo = "$nombre.jpeg";
	$ext = '1';
	break;
	case 'mp4':
	$nuevo = "$nombre.mp4";
	$ext = '0';
	break;
	case 'webm':
	$nuevo = "$nombre.webm";
	$ext = '0';
	}
	return $nuevo;
}

function guardar_img($img, $tmp, $nombre){

	$ext = pathinfo( $img , PATHINFO_EXTENSION );

switch ($ext) {
	case 'png':
	$original = imagecreatefrompng($tmp);
	break;
	case 'jpg':
	$original = imagecreatefromjpeg($tmp);
	break;
	case 'jpeg':
	$original = imagecreatefromjpeg($tmp);
	break;
	case 'mp4':
	move_uploaded_file($tmp, "../img_p/$nombre.mp4");
	break;
	case 'webm':
	move_uploaded_file($tmp, "../img_p/$nombre.webm");
}


switch ($ext) {
	case 'png':
	imagepng( $original, "../img_p/$nombre.png", 7 );
	break;
	case 'jpg':
	imagejpeg( $original, "../img_p/$nombre.jpg", 70 );
	}
}






function guardar_img_p($img, $tmp, $nombre){

	$ext = pathinfo( $img , PATHINFO_EXTENSION );

switch ($ext) {
	case 'png':
	$original = imagecreatefrompng($tmp);
	break;
	case 'jpg':
	$original = imagecreatefromjpeg($tmp);
	break;
	case 'jpeg':
	$original = imagecreatefromjpeg($tmp);
	break;
	case 'mp4':
	move_uploaded_file($tmp, "../../img_p/$nombre.mp4");
	break;
	case 'webm':
	move_uploaded_file($tmp, "../../img_p/$nombre.webm");
}


switch ($ext) {
	case 'png':
	imagepng( $original, "../../img_p/$nombre.png", 7 );
	break;
	case 'jpg':
	imagejpeg( $original, "../../img_p/$nombre.jpg", 70 );
	}
}

?>