<?php
// mysql connection
require_once 'include/db.php';
$query = "SELECT * FROM `dbcrud`";

$result = mysqli_query($conn, $query);
$records =mysqli_num_rows($result);
$msg ="";
if(!empty ($_GET['msg'])){
  $msg=$_GET['msg'];
  $alert_msg=($msg=="add")?"New record has been added successfully!":"record has been update successfully!";
}else{
  $alert_msg="";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>
<body>
<?php include 'partial/nav.php';?>
<div class="container">
 

    <div class="info"></div>
    <table class="table">
  <thead>
    <tr>
     
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Course</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    
    <?php
    if(!empty($records)){
      while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
           <th scope="row"><?php echo $row['id']; ?></th>
                       <td><?php echo $row['first_name']; ?></td>
                       <td><?php echo $row['email']; ?></td>
                       <td><?php echo $row['gender']; ?></td>
                       <td><?php echo $row['course']; ?></td>
           
                <td> <a href="/connection/add.php?id=<?php echo $row['id'];?>"
                  class="btn btn-primary">EDIT</a>
                 <a href="/connection/delete.php?id=<?php echo $row['id'];?>"
                   class="btn btn-danger" onClick="javascript:return confirm ('do you really want to delete?');" >DELETE</a></td>

    </tr>
        
        <?php
      }
    }
 ?>
</tbody>
</table>
</div>
</body>
</html>
