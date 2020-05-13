<?php

include("includes/init.php");
include("includes/header.php");
include("includes/function.php");

$the_message="";
if(isset($_POST['update'])){
    $checkbox1 = $_POST['lang'];
    $chk="";
    foreach($checkbox1 as $chk1)
    {
        $chk .= $chk1.",";
    }


    $row = array( 'id'=> $_POST['id'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'name1' => $_POST['name'],

        'dob' => $_POST['dob'],
        'phone' => $_POST['phone'],
        'lang' => $chk,
        'gender' => $_POST['gender']

    );
    
    $new_update = User::instantation($row);
    if( $new_update->update())
    {
        $the_message = "<h4 class='alert alert-success'>Updated Sucessful</h4>";
    }
    else{
        $the_message = "<h4 class='alert alert-danger'>Update Failed</h4>";
    }


}
else if(!isset($_POST['update']) && !isset($_POST['delete'])){
    
     $_SESSION['client'] = $_GET['id'];
$clientID = $_SESSION['client'];
    
}

if(isset($_POST['delete'])){
    
$res = User::delete($_SESSION['client']);
    
    if($res)
    {
       header("Location:data.php");
    }
    else{
        $the_message = "<h4 class='alert alert-danger'>Cannot Delete</h4>";
    }
    

}

$firstname=$lastname=$username=$pass="";

$current_user = User::get_user_by_id($_SESSION['client']);
array_shift($current_user);
foreach($current_user as $current_data)
{

   $name = $current_data->name1;
    $email = $current_data->email;
    $pass = $current_data->password;
    $image = $current_data->img;
    $dob = $current_data->dob;
    $phone = $current_data->phone;
    $lang = $current_data->lang;
    $gender = $current_data->gender;
}


?>




<div><img src="images/<?php echo $image; ?>" width="200" height="200" alt="Profile Photo" border="2px solid black" ></div>
<div  class="col-md-10 col-md-offset-1" >

<h2>Edit User Data</h2><br>
      <?php  echo $the_message;
    ?>

    <form  id="sign-id" action="edit.php" method="post" class="row">
        <div class="form-group col-sm-6">
            <label for="name">Name</label>
            <input type="text" class="form-control input-lg" name="name" value="<?php echo $name; ?>" required >

        </div>

        <div class="form-group col-sm-6">
            <label for="email">Email</label>
            <input type="email" class="form-control input-lg" name="email" value="<?php echo $email; ?>" required>

        </div>

        <div class="form-group col-sm-6">
            <label for="password">Password</label>
            <input type="password" class="form-control input-lg" name="password" value="<?php echo $pass; ?>" required>

        </div>
        <div class="form-group col-sm-6">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" required>

        </div>
        <div class="form-group col-sm-6">
            <label for="phone">Phone</label><br>
            <input type="tel"  name="phone" class="form-control" value="<?php echo $phone; ?>" required >

        </div>
        <div class="form-group col-sm-6">
            <label for="lang[]">Language</label><br>
            <input type="checkbox"  name="lang[]" value="english"  >English<br>
            <input type="checkbox"  name="lang[]" value="hindi"  >Hindi<br>
            <input type="checkbox"  name="lang[]" value="gujarati"  >Gujarati<br>
            <input type="checkbox"  name="lang[]" value="others"  >Others<br>

        </div>
        <div class="form-group col-sm-6">
            <label for="gender">Gender</label><br>
            <input type="radio"  name="gender" value="Female" >Female<br>
            <input type="radio"  name="gender" value="Male" >Male

        </div>

        

    <div class="pull-right">
            <input type="submit" name="update" value="Update" class="btn btn-lg btn-success">
            
            <a type="button" name="cancel" href="data.php" class="btn btn-lg btn-primary">Cancel</a>
    </div>
        <div class="pull-left">
    <input  type="submit" name="delete" value="Delete" class="btn btn-lg btn-danger">
        </div>
        
        <div class="form-group col-sm-6" style="visibility:hidden">
            <label for="id">Identity Number</label>
            <input type="number" class="form-control input-lg" name="id" value="<?php echo $clientID; ?>" required>

        </div>


        


    </form>


</div>



<?php

include("includes/footer.php");
?>
