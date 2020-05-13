<?php
require("includes/init.php");
include ("includes/header.php");
?>
<div bgcolor="#ffffff" class="container">
<h3 class="text-center">User's Data</h3>
    <div  class="table-responsive">
<table id="employee_data" class="table table-bordered">
    <thead>
    <tr>
        <th bgcolor="#ffffff">ID</th>
        <th bgcolor="#ffffff">Email</th>
        <th bgcolor="#ffffff">Password</th>
        <th bgcolor="#ffffff">Name</th>
        <th bgcolor="#ffffff">Date of Birth</th>
        <th bgcolor="#ffffff">Phone</th>
        <th bgcolor="#ffffff">Language</th>
        <th bgcolor="#ffffff">Gender</th>

    </tr>
    </thead>
<tbody>
    <?php
    $result_set = User::find_all_users();


    foreach ($result_set as $our_users)
    {
        echo '
                               <tr>
                                    <td>'.$our_users->id.'</td>
                                    <td>'.$our_users->email.'</td>
                                    <td>'.$our_users->password.'</td>
                                    <td>'.$our_users->name1.'</td>
                                    <td>'.$our_users->dob.'</td>
                                    <td>'.$our_users->phone.'</td>
                                    <td>'.$our_users->lang.'</td>
                                    <td>'.$our_users->gender.'</td><td><a href="edit.php?id='.$our_users->id.'" type="button" class="pull-right" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>';


        echo "</tr>";
    }

    ?>
</tbody>
</table>


</div>




<?php
include ("includes/footer.php");
?>
    <script>
        $(document).ready(function(){
            $('#employee_data').DataTable();
        });
    </script>