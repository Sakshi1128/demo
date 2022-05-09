<?php
 require_once 'include/db.php';
if(!empty($_GET['id'])){
    //require connection
    
    $dbcrud_id=$_GET['id'];
    $del_query = "DELETE FROM `dbcrud` WHERE id= '".$dbcrud_id."' ";
    
    
    $result = mysqli_query($conn, $del_query);
    if($result){
        header ('location:/connection/index.php?msg=del');
    }
}
?>