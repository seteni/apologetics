<?php
include '../includes/constants.php';
include '../includes/header.php';
include '../includes/nav.php';
?>


<div id="sign_in">
    <div>
        <h3><p> sign up for email updates</p></h3>
    </div>

    <form action="" class="form"  method="post">
        <div class="row">
                <div class="eight columns">
                <input type="hidden" name="action" value="insert">
                </div>
                <div class="eight columns">
                    <label for="name">name:</label>
                <input class="u-full-width" type="text" placeholder="name" id="name" name="name">
                </div>
                <div class="eight columns">
                <label for="surname">surname:</label>
                <input class="u-full-width" type="text" placeholder="surname" id="surname" name="surname">
                </div>
                <div class="eight columns">
                <label for="email">email:</label>
                <input class="u-full-width" type="text" placeholder="email" id="email" name="email">
                 </div>
        </div>

        <input class="button-primary" type="submit" value="sign up">
    </form>

</div>

<?php
require  '../includes/connection.php';



if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $insert_query = "INSERT INTO members (name,surname,email) value ('$name','$surname','$email')";
    $result = mysqli_query($conn, $insert_query);


}

echo 'thanks for signing up for the email updates';
//$select_query = "SELECT * FROM members ";
//$result = mysqli_query($conn, $select_query);
//
//mysqli_close($conn);
?>


<?php include '../includes/footer.php';?>


