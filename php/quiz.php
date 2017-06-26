<?php
include '../includes/constants.php';
include '../includes/header.php';
include '../includes/nav.php';
?>


<div id="quiz">

    <div class="container">
        <h1>apologetics Quiz</h1>



        <?php


        $Questions = array(
            1 => array(
                'Question' => 'who is god',
                'Answers' => array(
                    'A' => 'adam',
                    'B' => 'moses',
                    'C' => 'jesus',
                ),
                'CorrectAnswer' => 'C'
            ),
            2 => array(
                'Question' => 'why did God create satan',
                'Answers' => array(
                    'A' => 'to save the world',
                    'B' => 'to destroy the world',
                    'C' => 'non of the above',
                ),
                'CorrectAnswer' => 'C'
            ),
            3 => array(
                'Question' => 'who did cain marry',
                'Answers' => array(
                    'A' => 'his sister',
                    'B' => 'his friend',
                    'C' => 'someone not related',
                ),
                'CorrectAnswer' => 'A'
            ),
            4 => array(
                'Question' => 'God created this world in',
                'Answers' => array(
                    'A' => '70 years',
                    'B' => 'it created it self',
                    'C' => '7 days',
                ),
                'CorrectAnswer' => 'C'
            ),
            5 => array(
                'Question' => 'Jesus will return in',
                'Answers' => array(
                    'A' => '20 years',
                    'B' => 'due time',
                    'C' => 'he will never return',
                ),
                'CorrectAnswer' => 'B'
            ),
            6 => array(
                'Question' => 'does God break his own commandments',
                'Answers' => array(
                    'A' => 'at least twice',
                    'B' => 'when he has to',
                    'C' => 'never',
                ),
                'CorrectAnswer' => 'C'
            ),
            7 => array(
                'Question' => 'why did God create mankind with the ability to sin',
                'Answers' => array(
                    'A' => 'so he can control us',
                    'B' => 'so they can exercise free will',
                    'C' => 'to show who is stronger',
                ),
                'CorrectAnswer' => 'B'
            ),
        );


        if (isset($_POST['answers'])){
            $Answers = $_POST['answers'];




            $number_correct = 0;

            foreach ($Questions as $QuestionNo => $Value) {
                echo $Value['Question'] . '<br />';
                if ($Answers[$QuestionNo] != $Value['CorrectAnswer']) { // incorrect
                    echo '<span style="color: red;">' ."the correct answer is ". $Value['CorrectAnswer']. '</span>';
                } else { //correct
                    $number_correct++;
                    echo '<span style="color: blue;">' . $Value['Answers'][$Answers[$QuestionNo]] . '</span>';
                }
                echo '<br/><hr>';


            }

            echo "You got $number_correct/7 correct";


            $name = $_POST["name"];
            $number = $_POST ["cell"];

            file_put_contents("","name: $name"." "."number: $number"." "."result: $number_correct/4"."<br/>",FILE_APPEND);

        } else {
            ?>

            <form action="" method="post" id="quiz">
                <?php foreach ($Questions as $QuestionNo => $Value){ ?>

                    <h3><?php echo $Value['Question']; ?></h3>
                    <?php
                    foreach ($Value['Answers'] as $Letter => $Answer){
                        $Label = 'question-'.$QuestionNo.'-answers-'.$Letter;
                        ?>
                        <div>
                            <input type="radio" name="answers[<?php echo $QuestionNo; ?>]" id="<?php echo $Label; ?>" value="<?php echo $Letter; ?>" />
                            <label for="<?php echo $Label; ?>"><?php echo $Letter; ?>) <?php echo $Answer; ?> </label>
                        </div>


                    <?php } ?>

                <?php } ?>


                <div class="form">
                    
                    <button type="submit" class="btn btn-primary">Submit Quiz</button>
                </div>
            </form>

            <?php
        }

        ?>



    </div>
</div>

</div>

<?php
if( $_POST["name"] || $_POST["cell"]) {
    echo "thank you ". $_POST['name']."<br/>";
    echo "your number is". " ". $_POST['cell']."<br />";
    echo "your score is". " $number_correct/4";

    exit();
}

?>


<?php include '../includes/footer.php';?>
