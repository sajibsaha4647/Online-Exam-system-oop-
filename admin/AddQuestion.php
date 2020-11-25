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
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $result = $ExamQuestionAns->InsertQuestionAns($_POST);
  }

  $total = $ExamQuestionAns->ExamquestionRows();
  $Rowtotal = $total+1;
//   var_dump($Rowtotal);
?>

<div class="main">
<div class="grid_10">
	<div class="box round first grid">
		<h2>Add Question</h2>
		<div style="margin-top:30px" class="block">
            <form  action="" method="POST" enctype="multipart/form-data">
                <?php 
                    if(isset($result)){
                        echo $result;
                    }
                ?>
                <table>
                    <tr style="margin-bottom:20px;">
                        <td>Question No</td>
                        <td>:</td>
                        <td>
                            <input type="number" value="<?= $Rowtotal?>" name="question_number"/>
                        </td>
                    </tr>
                    <tr style="margin-bottom:20px">
                        <td>Question</td>
                        <td>:</td>
                        <td>
                            <input type="text" value="" placeholder="Enter a question" name="question"/>
                        </td>
                    </tr>
                    <tr style="margin-bottom:20px">
                        <td>Choice one</td>
                        <td>:</td>
                        <td>
                            <input type="text" value="" placeholder="Enter a ans1" name="ans1"/>
                        </td>
                    </tr>
                    <tr style="margin-bottom:20px">
                        <td>Choice two</td>
                        <td>:</td>
                        <td>
                            <input type="text" value="" placeholder="Enter a ans2" name="ans2"/>
                        </td>
                    </tr>
                    <tr style="margin-bottom:20px">
                        <td>Choice Three</td>
                        <td>:</td>
                        <td>
                            <input type="text" value="" placeholder="Enter a ans3" name="ans3"/>
                        </td>
                    </tr>
                    <tr style="margin-bottom:20px">
                        <td>Choice four</td>
                        <td>:</td>
                        <td>
                            <input type="text" value="" placeholder="Enter a ans4" name="ans4"/>
                        </td>
                    </tr>
                    <tr style="margin-bottom:20px">
                        <td>Currect No.</td>
                        <td>:</td>
                        <td>
                            <input type="number" value="" placeholder="Enter a currect Number" name="currect_No"/>
                        </td>
                    </tr>
                    <tr style="margin-bottom:20px">
                        <td>
                            <input type="submit" value="submit question" name="submit"/>
                        </td>
                    </tr>
                </table>
            </form>
		</div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>