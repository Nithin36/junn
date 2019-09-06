<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$gallery_model=new gallery_model();
if(isset($_POST["addgallery"]))
{
   
     $status="";
 $num=$gallery_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_gallery.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$gallery_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/gallerys/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/gallerys/',$dfile,290,'thumb');
               $file_class->cropThumbnailcreation('../../upload/gallerys/',$dfile,150,'thumb2');
                   $_POST=$gallery_model->escapestring_rows($_POST);
              $num=$gallery_model->insert_gallery($_POST);
              if(num!=0)
              {
                    header('location: ../add_gallery.php?action=fail');
              }
              else
              {
               header('location: ../add_gallery.php?action=sucess');
              }
        }
 else {
        header('location: ../add_gallery.php?action=fail');
 }
        }
         else {
      header('location: ../add_gallery.php?action=fail');
 }
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
                                         $row=$gallery_model->get_gallery($_GET["del_id"]);
                                     
                                       unlink('../../upload/gallerys/thumb/'.$row['photo']);
                                       unlink('../../upload/gallerys/thumb2/'.$row['photo']);
                                       unlink('../../upload/gallerys/'.$row['photo']);
    $r=$gallery_model->del_gallery($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_gallery.php?delete=fail'.$url);
}
else
{
	header('location: ../list_gallery.php?delete=sucess'.$url);
}
}



if(isset($_POST["editgallery"]))
{
   
     $status="";
$num=$gallery_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_gallery.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$gallery_model->get_gallery($_POST["id"]);
                                      if($row6['photo']!="")
                                      {
                                       unlink('../../upload/gallerys/thumb/'.$row6['photo']);
                                       unlink('../../upload/gallerys/thumb2/'.$row6['photo']);
                                       unlink('../../upload/gallerys/'.$row6['photo']);
                                      }
            $filename=$gallery_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/gallerys/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/gallerys/',$dfile,290,'thumb');
               $file_class->cropThumbnailcreation('../../upload/gallerys/',$dfile,150,'thumb2');
                   $_POST=$gallery_model->escapestring_rows($_POST);
              $num=$gallery_model->update_gallery2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_gallery.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_gallery.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_gallery.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_gallery.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$gallery_model->escapestring_rows($_POST);
    $j=$gallery_model->update_gallery($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_gallery.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_gallery.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}
if(isset($_POST['p'])){
//include("pages.php");
//include("db.php");
 // echo "gkhjlhl";
    $r=array();
     $_GET['p']=$_POST['p'];
    $max_records=20;
   
        $query="select * from  gallery  order by num ";
    
     
$r=$gallery_model->ajax_pagination_query($max_records,$query);

 $total_records=$r['totalrecords'];
 $page=$r['page'];
$current_page=$r['currentpage'];
$html='';
$pages='';

if($total_records>0){
	
$page_rs=mysql_query($page);
$page_count=mysql_num_rows($page_rs);
while($page_row=mysql_fetch_assoc($page_rs)){
  
   // $page_row= $gallery_model->stripslahes_rows($page_row);
$html.=' <div class="col-sm-6 col-md-3 photo">
                                  <img  class="img-responsive" src="upload/gallerys/'.$page_row['photo'].'"/>
                     <div class="overlay">
                                <div class="recent-work-inner">
                                   
                                    <a class="preview" href="upload/gallerys/'.$page_row['photo'].'" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                  
                
            </div>';   
}

if($total_records>0){
    if($total_records>$max_records){
$pages=$pages.$gallery_model->pagelist($current_page,$total_records,$max_records);
    }
}
echo json_encode(array('status'=>true,'html'=>"$html",'pages'=>"$pages"));exit;
}else
{
$html.='<div class="alert alert-info alert-dismissable">'.
'<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'.
'No Photos Available
</div> ';
echo json_encode(array('status'=>true,'html'=>"$html"));exit;
}
}


ob_flush();
?>