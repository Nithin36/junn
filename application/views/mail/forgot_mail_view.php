
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


</head>

<body style="background-color:#e3e3e3;">
    <?php
   //print_r($post);
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
      <tr><td><strong><?php echo  FORGOTMAILTEMPLATE." ".$post['fname']." ".$post['lname']; ?></strong></td><td></td><td></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
 
      
   
       <tr><td>Email</td><td>:</td><td><?php echo $post['email']; ?></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
     <tr><td>Password</td><td>:</td><td><?php echo base64_decode($post['password2']); ?></td> </tr>
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
