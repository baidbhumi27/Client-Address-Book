<?php
include("includes/header.php");
include("includes/function.php");


if(isset($_POST['submit'])){
    $first_name=$last_name=$password=$username="";
//-----------------------------------
    $checkbox1 = $_POST['lang'];
    $chk="";
    foreach($checkbox1 as $chk1)
    {
        $chk .= $chk1.",";
    }
//-------------------------------------

$file = upload_image($_FILES['file']);


 //-------------------------------------
$row = array( 'email' => $_POST['email'],
    'password' => $_POST['password'],
    'name1' => $_POST['name'],
    'img' => $file,
    'dob' => $_POST['dob'],
    'phone' => $_POST['phone'],
    'lang' => $chk,
    'gender' => $_POST['gender']


);
   $newuser = User::instantation($row);

   if( $newuser->create())
   {
       echo "<p class='alert alert-success'>User added successfully!</p>";

   }
   else{
       echo "<p class='alert alert-danger'>Error! Unsuccessful attempt </p>";
   }



}
?>


<!--class="border border-primary" border border-primary border-bottom-->
<div style="padding: 40px;margin-left: 200px">
<!--//class="text-center"-->
    <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>

    <form class="signin.css" id="sign-id" enctype="multipart/form-data" action="signin.php" method="post">
        <div class="form-group">

            <input type="text" class="form-control" name="name" placeholder="Name" required  >

        </div>

        <div class="form-group">

            <input type="email" class="form-control" name="email" placeholder="Email ID" required >

        </div>

        <div class="form-group">

            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <small id="passwordHelpInline" class="text-muted">
                Must be 8-20 characters long.
            </small>

        </div>
        <div class="form-group">

            <input type="date" class="form-control" name="dob" placeholder="Date of Birth" required>

        </div>
        <div class="form-group">

            <input type="tel"  name="phone" class="form-control" placeholder="Phone Number" required >

        </div>
        <div class="pull-left">
            <label class="form-check-label" for="lang[]">Language</label><br>
            <input class="pull-left" type="checkbox"  name="lang[]" value="english"  >English<br>
            <input class="pull-left" type="checkbox"  name="lang[]" value="hindi"  >Hindi<br>
            <input class="pull-left" type="checkbox"  name="lang[]" value="gujarati"  >Gujarati<br>
            <input class="pull-left" type="checkbox"  name="lang[]" value="others"  >Others<br>

        </div>
        <div class="form-group pull-right">
            <label class="form-check-label" for="gender">Gender</label><br>
            <input class="form-check-input pull-right" type="radio"  name="gender" value="Female" >Female<br>
            <input class="form-check-input pull-right" type="radio"  name="gender" value="Male" >Male

        </div>
        <br />
        <div class="form-group">

            <input class="btn btn-lg btn-block" type="file" name="file" placeholder="Profile Picture" required ><br>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block">

        </div>


    </form>


</div>
