<?php
include("includes/header.php");
$the_message="";

if($session->is_signed_in()){
    header("Location: index.php");
}
if(isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $password =trim($_POST['password']);

    $user_found = User::verify_user($email,$password);
//    print_r($user_found);


    if($user_found){
        foreach ($user_found as $user_checking)
        {
            $id_recieved = $user_checking->id;
        }
        $session->login($id_recieved);
        header("Location: index.php");
    }
    else{
        $the_message = "Your password or email ID are incorrect";
    }


}else{
    $email = "";
    $password = "";
}

?>

<div  class="align-center" style="background-color: #5bc0de; width: 500px;height: 200px">

    <h4 class="bg-danger"><?php echo $the_message; ?></h4>

    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo htmlentities($email); ?>" >

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">

        </div>


        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


    </form>


</div>
<?php
include("includes/footer.php");
?>
