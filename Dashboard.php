<?php 
    $page = "dashboard";
    session_start();

    if(!isset($_SESSION['userId'])){
        header('location:login.php');		
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="dash.css">
    <?php
    require_once "../FinalProject/styles/stylish.php";
    ?>
</head>

<body>
    <?php include 'site/hamburger.php'?>
    <?php include 'site/sidebar.php'?>

    <div class="content">
    <h1 class="title">DASHBOARD</h1>
        <section class="container center">
            <div>
                <h2>Sales Total: P29,285</h2>
            </div>
            <div>
                <h2>Total Transaction: 100,000.00</h2>
            </div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
            <div>
                <h1>NOTIFICATIONS</h1>
                <p>PaudeArcho stocks is almost depleted.</p>
                <p>MX3 stocks is almost depleted.</p>
            </div>
        </section>

    </div>

    <!-- Modal -->
    <div class=" modal fade" id="UpdateAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Account</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username">
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
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php require_once "scripts/jquaryScript.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['MILO', 'ENERGEN', 'MX3', 'OVALTINE', 'PAUDEARKO'],
                datasets: [{
                    label: 'BEST SELLERS',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(225,99,132, 0.6)',
                        'rgba(54,162, 235, 0.6)',
                        'rgba(225,206,86, 0.6)',
                        'rgba(75,192,192, 0.6)',
                        'rgba(153,102,255, 0.6)'
                    ],

                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>