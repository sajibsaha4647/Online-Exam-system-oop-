<?php 
	include 'inc/header.php';
	include_once('class/StartExam.php');
?>

<?php

	if(isset($_GET['Q'])){
		$number =(int) $_GET['Q'];
	}else{
		header('locaton:exam.php');
	}
	
	$StartExam = new StartExam();

	$Total = $StartExam->ExamquestionRows();
	$Question = $StartExam->QuestionByNumber($number);
	$GetAnswer = $StartExam->GetAnswer($number);
?>

<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$ProcessAns = $StartExam->GetProcessAnswer($_POST);
	}
?>

<div class="main">
<h1>Question <?php echo $Question['question_no']?> of <?php echo $Total?></h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $Question['question_no']?>: <?php  echo $Question['question_name']?></h3>
				</td>
			</tr>
			<?php 
				if($GetAnswer !== null || $GetAnswer !== ''){
				foreach($GetAnswer as $key=> $Singleans){
			?>
			<tr>
				<td>
					<input type="radio" value="<?php echo $Singleans['answer_id'] ?>" name="ans"/><?php echo $Singleans['option_answer']?>
				</td>
			</tr>
			<?php 
				}}
			?>
			<tr>
			  <td>
				<input type="hidden" name="number" value="<?php echo $number?>"/>
			</td>
			</tr>
			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
			</td>
			</tr>
			
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>