<?php 
include 'inc/header.php'; 
include_once('class/StartExam.php');
$StartExam = new StartExam();

	$Total = $StartExam->ExamquestionRows();
	$Question = $StartExam->GetQuestion();

?>


<?php 

?>

<div class="main">
<h1>Welcome to Online Exam</h1>
<div class="test">
	<div style="text-align:center">
        <h2>Test Your Knowledge</h2>
    </div>
    <div>
        <h3 style="text-align:center">This is Multiple Choice Quize Test</h3>
        <h4>Number Of Question : <?php echo $Total?></h4>
        <h4>Question Type: Multiple Choice</h4>
        <h5 style="margin-top:15px"><a href="test.php?Q=<?=$Question['question_no']?> ">Start Exam</a></h5>
    </div>	
</div>
 </div>
<?php include 'inc/footer.php'; ?>