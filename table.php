<?php
session_start();
if (!$_SESSION['email']) {
    header('location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Php Crud</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php include('./partials/sidebar.php')  ?>

        <div class="main">
            <?php include('./partials/navbar.php')  ?>


            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card flex-fill">
                                <div class="card-header">

                                    <h5 class="card-title mb-0">All Users</h5>
                                
                                </div>

                                <table class="table">
                                    <?php

                                    include('./db_con.php');
                                    $sql = "SELECT * FROM `users_tbl`";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0) {
                                    ?>
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($data =  mysqli_fetch_assoc($res)) {
                                                // print_r($data);
                                            ?>
                                                <tr>
                                                    <th><?php echo $data['id']  ?></th>
                                                    <th><?php echo $data['email']  ?></th>
                                                    <th><?php echo $data['password']  ?></th>
                                                    <th><img src="<?php echo $data['image'] ?>" alt="" height="100px" width="100px"></th>
                                                    <th><?php echo $data['time'] ?></th>
                                                    <th>
                                                        <button class="btn btn-info"><a href="./update.php?uid=<?php echo $data['id'] ?>">Edit</a></button>
                                                        <button class="btn btn-danger"><a href="./delete.php?delid=<?php echo $data['id'] ?>">Delete</a></button>
                                                    </th>
                                                </tr>
                                            <?php

                                            }
                                            ?>
                                        </tbody>
                                    <?php
                                    } else {
                                        echo "No record found";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </main>
            <?php
            include('./partials/footer.php')
            ?>

        </div>
    </div>

    <script src="js/app.js"></script>
    <?php
    include('./partials/script.php')
    ?>
</body>

</html>