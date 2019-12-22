<?php 
    if (isset($_POST['forgotPass'])) {
        $conn = new mysqli("localhost", "root", "", "passwordhash");

        $email = $conn->real_escape_string($_POST['email']);

        $data = $conn->query("SELECET id FROM")

    }
?>
<html>
    <body>       
    <form action="forgotpass.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="submit" name="forgotPass" value="Request Password">
    </form>
    </body>
</html>