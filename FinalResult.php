<?php 
include 'inc/header.php'; 
include_once('class/StartExam.php');
$StartExam = new StartExam();

	// $Total = $StartExam->ExamquestionRows();
	// $Question = $StartExam->GetQuestion();

?>


<?php 

?>

<div class="main">
<h1>Your Have Done!!</h1>
<div class="test">
	<div style="text-align:center">
        <h2>Congrats You Have Just Complete The Test</h2>
        <h3>Your Final Score:<?php  
            if(isset($_SESSION['score'])){
                echo $_SESSION['score'];
                unset($_SESSION['score']);
            }
        ?></h3>
    </div>
    <div>
        <a href="Viewanswer.php"><button>View Answer</button></a>
        <a href="Startexam.php"><button>Start Again</button></a>
    </div>	
</div>
 </div>
<?php include 'inc/footer.php'; ?>