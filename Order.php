<?php

$page = "order";
include 'site/protected.php';

require_once "./Model/Ordr.php";

$staff = new Ordr();
$st = $staff->getStaff();
$supp = $staff->getSupplier();
$records = $staff->showProduct();

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <?php
    require_once "../FinalProject/styles/stylish.php";
    ?>
</head>

<body>

    <?php include 'site/hamburger.php'?>
    <?php include 'site/sidebar.php'?>

    <div class="red">

        <section class="con" style="width:85%;">
            <h2>PURCHASE ORDER</h2>

            <table id="example" class="order-column" style="width:100%">
                <thead>
                    <tr>
                        <th>PORD_ID</th>
                        <th>Product Name</th>
                        <th>Total Quantity</th>
                        <th>Product Price</th>
                        <th>Total Price</th>
                        <th>SUPPLIER</th>
                        <th>PURCHASER</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="fill" class="sh">
                    <?php foreach ($records as $value) : extract($value) ?>
                        <tr>
                            <td><?php echo $PORD_ID ?></td>
                            <td><?php echo $ITEM_NAME ?></td>
                            <td><?php echo $PORD_QUANTITY ?></td>
                            <td><?php echo $ITEM_PRICE ?></td>
                            <td><?php echo $TOTAL_PRICE ?></td>
                            <td><?php echo $SUPPLIER_COMPANY ?></td>
                            <td><?php echo $STAFF_FNAME ?></td>
                            <td class="text text-warning fw-bold"><?php echo $PORD_STATUS ?></td>
                            <td class="text text-warning fw-bold">
                                <form action="print_order.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $PORD_ID ?>">
                                    <button type="submit" class="btn btn-success">GENERATE RECIEPT</button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>



            <div class="sideBtn">

                <div class="btn-group mt-4" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            SELECT OPTION
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ActivePurchase"><i class="fa-solid fa-thumbs-up"></i>ACTIVE PURCHASE ORDER</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fa-solid fa-cart-plus"></i>ADD PURCHASE ORDER</a></li>

                    </div>
                </div>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD PURCHASE ORDER</h1>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">

                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Purchaser</label>
                                        <select class="form-select" id="staff">
                                            <option selected disabled="">Choose...</option>
                                            <?php foreach ($st as $val) : extract($val) ?>
                                                <option value="<?php echo $STAFF_ID ?>"><?php echo $STAFF_FNAME ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">


                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">SUPPLIER</label>
                                        <select class="form-select" id="supplr">
                                            <option selected disabled="">Choose...</option>
                                            <?php foreach ($supp as $val) : extract($val) ?>
                                                <option value="<?php echo $SUPPLIER_ID ?>"><?php echo $SUPPLIER_COMPANY ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>


                                <div class="mb-3">

                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Product Purchase</label>
                                        <select class="form-select" id="placehere" disabled="disabled">

                                        </select>
                                    </div>
                                </div>




                                <div id="placeme"></div>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" name="save" onclick="saveBtn()">Save</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>


                        </div>
                    </div>
                </div>



                <div class="modal fade" id="ActivePurchase" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">ACTIVE ORDER</h1>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">

                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Purchaser</label>
                                        <select class="form-select" id="staff2">
                                            <option selected disabled="">Choose...</option>
                                            <?php foreach ($st as $val) : extract($val) ?>
                                                <option value="<?php echo $STAFF_ID ?>"><?php echo $STAFF_FNAME ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">


                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">SUPPLIER</label>
                                        <select class="form-select" id="supplr2">
                                            <option selected disabled="">Choose...</option>
                                            <?php foreach ($supp as $val) : extract($val) ?>
                                                <option value="<?php echo $SUPPLIER_ID ?>"><?php echo $SUPPLIER_COMPANY ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>


                                <div class="mb-3">

                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Product Purchase</label>
                                        <select class="form-select" id="placehere2" disabled="disabled">

                                        </select>
                                    </div>
                                </div>




                                <div id="placeme2"></div>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" name="save" onclick="saveBtn2()">Save</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>


                        </div>
                    </div>
                </div>


            </div>
        </section>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="ViewUpdate">


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

            var $staff = $('#staff').val();
            var $supp = $('#supplr').val();
            var $code = $('#prod_id').val();
            var $quan = $('#quan').val();

            $.post('orderOperation.php', {
                staff: $staff,
                code: $code,
                quan: $quan,
                supp: $supp,
                action: 'insertOrder'
            }, function(data, status) {

                location.reload();

            })

        }


        $('#supplr').change(function() {
            var $op = $('#supplr option:selected').val();
            var $fill = $('#placehere');

            $.post('orderOperation.php', {
                catId: $op,
                action: 'getProdss'
            }, function(data, status) {
                $fill.html(data);
                document.getElementById('placehere').removeAttribute('disabled');
            })


        })


        $('#placehere').change(function() {
            var $op = $('#placehere option:selected').val();
            var $fill = $('#placeme');

            $.post('orderOperation.php', {
                catId: $op,
                action: 'placeProd'
            }, function(data, status) {
                $fill.html(data);



            })


        })






        function saveBtn2() {

            var $staff = $('#staff2').val();
            var $code = $('#prod_id2').val();
            var $quan = $('#quan2').val();
            var $supp = $('#supplr2').val();



            console.log($supp, $code);

            $.post('orderOperation.php', {
                staff: $staff,
                code: $code,
                quan: $quan,
                supp: $supp,
                action: 'insertOrder2'
            }, function(data, status) {

                location.reload();

            })

        }


        $('#supplr2').change(function() {
            var $op = $('#supplr2 option:selected').val();
            var $fill = $('#placehere2');

            $.post('orderOperation.php', {
                catId: $op,
                action: 'getProdss2'
            }, function(data, status) {
                $fill.html(data);
                document.getElementById('placehere2').removeAttribute('disabled');
            })


        })


        $('#placehere2').change(function() {
            var $op = $('#placehere2 option:selected').val();
            var $fill = $('#placeme2');

            $.post('orderOperation.php', {
                catId: $op,
                action: 'placeProd2'
            }, function(data, status) {
                $fill.html(data);



            })


        })




        function mykey(value) {

            var $onhand = $('#onhand').val();
            var $price = $('#price').val();
            var sum, prod;

            if (value != 0) {
                sum = parseInt($onhand) + parseInt(value);
                prod = parseInt($price) * parseInt(sum);
            }



            $('#total_quan').val(sum);
            $('#total_quan2').val(prod);




        }




        $('#pashere').change(function() {
            var $op = $('#pashere option:selected').val();
            var $fill = $('#pashere2');
            $.post('orderOperation.php', {
                code: $op,
                action: 'fillOut'
            }, function(data, status) {
                $fill.html(data);

            })

        })

        function getId(id) {


            var thing = $('#ViewUpdate');

            $.post('ProdOperation.php', {

                ProdId: id,
                action: 'getSingleProd'
            }, function(data, status) {

                thing.html(data);
            })
        }



        function returns() {
            location.reload();
        }
    </script>


</body>


</html>