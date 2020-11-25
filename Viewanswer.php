<?php 
	include 'inc/header.php';
	include_once('class/StartExam.php');
?>

<?php
	$StartExam = new StartExam();
    $Total = $StartExam->ExamquestionRows();
    $allquestion = $StartExam->QuestionByOrder();
   
    
?>

<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
	}
?>

<div class="main">
<h1>All Answers</h1>
	<div class="test">
		<form method="post" action="">
		<table> 
            <?php 
                if($allquestion !== null || $allquestion !== ''){
                    foreach($allquestion as $key=>$que){
            ?>
            
            <tr>
				<td colspan="2">
				 <h3>Que <?php echo $que['question_no']?>: <?php  echo $que['question_name']?></h3>
				</td>
			</tr>
            <?php 
                $number = $que['question_no'];
                $GetAnswer = $StartExam->GetAnswer($number);
				if($GetAnswer !== null || $GetAnswer !== ''){
				foreach($GetAnswer as $key=> $Singleans){
			?>
			<tr>
				<td>
                    <input type="radio" name="ans"/><?php
                    if($Singleans['right_answer'] == '1'){
                        echo "<span style='color:green'>".$Singleans['option_answer']."</span>";
                    }else{
                    echo $Singleans['option_answer'];
                    }
                     
                     ?>
				</td>
			</tr>
			<?php 
				}}
			?>
            <?php 
                }}
            ?>
			<tr>
			  <td>
				 <a href="Startexam.php"><button>Start Again</button></a>
			</td>
			</tr>
			
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>



