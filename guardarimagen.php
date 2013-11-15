
<?php
include('funciones.php');
session_start();
/*
//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
 
    //obtenemos el archivo a subir
    $file = $_FILES['archivo']['name'];
 
    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
    if(!is_dir("files/")) 
        mkdir("files/", 0777);
     
    //comprobamos si el archivo ha subido
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$file)){

    sleep(5);//retrasamos la petición 3 segundos
	$id = $_COOKIE["id"];
	$imagen = $file;
	$imageinfo = getimagesize($_FILES['archivo']['tmp_name']);

		if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && isset($imageinfo)){
    		echo 'Sorry, we only accept GIF and JPEG images\n';
    		exit(0);
		}else{
			$queryGuardar = "UPDATE ".$GLOBALS['nameTablaUsers']." SET foto='".$imagen."' WHERE id='".$id."'";
			mysql_query($queryGuardar);
        	echo $file;//devolvemos el nombre del archivo para pintar la imagen
    	}
    }
}else{
    throw new Exception("Error Processing Request", 1);    
}*/
?>


<?php
    //check for session
 $file = $_FILES['archivo']['name'];
    session_start();
// Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
    $POST_MAX_SIZE = ini_get('post_max_size');
    $unit = strtoupper(substr($POST_MAX_SIZE, -1));
    $multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));
  
    if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE)
        HandleError('POST exceeded maximum allowed size.');
  
// Settings
    $save_path = getcwd() . '/files/';                // The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
    $upload_name = 'archivo';             // change this accordingly
    $max_file_size_in_bytes = 100000;               // 2GB in bytes
    $whitelist = array('jpg', 'png', 'gif', 'jpeg');    // Allowed file extensions
    $backlist = array('php', 'php3', 'php4', 'phtml','exe'); // Restrict file extensions
    $valid_chars_regex = 'A-Za-z0-9_-\s ';// Characters allowed in the file name (in a Regular Expression format)
  
// Other variables
    $MAX_FILENAME_LENGTH = 260;
    $file_name = $_COOKIE['id'];
    $file_extension = '';
    $uploadErrors = array(
        0=>'There is no error, the file uploaded with success',
        1=>'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2=>'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3=>'The uploaded file was only partially uploaded',
        4=>'No file was uploaded',
        6=>'Missing a temporary folder'
    );
  
// Validate the upload
 if (isset($_FILES[$upload_name]['error']) && $_FILES[$upload_name]['error'] != 0)
        HandleError($uploadErrors[$_FILES[$upload_name]['error']]);
    else if (!isset($_FILES[$upload_name]['tmp_name']) || !@is_uploaded_file($_FILES[$upload_name]['tmp_name']))
       HandleError('Upload failed is_uploaded_file test.');
    else if (!isset($_FILES[$upload_name]['name']))
      HandleError('File has no name.');
  
// Validate the file size (Warning: the largest files supported by this code is 2GB)
    $file_size = filesize($_FILES[$upload_name]['tmp_name']);
    if (!$file_size || $file_size > $max_file_size_in_bytes)
        HandleError('File exceeds the maximum allowed size');
  
    if ($file_size <= 0)
        HandleError('File size outside allowed lower bound');
// Validate its a MIME Images (Take note that not all MIME is the same across different browser, especially when its zip file)
    if(!eregi('image/', $_FILES[$upload_name]['type']))
        HandleError('Please upload a valid file!');
  
// Validate that it is an image
    $imageinfo = getimagesize($_FILES[$upload_name]['tmp_name']);
    if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png' && isset($imageinfo))
        HandleError('Sorry, we only accept GIF and JPEG images');
  
// Validate file name (for our purposes we'll just remove invalid characters)
    $file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', '', strtolower(basename($_FILES[$upload_name]['name'])));
    if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH)
        HandleError('Invalid file name');
  
// Validate that we won't over-write an existing file
 //   if (file_exists($save_path . $file_name))
  //      HandleError('File with this name already exists');
  
// Validate file extension
    if(!in_array(end(explode('.', $_FILES['archivo']['name'])), $whitelist))
        HandleError('Invalid file extension '.$file_name.'');
 //   if(in_array(end(explode('.', $file_name)), $backlist))
   //     HandleError('Invalid file extension');
// Rename the file to be saved
    $extension = end(explode('.', $_FILES['archivo']['name']));
    $file_name = $_COOKIE['id'].".".$extension;

    $queryGuardar = "UPDATE ".$GLOBALS['nameTablaUsers']." SET foto='".$file_name."' WHERE id='".$_COOKIE['id']."'";
	mysql_query($queryGuardar);
  
// Verify! Upload the file
    if (!@move_uploaded_file($_FILES[$upload_name]['tmp_name'], $save_path.$file_name)) {
        HandleError('File could not be saved.');
    }
    exit(0);
  
/* Handles the error output. */
function HandleError($message) {
    echo $message;
    exit(0);
}
?>