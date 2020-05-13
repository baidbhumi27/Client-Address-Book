<?php include("includes/header.php");
if(!$session->is_signed_in() ){
    header("Location:login.php");
}

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <?php include("includes/top-nav.php"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side-nav.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>

  <?php include("includes/page-wrapper.php"); ?>     
  <?php include("includes/footer.php"); ?>