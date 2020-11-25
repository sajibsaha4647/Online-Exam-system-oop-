<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../inc/header.php');
    include_once("../lib/Session.php");
	include_once('../class/ExamQuestionAns.php');
// Session::init();
	// Session::checkLogin();
	$ExamQuestionAns = new ExamQuestionAns();
?>
<?php
  if(isset($_GET['action']) == 'delete'){
        $id = $_GET['id'];
        $result = $ExamQuestionAns->DeleteQuestions($id);
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
						<th style="width:10%;border:1px solid#000">No.</th>
						<th style="width:60%;border:1px solid#000">All Questions</th>
						<th style="width:30%;border:1px solid#000">Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php 
                        foreach($ExamQuestionAns->ShowQuestions() as $key=>$value){
                    ?>
                    <tr style="border-bottom:1px solid#000;margin-bottom:10px" class="odd gradeX">
                        <td style="width:22%;font-size:16px;margin-bottom:10px"><?=$key+1?></td>
                        <td style="width:22%;font-size:16px;margin-bottom:10px"><?php echo $value['question_name']?></td>
                        <td><a href="">Edit</a> |<a onclick="return confirm('you wants to delete')"  href="QuestionList.php?action=delete & id=<?=$value['question_id']?>">Delete</a> </td>
                    </tr>
                        <?php }?>
				</tbody>
			</table>

		</div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>