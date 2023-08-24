<?php 
  include('./db_con.php');

if(isset($_POST['submit']))
{
    $id = $_POST['id'];
  $email = htmlspecialchars($_POST['email']);
  $pass  =   htmlspecialchars(md5($_POST['pass']));

 
  if(empty($email))
  {
    $emailerror = "please Enter Your Email...";
  }
  elseif(empty($pass))
  {
    $passerror = "please Enter Your Password...";

  }
  elseif($_FILES['file']['error'] != 0)
  {
    $img = "Select Image...";
  }
  else
  {
    $image_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $end      = explode('.',$image_name);
    $ext  = strtolower(end($end));
    $allowed_ext = ["jpg","jpeg","png"];
    if(in_array($ext,$allowed_ext))
    {
      $new_name =  rand('10000','9999999999').'pragrammer'.microtime(). $image_name;
      $upload_folder = "./images/". $new_name;

      if(move_uploaded_file($tmp_name,$upload_folder))
      {
        $sql = "UPDATE `users_tbl` SET `email`='$email',`password`='$pass',`image`=' $upload_folder' WHERE $id = `id`";
        print_r($sql);
       if( mysqli_query($con,$sql))
       {
        header('location: table.php');
       }
      }
    }
    else
    {
      echo "invalid image";
    }
  }
}

?>



