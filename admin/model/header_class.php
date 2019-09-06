<?php
require_once("dboperation.php");
class header_class extends dboperation
{
	function __construct()
{
$dboperation=new dboperation();

//$header=new header_class();
//$con=$db->establishconnection("199.79.62.23:3306","actgroupn36","Eef2v5@1","abetterchange_actgroup");
}
function  actgroup_header_slider()
{
	$cli_sql=@mysql_query("select * from slider order by slideorder");
	$numResults = mysql_num_rows($cli_sql);
	$counter=0;
	while($cli_rows=@mysql_fetch_array($cli_sql)){
		$counter=$counter+1;
		if ($counter == $numResults) {
        ?>
		 {
        "title" : "<?php echo $cli_rows['slidetitle']; ?>",
		"image" : "<?php echo $cli_rows['img']; ?>",
		"url" : "#",
		"firstline" : "<?php echo $cli_rows['slidedesc']; ?>",
}
		<?php
    } else {
		?>
         {
        "title" : "<?php echo $cli_rows['slidetitle']; ?>",
		"image" : "<?php echo $cli_rows['img']; ?>",
		"url" : "#",
		"firstline" : "<?php echo $cli_rows['slidedesc']; ?>",

	},
        <?php } }
	
}

function aac_slider()
{
	
	$cli_sql=@mysql_query("select * from slider where publish=1 order by slideorder");
	$numResults = mysql_num_rows($cli_sql);
	$counter=0;
	while($cli_rows=@mysql_fetch_array($cli_sql)){
		$counter=$counter+1;
		if ($counter == $numResults) {
        ?>
		               <div class="slide">
                       
<img src="<?php echo $this->get_path();?>uploads/slider/<?php echo $cli_rows['img']; ?>" alt=""  width="670" height="400" />
<div class="caption">
							<p style="color:#FFF; font-family:Georgia, 'Times New Roman', Times, serif;  ">&nbsp;<?php echo $cli_rows['slidetitle']; ?></p>
						</div>
</div>
		<?php
    } else {
		?>
           <div class="slide">
<img src="<?php echo $this->get_path();?>uploads/slider/<?php echo $cli_rows['img']; ?>" alt="" width="670" height="400"  />
<div class="caption">
							<p style="color:#FFF; font-family:Georgia, 'Times New Roman', Times, serif;  ">&nbsp;<?php echo $cli_rows['slidetitle']; ?></p>
			 </div>
</div>
        <?php } }
}

function  actgroup_header_page_select()
{
/*$menu_sql2=mysql_query("select * from pages where title='Company' order by page_order");
while($menurows2=@mysql_fetch_array($menu_sql2))
{
}*/
 $menu_sql=mysql_query("select * from pages where parent_id=0 order by page_order");
while($menurows=@mysql_fetch_array($menu_sql))
{
$submenu_sql2=mysql_query("select id from pages where parent_id=".$menurows['id']); 
?>
<li class="MenuBarItemSubmenu"><a href="#<?php /* if(mysql_num_rows($submenu_sql2)>0){ echo 'javascript:;'; } else { echo 'pages.php?id='. $menurows['id']; }*/ ?>" ><?php echo stripslashes($menurows['title']); ?></a>
<?php $submenu_sql=mysql_query("select * from pages where parent_id=".$menurows['id']." order by page_order"); 
if(mysql_num_rows($submenu_sql)>0){
?>
<ul>
<?php while($submenu_rows=@mysql_fetch_array($submenu_sql)){ ?>
<?php $submenu_sql3=mysql_query("select id from pages where parent_id=".$submenu_rows['id']); ?>
<li><a href="<?php if(mysql_num_rows($submenu_sql3)>0){ echo 'javascript:;'; } else { echo 'pages.php?id='. $submenu_rows['id']; } ?>" ><?php echo stripslashes($submenu_rows['title']); ?></a>
<?php $submenu2_sql=mysql_query("select * from pages where parent_id=".$submenu_rows['id']." order by page_order");
if(mysql_num_rows($submenu2_sql)>0){
?>
<ul>
<?php while($submenu2_rows=@mysql_fetch_array($submenu2_sql)){ ?>
<li><a href="pages.php?id=<?php echo $submenu2_rows['id']; ?>" ><?php echo stripslashes($submenu2_rows['title']); ?></a></li>
<?php } ?>
</ul>
<?php } ?>
</li>
<?php } ?>
<?php if(stripslashes($menurows['title'])=='Company'){ ?>

                <li><a href="management.php">Management</a></li>
       			<!--<li><a href="organization-structure.php">Organization Structure</a></li>-->
      			<li><a href="awards.php">Awards & Certificates</a></li>
<?php } ?>
</ul>
<?php } ?>

</li>
<?php } 

}



	function actgroup_header_sectors()
{
	
	            $menusersql=mysql_query("select id, title from services order by title"); while($menuser=@mysql_fetch_array($menusersql)){?>
				<li><a href="services.php?id=<?php echo $menuser['id']; ?>"><?php echo stripslashes($menuser['title']); ?></a></li>
 <?php } 
}


	function actgroup_header_products()
{
	
	          $menupdtsql=@mysql_query("select * from category where cat_type='main' order by cat_name"); while($menupdt=@mysql_fetch_array($menupdtsql)){?>
				<li><a href="products.php?page=products&cat=<?php echo $menupdt['id']; ?>"><?php echo stripslashes($menupdt['cat_name']); ?></a></li>
 <?php } 
}


	function actgroup_header_projects()
{
	
	          $menupdtsql=mysql_query("select * from projecttype order by id desc"); while($menupdt=@mysql_fetch_array($menupdtsql)){?>
				<li><a href="projects.php?project=<?php echo $menupdt['projecttype']; ?>"><?php echo stripslashes($menupdt['projecttype']); ?></a></li>
 <?php } 
}
function  actgroup_header_messages()
{
	
	            $menusersql=mysql_query("select id, title from messages order by title"); while($menuser=@mysql_fetch_array($menusersql)){?>
				<li><a href="messages.php?id=<?php echo $menuser['id']; ?>"><?php echo stripslashes($menuser['title']); ?></a></li>
 <?php }
}
	
}
?>