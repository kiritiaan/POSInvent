<?php
$page = "category";
include 'site/protected.php';
require_once "./Model/Ctegory.php";

$cat = new Ctegory();
$ct = $cat->showCategory();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="styles/Cust.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.5.0/css/select.bootstrap5.min.css">

    <?php
    require_once "../FinalProject/styles/stylish.php";
    ?>
</head>

<body>



    <?php include 'site/hamburger.php'?>
    <?php include 'site/sidebar.php'?>

    <div class="red">

        <section class="con">
            <h2>CATEGORY</h2>
            <div>

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>CATEGORY_NAME</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ct as $value) : extract($value) ?>
                            <tr>

                                <td><?php echo $CATEGORY_ID ?></td>
                                <td><?php echo $CATEGORY_NAME ?></td>
                                <td class="butt">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="getId(<?php echo $CATEGORY_ID ?>)"><i class="fa-regular fa-pen-to-square"></i></a></i>

                                    <a href="" data-bs-toggle="modal" data-bs-target="#View">
                                        <i class="fa-sharp fa-solid fa-eye-slash" onclick="viewSingle(<?php echo $CATEGORY_ID ?>)"></i>
                                    </a>

                                    <a href=""><i class="fa-solid fa-trash" onclick="deleteOne(<?php echo $CATEGORY_ID ?>)"></i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="sideBtn">

                    <!-- Button trigger modal -->

                    <div id="addBtn">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fa-solid fa-plus"></i>ADD CATEGORY
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">NEW CATEGORY</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="" method="POST">

                                    <div class="modal-body">
                                        <div class="mb-3">

                                            <input type="text" class="form-control" placeholder="ENTER CATEGORY NAME" id="cname">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary save" onclick="saveBtn()">ADD</button>
                                    </div>



                                </form>


                            </div>
                        </div>
                    </div>


                </div>
        </section>



    </div>






    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="ViewUpdate">


            </div>
        </div>
    </div>





    <!-- View -->
    <div class="modal fade" id="View" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ABOUT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="expand">
                        <div class="card-body" id="ViewPage">

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <?php require_once "./styles/updateAccount.php" ?>
    <?php require_once "scripts/jquaryScript.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                select: true
            });
        });

        function saveBtn() {

            var $name = $('#cname').val();


            $.post('operation.php', {
                catn: $name,
                action: 'insertCategory'
            }, function(data, status) {
                location.reload();
                $('#name').val("");


            })

        }


        function deleteOne(id) {

            $.post('operation.php', {

                id: id,
                action: 'deleteCat'
            }, function(data, status) {

                location.reload();
                console.log(status);
            })
        }

        function getId(id) {


            var thing = $('#ViewUpdate');

            $.get('operation.php', {

                Cus_id: id,
                action: 'getSingleCat'
            }, function(data, status) {

                thing.html(data);
            })
        }



        function viewSingle(id) {


            var thing = $('#ViewPage');

            $.get('operation.php', {

                id: id,
                action: 'viewSingleCat'
            }, function(data, status) {

                thing.html(data);
            })
        }

        function updateME(id) {

            var $cname = $('#name').val();

            $.post('operation.php', {
                id: id,
                name: $cname,
                action: 'updatingCat'
            }, function(data, status) {

                alert($cname);


                location.reload();

            })
        }
    </script>




</body>

</html>