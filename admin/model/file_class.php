<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of file_class
 *
 * @author Administrator
 */
class file_class {
    //put your code here
    
    
    function file_upload($file,$filename,$path)
    {
            $fileCount = count($file["file"]['name']);
            $j=0;
     for($i=0; $i < $fileCount; $i++)
     {
         $RandomNum   = date('Y-m-d H:i:s');
         
         $realpath = $file['file']['name'][$i];
 $ext = pathinfo($realpath, PATHINFO_EXTENSION);
$newfilename=md5($filename."_".$RandomNum);
      $file['file']['type'][$i];
       $target_path =   $path.$newfilename.".".$ext;
         if(move_uploaded_file($file['file']['tmp_name'][$i], $target_path)) {
             $ret[$j]=$newfilename.".".$ext;
             $j++;

} 
     }
     
    
    return $ret;
    }
    
    
    
     function file_upload_single($file,$filename,$path)
    {
           // $fileCount = count($file["file"]['name']);
            $j=0;
//     for($i=0; $i < $fileCount; $i++)
//     {
         $RandomNum   = date('Y-m-d H:i:s');
         
         $realpath = $file['name'];
 $ext = pathinfo($realpath, PATHINFO_EXTENSION);
$newfilename=md5($filename."_".$RandomNum);
      $file['type'][$i];
       $target_path =   $path.$newfilename.".".$ext;
         if(move_uploaded_file($file['tmp_name'], $target_path)) {
             $ret[$j]=$newfilename.".".$ext;
             $j++;

} 
//     }
     
    
    return $ret;
    }
    
    
     function file_upload2($file,$filename,$path)
    {
            $fileCount = count($file["file2"]['name']);
            $j=0;
     for($i=0; $i < $fileCount; $i++)
     {
         $RandomNum   = date('Y-m-d H:i:s');
         
         $realpath = $file['file2']['name'][$i];
 $ext = pathinfo($realpath, PATHINFO_EXTENSION);
$newfilename=md5($filename."_".$RandomNum);
      $file['file2']['type'][$i];
       $target_path =   $path.$newfilename.".".$ext;
         if(move_uploaded_file($file['file2']['tmp_name'][$i], $target_path)) {
             $ret[$j]=$newfilename.".".$ext;
             $j++;

} 
     }
     
    
    return $ret;
    }
    
    
        function is_image2($file)
{
               $fileCount = count($file["file2"]['name']);
               $status="no";
            $j=0;
     for($i=0; $i < $fileCount; $i++)
     {
         if(($file["file2"]['type'][$i]=="image/png")||($file["file2"]['type'][$i]=="image/jpeg")||($file["file2"]['type'][$i]=="image/bmp"))
         {
              $status="yes";
         }

        
     }
      return $status;
}




    
    function getFileExtension($str)
{
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
    
    function store_uploaded_file_name($ret)
    {
        $file_db_string="";
        if(count($ret)==0)
        {
            $file_db_string=$file_db_string."nill"; 
        }
        else if(count($ret)==1)
        {
        $file_db_string=$file_db_string.$ret[0];
        }
 else {
        for($i=0;$i<count($ret);$i++)
        {
            $file_db_string=$file_db_string.",".$ret[$i];
        }
 }
 return  $file_db_string;
    }
    
    
    function is_image($file)
{
        print_r($file);
             echo  $fileCount = count($file["file"]['name']);
               $status="no";
            $j=0;
     for($i=0; $i < $fileCount; $i++)
     {
         if(($file["file"]['type'][$i]=="image/png")||($file["file"]['type'][$i]=="image/jpeg")||($file["file"]['type'][$i]=="image/bmp"))
         {
              $status="yes";
         }

        
     }
      return $status;
}



  function is_image_single($file)
{
       print_r($file);
        // echo $fileCount = count($file["file"]['name']);
               $status="no";
            $j=0;
    
         if(($file['type']=="image/png")||($file['type']=="image/jpeg")||($file['type']=="image/bmp"))
         {
              $status="yes";
         }

            
      
        echo $status;
     
      return $status;
}

    function is_doc($file)
{
        echo "<br/>";
        print_r($file);
        $allowedExts = array("doc", "docx", "pdf");
          
               $fileCount = count($file["file"]['name']);
               $status="no";
            $j=0;
     for($i=0; $i < $fileCount; $i++)
     {
      $extension = end(explode(".", $file["file"]["name"][$i]));
             // if (($file["file"]["type"][$i] == "application/pdf") || ($file["file"]["type"][$i] == "application/msword") || ($file["file"]["type"] [$i]== "application/vnd.openxmlformats-officedocument.wordprocessingml.document") && ($file["file"]["size"] [$i]< 20000000) && in_array($extension, $allowedExts))
    if (($file["file"]["size"] [$i]< 20000000) && in_array($extension, $allowedExts))        
    {
             $status="yes";
         }

        
     }
      return $status;
}
   
function check_filearray_empty($file)
{
     $fileCount = count($file["file"]['name']);
               $status="no";
            $j=0;
     for($i=0; $i < $fileCount; $i++)
     {
         if($file['file']['error'][$i]==UPLOAD_ERR_NO_FILE)
         {
             $status="yes";
         }
     }
     return $status;
}

function check_file_empty($file)
{
    $status="no";
         if($file['error']==UPLOAD_ERR_NO_FILE)
         {
             $status="yes";
         }
     
     return $status;
}

function check_filearray_empty2($file)
{
     $fileCount = count($file["file2"]['name']);
               $status="no";
            $j=0;
     for($i=0; $i < $fileCount; $i++)
     {
         if($file['file2']['error'][$i]==UPLOAD_ERR_NO_FILE)
         {
             $status="yes";
         }
     }
     return $status;
}
function any_uploaded($name) {
  foreach ($_FILES[$name]['error'] as $ferror) {
    if ($ferror != UPLOAD_ERR_NO_FILE) {
      return true;
    }
  }
  return false;
}

function delete_file($dir,$filename)
{
    echo $dir."/".$filename;
    if (is_dir($dir)) {
        
    if ($dh = opendir($dir)) {
          
        while (($file = readdir($dh)) !== false) {
               
              
           if($file==$filename)
           {
                  
               unlink($dir."/".$file);
           }
        }
        closedir($dh);
    }
}
}
function copyfile($source,$destination)
{
    $status="";
   // $file = '/usr/home/guest/example.txt';
//$newfile = '/usr/home/guest/example.txt.bak';
 
if (!copy($source, $destination)) {
   $status="no";
}else{
    $status="yes";
}
return $status;
}
function Thumbnailcreation($url,$pho,$resize,$thumb)
{
    $uploadedfile = $url.$pho;
 	$filename = $pho;
  	$extension1 = $this->getFileExtension($filename);
 	$extension1 = strtolower($extension1);
$src = imagecreatefromjpeg($uploadedfile);

list($width,$height)=getimagesize($uploadedfile);
if($width<$resize)
{
$newwidth=$width;
$newheight=$height;
}
else
{
    $newwidth=$resize;
$newheight=($height/$width)*$newwidth;
//$newwidth=1000;
//$newheight=($height/$width)*$newwidth;
}
$tmp=imagecreatetruecolor($newwidth,$newheight);
$newwidth1=$thumb;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);


if (!file_exists($url.'/thumb')) {
    mkdir($url.'/thumb', 0777, true);
}
if (!file_exists($url.'/resize')) {
    mkdir($url.'/resize', 0777, true);
}
$filename = $url."/resize/".$pho;
$filename1 =$url."/thumb/".$pho;
imagejpeg($tmp,$filename);
imagejpeg($tmp1,$filename1);
imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}



function cropThumbnailcreation($url,$pho,$resize,$thumbfolder)
{
    $uploadedfile = $url.$pho;
 	$filename = $pho;
  	$extension1 = $this->getFileExtension($filename);
 	$extension1 = strtolower($extension1);
        echo "extension :".$extension1;
        
        if($extension1=="png")
        {
           $src = imagecreatefrompng($uploadedfile); 
        }
 else {
     $src = imagecreatefromjpeg($uploadedfile);
 }


list($width,$height)=getimagesize($uploadedfile);
if($width<$resize)
{
$newwidth=$width;
$newheight=$height;
}
else
{
    $newwidth=$resize;
$newheight=($height/$width)*$newwidth;
//$newwidth=1000;
//$newheight=($height/$width)*$newwidth;
}
$tmp=imagecreatetruecolor($newwidth,$newheight);
$newwidth1=$thumb;
$newheight1=($height/$width)*$newwidth1;
//$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

//imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);


if (!file_exists($url.$thumbfolder)) {
    mkdir($url.$thumbfolder, 0777, true);
}


$filename =$url.$thumbfolder."/".$pho;
   if($extension1=="png")
        {
       imagepng($tmp,$filename);
   }
 else {
       imagejpeg($tmp,$filename);
   }


imagedestroy($src);
imagedestroy($tmp);
//imagedestroy($tmp1);
}

//function Checkimagewidthheight($file,$width,$height) 
//{
//    $status="no";
//    list($nwidth,$nheight) =getimagesize($file['file']['name']['tmp_name'][0]);
//    echo $nwidth."fdgvdf ".$nheight;
//    if($nheight>$height)
//    {
//        $status="yes";
//    }
//else if($nwidth>$width)
//{
//      $status="yes";
//}
// else {
//    $status="no";
//}
//return $status;
//}



function CropImageFile($w,$h,$x,$y,$path,$file) { // Note: GD library is required for this function
$ar=array();
//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $iWidth = $w;
       $iHeight = $h; // desired image result dimensions
        $iJpgQuality = 50;

        if ($file) {

            // if no errors and size less than 250kb
           // if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 250 * 1024) {
                if (is_uploaded_file($file['file']['tmp_name'][0])) {

                    // new unique filename
                    $filename=md5(time().rand());
                    $sTempFileName = $path.$filename;
                            
                    // move uploaded file into cache folder
                    move_uploaded_file($file['file']['tmp_name'][0], $sTempFileName);

                    // change file permission to 644
                    @chmod($sTempFileName, 0644);

                    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }
                            $gext="";
                        // check for image type
                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';
                             $gext="jpeg";
                                // create a new image from file 
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                            
                            
                            /*case IMAGETYPE_GIF:
                                $sExt = '.gif';

                                // create a new image from file 
                                $vImg = @imagecreatefromgif($sTempFileName);
                                break;*/
                            case IMAGETYPE_PNG:
                                $sExt = '.png';
                                $gext="png";
                                // create a new image from file 
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }

                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );

                        // copy and resize part of an image with resampling
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$x, (int)$y, $iWidth, $iHeight, (int)$w, (int)$h);

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;
                       $nfile=$filename.$sExt;
                        // output image to file
                       if($gext=="jpeg")
                       {
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                       }
                       if($gext=="png")
                       {
                        imagepng($vDstImg, $sResultFileName, $iJpgQuality);
                       }
                        //@unlink($sTempFileName);
$ar[0]=$nfile;
                        return $ar;
                    }
                }
            //}
        }
    //}
}

}
