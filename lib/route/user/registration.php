    <?php              

include_once('../../functions/userFunction.php');

if(isset($_POST['userName'], $_POST['userEmail'], $_POST['userpass'], $_POST['userPhone'], $_POST['userNic'])){

    $result = userRegistration(
        $_POST['userName'],
        $_POST['userEmail'], 
        $_POST['userpass'],
        $_POST['userPhone'],
        $_POST['userNic']
    );

    echo $result;
}
else{
    echo "Form not submitted properly";
}


?>