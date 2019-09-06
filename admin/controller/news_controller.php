<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$news_model=new news_model();
$file_class=new file_class();
//$subnews_model=new subnews_model();
if(isset($_POST["addnews"]))
{
   
     $status="";
 $num=$news_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_news.php?action=fail');

}

 else {

      $_POST=$news_model->escapestring_rows($_POST);
              $num=$news_model->insert_news($_POST);
             $id= mysql_insert_id(); 
               if(num!=0)
              {
                   header('location: ../add_news.php?action=fail');
              }
              else {
                   if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
             if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$news_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/news/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/news/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/news/',$dfile,150,'thumb2');
                   $_POST=$news_model->escapestring_rows($_POST);
              $num2=$news_model->update_news_image($id,$_POST);
         
        }
        }
    }
        header('location: ../add_news.php?action=sucess');
 }
 
}

}


if(isset($_GET["del_id"]))
{
      $url="";
                                        If(isset($_GET['page']))
                                        {
                                            $url=$url."&page=".$_GET['page'];
                                        }
                                        
                                         If(isset($_GET['pgno']))
                                        {
                                             $url=$url."&pgno=".$_GET['pgno'];
                                        }
                                         $row=$news_model->get_news($_GET["del_id"]);
                                         if($row['image']!="")
                                         {    
                                         unlink('../../upload/news/thumb/'.$row['image']);
                                       unlink('../../upload/news/thumb2/'.$row['image']);
                                       unlink('../../upload/news/'.$row['image']);
                                         }
                                        
                                     
      //$r3=$subnews_model->del_subnews_news($_GET["del_id"]);                               
    $r=$news_model->del_news($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_news.php?delete=fail'.$url);
}
else
{
	header('location: ../list_news.php?delete=sucess'.$url);
}
}



if(isset($_POST["editnews"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$news_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_news.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
          $_POST=$news_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$news_model->update_news($_POST);
  if(($j!=0)||($j!=1))
  {
        if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
             if($file_class->is_image($_FILES)=="yes")
        {
                    $row=$news_model->get_news($_POST['id']);
                    if($row['image']!="")
                    {
                                         unlink('../../upload/news/thumb/'.$row['image']);
                                       unlink('../../upload/news/thumb2/'.$row['image']);
                                       unlink('../../upload/news/'.$row['image']);
                    }                  
            $filename=$news_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/news/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/news/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/news/',$dfile,150,'thumb2');
                   $_POST=$news_model->escapestring_rows($_POST);
              $num2=$news_model->update_news_image($_POST['id'],$_POST);
         
        }
        }
    }
       header('location: ../edit_news.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_news.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}



ob_flush();
?>