<?php 
include_once('inc/header.php'); 


?>
<div class="main">
<h1>Your Profile</h1>
	<div style="border: 1px solid #d3d3d3;border-radius: 4px;float: left;min-height: 225px;padding: 20px;width: 95%;">
        <form action="" method="post" enctype="multipart/form-data">
            <div id="showprofilemsg"></div>  
            <table class="tbl">  
                    <tr>
                        <td>name</td>
                        <td><input name="name" id="name" placeholder="Enter Name" type="text" value="<?php echo Session::get('frontname')?>"></td>
                    </tr>
                    <tr>
                        <td>User name</td>
                        <td><input name="username" id="username" placeholder="Enter Name" type="text" value="<?php echo Session::get('frontuser')?>"></td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td><input disabled id="email" placeholder="Enter Email" style="border: 1px solid #ddd;margin-bottom: 10px;padding: 5px;width: 238px;" name="email" type="email" value="<?php echo Session::get('frontemail')?>"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" id="proSubmit" name="submit" value="Proflie Update">
                    </td>
                    </tr>
            </table>
        </form>
	</div>
  </div>
<?php
 include ('inc/footer.php'); 
 ?>