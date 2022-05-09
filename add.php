<?php
if(isset($_POST['submit'])&& $_POST['submit']!=''){
    // required the db connection
    require_once 'include/db.php';

    $first_name=(!empty($_POST['first_name'])) ? $_POST['first_name']:'';
    $email=(!empty($_POST['email'])) ? $_POST['email']:'';
    $gender=(!empty($_POST['gender'])) ? $_POST['gender']:'';
    $course=(!empty($_POST['course'])) ? $_POST['course']:'';
    $id=(!empty($_POST['db_id'])) ? $_POST['db_id']:'';

    if(!empty($id)){
        //update the record
            $db_query ="UPDATE `dbcrud` SET first_name='".$first_name."',
             email ='".$email."', gender ='".$gender."',course ='".$course."'
              WHERE id = '".$id."'" ;

    }
     else{
        //insert the new record

    $db_query="INSERT INTO `dbcrud` (first_name,email,gender,course) VALUES
    ('".$first_name."' ,'".$email."' ,'".$gender."','".$course."')";
    $msg ="add";
    }

    $result = mysqli_query($conn, $db_query);

    if($result){
        header('location:/connection/index.php?msg='.$msg);
    }
  }

  if(isset($_GET['id']) && $_GET['id']!=''){
       // required the db connection
    require_once 'include/db.php';
    $db_id =$_GET['id'];
    $db_query ="SELECT * FROM `dbcrud` WHERE id='".$db_id."'";
    $db_res = mysqli_query($conn, $db_query);
    $result = mysqli_fetch_row($db_res);
    $first_name = $result[1];
    $email = $result[2];
    $gender = $result[3];
    $course = $result[4];
}else{
    $first_name = "";
    $email = "";
    $gender = "";
    $course = "";
}



?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>
<body>
<?php include 'partial/nav.php';?>
<div class="container">
<div class="formdiv">
    <div class="info"></div>
    <form method="POST" action ="">
        <div class="form-group row">
            <lable for="first_name"class="col-sm-3 col-form-lable">First Name</lable>
            <div class="col-sm-7">
                <input type="text"name="first_name"class="form-content"id="first_name"
                placeholder="First Name" value="<?php echo  $first_name ;?>">
</div>
 </div> 
 <div class="form-group row">  
            <lable for="last_name"class="col-sm-3 col-form-lable">Last Name</lable>
             <div class="col-sm-7"> 
                <input type="text"name="last_name"class="form-content"id="last_name"
                placeholder="Last Name">
</div>
</div>
<div class="form-group row">
            <lable for="email"class="col-sm-3 col-form-lable">Email</lable>
            <div class="col-sm-7">
                <input type="emali" value="<?php echo  $email ;?>" name="email"class="form-content"id="email"
                placeholder="Email" >
</div>
</div>

<div class="form-group row">
            <lable for="gender"class="col-sm-3 col-form-lable">Gender</lable>
            <div class="col-sm-7">
                <select class="form-control"name="gender"id="gender">
                    <option value="">Select Gender</option>
                    <option value="Male" <?php if ($gender == 'Male') {echo "selected";}?>>Male</option>
                    <option value="Female"<?php if ($gender == 'female') {echo "selected";}?>>Female</option>
</select>
</div>
</div>
<div class="form-group row">
            <lable for="course"class="col-sm-3 col-form-lable">course</lable>
            <div class="col-sm-7">
                <select class="form-control"name="course"id="course">
                    <option value="">Select course</option>
                    <option value="BCA"<?php if ($course == 'BCA') {echo "selected";}?>>BCA</option>
                    <option value="MCA"<?php if ($course == 'MCA') {echo "selected";}?>>MCA</option>
</select>
</div>
</div>
<div class="form-group row">
<div class="col-sm-7">
    <input type="hidden" name="db_id" value="<?php echo $db_id;?>">
    <input type="submit" name="submit" class="btn btn-secondary" value="SUBMIT"/>
</div>
</div>
</form>
</div>
</div>
</body>
</html>
