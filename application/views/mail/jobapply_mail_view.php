
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


</head>

<body style="background-color:#e3e3e3;">
    <?php
   
    ?>
<div class="cover" style="width:1000px; height:auto; margin:0 auto; ">

<table width="700" border="0" align="center"   cellspacing="0" cellpadding="2"  >
  <tr>
    <td height="79" bgcolor="#FFFFFF">
        <img src="<?php echo base_url() ?>images/logo.png" style="padding-left:20px;" />
    
    </td>
  </tr>
  <tr>
    <td height="0" bgcolor="#000"></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0">
        
    <p style="margin-left:10px;">
     <table>
      <tr><td><strong> <?php echo  JOBMAILTEMPLATE." ".$post['name'] ?></strong></td><td></td><td></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
     <tr><td>Post Applied</td><td>:</td><td><?php echo $post['post_applied'] ?></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
       <tr><td>Name</td><td>:</td><td><?php echo $post['name'] ?></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
       <tr><td>Age</td><td>:</td><td><?php echo $post['age'] ?></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
       <tr><td>Gender </td><td>:</td><td><?php echo $post['gender'] ?></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
       <tr><td>Email</td><td>:</td><td><?php echo $post['email'] ?></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
       <tr><td>Contact Number</td><td>:</td><td><?php echo $post['contactno'] ?></td> </tr>
           <tr><td></td><td></td><td></td> </tr>
       <tr><td>Nationality</td><td>:</td><td><?php echo $post['nationality'] ?></td> </tr>
           <tr><td></td><td></td><td></td> </tr>
       <tr><td>Passport Details</td><td>:</td><td><?php echo $post['passport'] ?></td> </tr>
              <tr><td></td><td></td><td></td> </tr>
       <tr><td>Iqama Details</td><td>:</td><td><?php echo $post['iqamadetails'] ?></td> </tr>
              <tr><td></td><td></td><td></td> </tr>
       <tr><td>Iquama Status</td><td>:</td><td><?php echo $post['iquamastat'] ?></td> </tr>
              <tr><td></td><td></td><td></td> </tr>
       <tr><td>Description about Experience</td><td>:</td><td><?php echo $post['resume'] ?></td> </tr>
            <tr><td></td><td></td><td></td> </tr>
       <tr><td>Download Resume</td><td>:</td><td><a href="<?php echo base_url() ?>upload/resume/<?php echo $post['file'] ?>" target="_blank">Download</a></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
      
    
      </table>    
    

</p>
      </td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#eee">
    
    
    
     <p style="color:#575757; line-height:21px; text-align:justify; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; 
font-size:13px;"></a><br />
 This is system generated Mail. Please do not reply to this message.</p>
    
    
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#eee">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#eee">
   
    
    </td>
  </tr>
</table>
 



</div>


</body>
</html>
