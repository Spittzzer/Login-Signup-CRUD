<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.0/datatables.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <title>CAR</title>

</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#"> Hello <?php echo $_SESSION['name']; ?></a>

        <a href="../logout.php">Logout</a>

    </nav>


    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <h4 class="text-center text-secondary font-weight-normal my-3">CAR CRUD


                </h4>


            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <h4 class="mt-2 text-primary">All Cars In Database</h4>


            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal"
                    data-target="#addModal"> <i class="fas fa-car fa-lg"></i> ADD
                    CAR</button>

            </div>







        </div>
        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showCar">



                </div>


            </div>

        </div>




        <!-- Add new car model-->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Car</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body px-4">
                        <form action="#" method="POST" id="form-data">

                            <div class="form-group">

                                <input type="text" name="registration" class="form-control"
                                    placeholder=" registration Number XX-XXX-XX" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="color" class="form-control" placeholder=" Color" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="brand" class="form-control" placeholder=" Brand" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="model" class="form-control" placeholder=" Model" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="insert" id="insert" value="Add Car"
                                    class="btn btn-info btn-block">
                            </div>





                        </form>
                    </div>



                </div>
            </div>
        </div>
        <!-- edit  car modal-->

        <div class="modal fade" id="editModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Car</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body px-4">
                        <form action="" method="POST" id="edit-form-data">
                            <input type="hidden" name="id" id="id">

                            <div class="form-group">

                                <input type="text" name="registration" class="form-control" id="registration" required>
                            </div>
                            <div class="form-group"> <input type="text" name="color" class="form-control" id="color"
                                    required>
                            </div>
                            <div class="form-group"> <input type="text" name="brand" class="form-control" id="brand"
                                    required>
                            </div>
                            <div class="form-group"> <input type="text" name="model" class="form-control" id="model"
                                    required>
                            </div>
                            <div class="form-group"> <input type="submit" name="update" id="update" value="Update Car"
                                    class="btn btn-primary btn-block">
                            </div>





                        </form>
                    </div>



                </div>
            </div>
        </div>













        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.0/datatables.min.js">
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="scripts/app.js">

        </script>



</body>

</html>
<?php

}else{
    header("Location: index.php");
     exit();
}