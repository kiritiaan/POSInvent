<?php 
$page = "invoice";
include 'site/protected.php'?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="styles/Cust.css">
    <?php
    require_once "../FinalProject/styles/stylish.php";
    ?>
</head>

<body>
    <?php include 'site/hamburger.php'?>
    <?php include 'site/sidebar.php'?>

    <div class="red">

        <section class="con">
            <h2>INVOICE</h2>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control" placeholder="Search">
            </div>

            <table class="table table-secondary table-hover table-striped">

                <tr>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Item Quantity</th>
                    <th>Item Description</th>
                    <th></th>

                </tr>
                <tr>
                    <td>1</td>
                    <td>Peanut bulb</td>
                    <td>20</td>
                    <td>P30.00</td>
                    <td>SUGA ni sha!</td>
                    <td class="butt">
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-pen-to-square"></i></a></i>


                        <a href="" data-bs-toggle="modal" data-bs-target="#View">
                            <i class="fa-sharp fa-solid fa-eye-slash"></i>
                        </a>

                        <a href="" data-bs-toggle="modal" data-bs-target="#delete"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Francisco Chang</td>
                    <td>30</td>
                    <td>P50.00</td>
                    <td>SUGA ni sha!</td>
                    <td class="butt">
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-pen-to-square"></i></a></i>

                        <a href="" data-bs-toggle="modal" data-bs-target="#View">
                            <i class="fa-sharp fa-solid fa-eye-slash"></i>
                        </a>

                        <a href="" data-toggle="modal" data-target="#sure"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Francisco Chang</td>
                    <td>30</td>
                    <td>P50.00</td>
                    <td>SUGA ni sha!</td>
                    <td class="butt">
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-pen-to-square"></i></a></i>


                        <a href="" data-bs-toggle="modal" data-bs-target="#View">
                            <i class="fa-sharp fa-solid fa-eye-slash"></i>
                        </a>

                        <a href="" data-toggle="modal" data-target="#sure"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Francisco Chang</td>
                    <td>30</td>
                    <td>P50.00</td>
                    <td>SUGA ni sha!</td>
                    <td class="butt">
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-pen-to-square"></i></a></i>


                        <a href="" data-bs-toggle="modal" data-bs-target="#View">
                            <i class="fa-sharp fa-solid fa-eye-slash"></i>
                        </a>

                        <a href="" data-toggle="modal" data-target="#sure"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Francisco Chang</td>
                    <td>30</td>
                    <td>P50.00</td>
                    <td>SUGA ni sha!</td>
                    <td class="butt">
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-pen-to-square"></i></a></i>


                        <a href="" data-bs-toggle="modal" data-bs-target="#View">
                            <i class="fa-sharp fa-solid fa-eye-slash"></i>
                        </a>

                        <a href="" data-toggle="modal" data-target="#sure"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </table>
            <nav aria-label="..." class="pagi">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </section>



    </div>




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">UPDATE PRODUCT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lastname">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone number">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Warning !!!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3> Are you sure you want to delete?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="View" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="expand">
                        <div class=" expnd">
                            <img src="img/sample.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Peanut Bulb</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <? require_once "./styles/updateAccount.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>