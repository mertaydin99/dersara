<?php
// If user did not update the image there is no need for upload.php return to the main script
if($_POST["submit"] === "editbutimage")
{
  return;
}
// If it is standard profil_img.png
if($_POST["submit"] === "profil_img")
{
  $newUserId = (($userId + 5) * 2) + 3;
  // Add user_id at the end of the name of image so that it's unique for each user
  $imgName = "profil_img"."mm".$newUserId.".png";
  // Check if the image exists and if so give it a new name
  if (file_exists(__DIR__."/uploads/".$imgName)) 
  {
    $imgName =  "profil_img"."ms".$newUserId.".png";
  }

  $target_dir = "uploads/";
  $target_file = $target_dir.$imgName;

  if (copy(__DIR__."/images/profil_img.png", $target_file)) 
  {
    return;
  } 
  else 
  {
    exit();
  }

}

$target_dir = "uploads/";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
$newUserId = (($userId + 5) * 2) + 3;
// Add user_id at the end of the name of image so that it's unique for each user
$imgName = basename($_FILES["fileToUpload"]["name"], ".".$imageFileType)."mm".$newUserId.".".$imageFileType;
$target_file = $target_dir.$imgName;

// Random string generator in case file exist

// Check if the image exists and if so give it a new name
if (file_exists(__DIR__."/uploads/".$imgName)) 
{
  $imgName =  basename($_FILES["fileToUpload"]["tmp_name"])."ms".$newUserId.".".$imageFileType;
  $target_file = $target_dir.$imgName;
}

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) 
  {
    $uploadOk = 1;
  } 
  else 
  {
    $uploadOk = 0;
  }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 2097152) 
{
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
{
  $uploadOk = 0;
}

// Only allow images who are bigger than 200x200
 $size = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
 $width = $size[0];
 $height = $size[1];
if($width < 300 || $height < 300)
{
  $uploadOk = 0;

}

// Check if there is any error occured
if ($_FILES["fileToUpload"]["error"] > 0)
{
  exit(); 
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
  exit();
// if everything is ok, try to upload file
} 
else 
{
  function image_fix_orientation(&$image, $filename) 
  {
    $exif = exif_read_data($filename);
    
    if (!empty($exif['Orientation'])) {
        switch ($exif['Orientation']) {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;
            
            case 6:
                $image = imagerotate($image, -90, 0);
                break;
            
            case 8:
                $image = imagerotate($image, 90, 0);
                break;
        }
    }
}

  function resize_image($path, $width, $height, $update = false) {
    $size  = getimagesize($path);// [width, height, type index]
    $types = array(1 => 'gif', 2 => 'jpeg', 3 => 'png');
    if ( array_key_exists($size['2'], $types) ) {
       $load        = 'imagecreatefrom' . $types[$size['2']];
       $save        = 'image'           . $types[$size['2']];
       $image       = $load($path);
       $resized     = imagecreatetruecolor($width, $height);
       $transparent = imagecolorallocatealpha($resized, 0, 0, 0, 127);
       imagesavealpha($resized, true);
       imagefill($resized, 0, 0, $transparent);
       imagecopyresampled($resized, $image, 0, 0, 0, 0, $width, $height, $size['0'], $size['1']);
       imagedestroy($image);
       return $save($resized, $update ? $path : null);
    }
 }

 if($imageFileType == "jpg" || $fileType == 'jpeg' )
 {
  $im = @imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]); 
 }
 else if($imageFileType == 'png')
 {
  $im = @imagecreatefrompng($_FILES["fileToUpload"]["tmp_name"]); 
 }
 

  image_fix_orientation($im, $_FILES["fileToUpload"]["tmp_name"]); 
  if ($im) 
  { imagejpeg($im, $_FILES["fileToUpload"]["tmp_name"]); 
    imagedestroy($im); 
  } 
  if(resize_image($_FILES["fileToUpload"]["tmp_name"], 300, 300, true))
  {
    
  }
  else
  {
    exit();
  }
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
  {
    // Delete the old one

    if($_POST['submit'] === 'edit')
    {  
      // Get the user image_name
      $stmt = $conn->prepare("SELECT img_url FROM profile  WHERE user_id = ?");
      $stmt->bind_param("i", $userId);
      $stmt->execute();
      $result = $stmt->get_result(); // get the mysqli result
      while ($row = $result->fetch_assoc()) 
      {
	      $oldImage = $row['img_url'];
      }
      $oldImage = __DIR__."/uploads/".$oldImage;
      if (file_exists($oldImage)) 
      {
       unlink($oldImage); 
      } 
      $stmt->close();
    }
  } 
  else 
  {
    exit();
  }
}