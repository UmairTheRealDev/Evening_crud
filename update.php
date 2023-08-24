
<!doctype html>
<html lang="en">
  <?php include('./partials/head.php')  ?>
  <body>

   <div class="row col-6 m-auto border border-secondary p-3">
        <form id="frm" action="edit.php" method="post" enctype="multipart/form-data">
            <legend>Registration Form</legend>

            <?php 
            if(isset($_GET['uid']))
            {
                $id = $_GET['uid'];
            }
             
              include('./db_con.php');
              $sql = "SELECT * FROM `users_tbl` where `id` = $id";
              $res = mysqli_query($con, $sql);
              $result = mysqli_fetch_assoc($res);
              
            print_r($result['email'])
            ?>
            <div class="mb-3">
               
            <input type="hidden" name="id" value="<?php echo $result['id']  ?>">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="text" class="form-control" name="email"  aria-describedby="emailHelp" value="<?php echo $result['email']  ?>">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="pass" value="<?php echo $result['password']  ?>">
            </div>
            <div class="mb-3">
              
              <label for="exampleInputPassword1" class="form-label">Select Image</label>
              <input type="file"  class="form-control" name="file" value="<?php echo $result['image']  ?>">
            </div>
          

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>