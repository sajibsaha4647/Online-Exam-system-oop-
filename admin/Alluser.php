<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../inc/header.php');
    include_once("../lib/Session.php");
	include_once('../class/Frontlogin.php');
// Session::init();
	// Session::checkLogin();
	$Frontlogin = new Frontlogin();
?>
<?php
  if(isset($_GET['action']) == 'delete'){
        $id = $_GET['id'];
        $result = $Frontlogin->DeleteUser($id);
  }
?>

<div class="main">
<div class="grid_10">
	<div class="box round first grid">
		<h2>User List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
                <?php 
                    if(isset( $result)){
                        echo  $result;
                    }
                ?>
				<thead>
					<tr>
						<th style="width:15%;border:1px solid#000">name</th>
						<th style="width:15%;border:1px solid#000">user name</th>
						<th style="width:15%;border:1px solid#000">email</th>
						<th style="width:15%;border:1px solid#000">status</th>
						<th style="width:40%;border:1px solid#000">Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php 
                        foreach($Frontlogin->showalluser() as $key=>$value){
                    ?>
                    <tr style="border-bottom:1px solid#000;margin-bottom:10px" class="odd gradeX">
                        <td style="width:22%;margin:0 auto,"><?=$value['student_name']?></td>
                        <td style="width:22%;margin:0 auto,"><?=$value['student_username']?></td>
                        <td style="width:22%;margin:0 auto,"><?=$value['students_email']?></td>
                        <td style="width:22%;margin:0 auto,"><?php echo $value['students_status'] == 1 ? 'active': 'inactive'?></td>
                        <td><a href="">Edit</a> |<a onclick="return confirm('you wants to delete')"  href="Alluser.php?action=delete & id=<?=$value['students_id']?>">Delete</a> </td>
                    </tr>
                        <?php }?>
				</tbody>
			</table>

		</div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>