<?php 
header('Content-Type: application/json; charset=utf-8');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_FILES['files'])) {
			$errors = [];
			$path = 'images/';

			$all_files = count($_FILES['files']['tmp_name']);

			for ($i = 0; $i < $all_files; $i++) {  
			$file_name = $_FILES['files']['name'][$i];
			$file_tmp = $_FILES['files']['tmp_name'][$i];
			$file_type = $_FILES['files']['type'][$i];
			$file_size = $_FILES['files']['size'][$i];
			$tmp = explode('.', $_FILES['files']['name'][$i]);
				

			if(strpos($file_name, "-image-1-") !== false){
				$image_temporal = substr($file_name, 0, strpos($file_name, "-"));
				$firts_image_upload = $path . $image_temporal . '-image-1.webp';
				
				move_uploaded_file($file_tmp, $firts_image_upload);
				echo json_encode($firts_image_upload);
			}
			$file = $path . $file_name;
			if (empty($errors)) {
				move_uploaded_file($file_tmp, $file);
				echo json_encode($file);
			}
		}

		if ($errors) json_encode($errors);
		}
	}

?>