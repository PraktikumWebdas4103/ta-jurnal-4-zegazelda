<?php
session_start();
error_reporting(0);
        $user = array(
                        "user" => "Zegazelda",
                        "pass"=>"6701170093"            
                );
if (isset($_POST['submit'])) {
    if ($_POST['username'] == $user['user'] && $_POST['password'] == $user['pass']){
    
        $_SESSION["username"] = $_POST['username']; 
        echo header("Location: proses.php");

    
    } else {
        display_login_form();
        echo '<p>Username Atau Password Salah</p>';
    }
}    
else {
    display_login_form();
}
function display_login_form(){ ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
    <label for="username">Username</label>
    <br>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password</label>
    <br>
    <input type="password" name="password" id="password">
    <br>
    <br>
    <input type="submit" name="submit" value="submit">
    </form>    
<?php } ?>