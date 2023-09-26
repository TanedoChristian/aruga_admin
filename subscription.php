<?php
include("connect.php");
include("setup.php");
error_reporting();
session_start();

$message = null;

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Subscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="img/logo.png" />

    <!-- ========== MATERIALIZE CSS ========== -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- ========== BOOTSTRAP ========== -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ========== CSS ========== -->
    <link rel="stylesheet" href="css/index.css">

    <!-- chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body>
    <!-- ========== SIDEBAR ========== -->
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="sidebar">

            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" name="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>

            <div class="p-4 pt-5">
                <img src="img/logo.png" class="img logo rounded-circle mb-5">
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">Customers</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="babysitter.php">Babysitter</a>
                            </li>
                            <li>
                                <a href="parent.php">Parent</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Post</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu2">
                            <li>
                                <a href="job.php">Job</a>
                            </li>
                            <li>
                                <a href="blog.php">Blog</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="subscription.php">Subscription</a>
                    </li>
                    <li>
                        <a href="application.php">Job Application</a>
                    </li>
                    <li>
                        <a href="review.php">Review</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- ========== CONTENT ========== -->
        <div id="content" class="p-3 ">
            <!-- TOTAL BABYSITTER -->
            <nav class="navbar navbar-light bg-light" id="navbar">
                <div class="navContent">
                    <div class="totalBabysitter bg-dark m-2 p-2">
                        <div class="containertotaljob">
                            <h6><span class="text-white">Total</span> <span class='babyChartColor'>Subscription</span></h6>
                            <hr class="bg-light ">

                            <?php
                            $query = mysqli_query($connect, "select count(*) as total_sub from subscription");
                            $rows = mysqli_fetch_assoc($query);
                            $total_sub = $rows['total_sub'];
                            echo "<h2 class='fw-bold text-white text-center'>" . $total_sub . "</h2>";
                            ?>
                        </div>
                        <div class="containertotaljob2 p-1 text-center">

                            <h6 class="text-warning">Sales Per Month 2023</h6>
                            <canvas id="jobChart"></canvas>

                            <?php
                            
                            $sql = "SELECT 
                                        MONTH(date_start) as month, 
                                        SUM(amount) AS total_amount 
                                        FROM subscription 
                                        GROUP BY month;
                                    ";
                            $query = mysqli_query($connect, $sql);

                            if(mysqli_num_rows($query) > 0){
                                while($date_sub_row = mysqli_fetch_assoc($query)){
                                    // convert data number as date word
                                    $monthNum1 = $date_sub_row['month'];
                                    $monthName1 = date("F", mktime(0, 0, 0, $monthNum1, 10));
                                    $monthstack[] = $monthName1;
                                    $earnings[] = $date_sub_row['total_amount'];
                                }
                            }                  

                            ?>

                            <script>
                                const xValues = <?php echo json_encode($monthstack); ?>;
                                const yValues = <?php echo json_encode($earnings); ?>;

                                // const xValues = ["JAN","JAN","JAN","JAN","JAN","JAN","JAN","JAN","JAN","JAN","JAN",];
                                // const yValues = [1,5,8,3,9,4,9,4,8,3,76,12];

                                new Chart("jobChart", {
                                    type: "line",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            fill: false,
                                            lineTension: 0,
                                            backgroundColor: "rgb(255, 193, 7)",
                                            borderColor: "rgb(255, 193, 7,0.1)",
                                            data: yValues
                                        }]
                                    },
                                    options: {
                                        legend: {
                                            display: false
                                        },
                                        scales: {
                                            yAxes: [{
                                                beginAtZero: true,
                                                ticks: {
                                                    fontColor: "white", // Set font color for y-axis labels to white
                                                    min: 0,
                                                    // max: 16,
                                                    stepSize: 1000
                                                }
                                            }],
                                            xAxes: [{
                                                ticks: {
                                                    fontColor: "white" // Set font color for x-axis labels to white
                                                }
                                            }]
                                        },
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!-- ACTIVE BABYSITTER -->
                    <div class="totalBabysitter bg-dark text-white m-2 p-2">
                        <div class="containertotalBabysitter">
                            <section>
                                <h6>Subscription <span class='babyChartColor'>Status</span></h6>
                                <hr class="bg-light">
                            </section>
                            <section>
                                <?php
                                $query = mysqli_query($connect, "select status, count(status) as status_count  from subscription group by status desc");

                                echo "<table class='htable'>";

                                $sub_status = array();
                                $sub_count = array();
                                $sub_total = 0;

                                while ($rows = mysqli_fetch_assoc($query)) {
                                    $sub_status[] = $rows['status'];
                                    $sub_count[] = $rows['status_count'];
                                    $sub_total += $rows['status_count'];
                                    echo "  <tr>";
                                    echo "    <td>" . $rows['status'] . "</td>";
                                    echo "    <td class='pl-5'>" . $rows['status_count'] . "</td>";
                                    echo "  </tr>";
                                }
                                echo "</table>";

                                foreach ($sub_count as $data) {
                                    $sub_percentage[] = round((($data / $sub_total) * 100), 2);
                                }
                                ?>
                            </section>
                        </div>
                        <div class="containertotalBabysitter2 p-1">
                            <h6 class="text-warning text-center">Percentage</h6>
                            <canvas id="activebabysitter"></canvas>

                            <script>
                                new Chart("activebabysitter", {
                                    type: 'pie',
                                    data: {
                                        labels: <?php echo json_encode($sub_status); ?>,
                                        datasets: [{
                                            // label: "Population (millions)",
                                            backgroundColor: ["#3e95cd", "#b91d47", "#3cba9f", "#e8c3b9", "#c45850"],
                                            data: <?php echo json_encode($sub_percentage); ?>
                                        }]
                                    },
                                    options: {
                                        title: {
                                            display: false,
                                        },
                                        legend: {
                                            display: false,
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </nav>

            <section class="section bg-light">
                <!-- ============= MAIN BABYSITTER CONTENT ============= -->
                <div class="searchContainer ">
                    <div class="searchContent1 d-flex align-items-center">
                        <a href="export.php?page=subscription" class="reportMessage">
                            <button type="button" class="btn btn-success" id="viewReport" style="font-size: 14px;">View Report</button>
                        </a>
                    </div>
                    <div class="searchContent2 search shadow-sm" id="searchJob">
                        <form method="post" id="searchform" class="w-100">
                            <input type="text" class="search-input" name="keyword" placeholder="Search..." name="search" required>
                            <a href="subscription.php">
                                <button type="button" class="search-icon" name="submitSearch" id="submitSearch">
                                    <i class="fa fa-refresh"></i>
                                </button>
                            </a>
                            <button type="submit" class="search-icon mr-2" name="submitSearch" id="submitSearch">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="babysitterContent mt-2" id="babysitterContent">

                    <div class="fullTable ">
                        <form method='post' class="table-responsive">
                            <table class='table table-striped table-sm text-nowrap'>
                                <thead class='table-dark'>
                                    <tr>
                                        <th>Parent Subscriber</th>
                                        <th>Amount</th>
                                        <th>Date Start</th>
                                        <th>Date Ended</th>
                                        <th>Status</th>
                                        <th colspan='2'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                                        $page_no = $_GET['page_no'];
                                    } else {
                                        $page_no = 1;
                                    }

                                    $total_records_per_page = 10;
                                    $offset = ($page_no - 1) * $total_records_per_page;
                                    $previous_page = $page_no - 1;
                                    $next_page = $page_no + 1;
                                    $adjacents = "2";

                                    if (isset($_POST['submitSearch'])) {

                                        $keyword = strval($_POST['keyword']);

                                        $result_sql = " SELECT
                                                            count(*) as total_records, 
                                                            subscription_id,
                                                            subscription.user_id,
                                                            amount,
                                                            date_start,
                                                            date_ended,
                                                            subscription.status,
                                                            subscription_payment,
                                                            users.firstname,
                                                            users.lastname
                                                        FROM 
                                                            subscription 
                                                        INNER JOIN 
                                                            users 
                                                        ON 
                                                            users.user_id = subscription.user_id
                                                        WHERE
                                                            firstname LIKE '%".$keyword."%'
                                                            OR lastname LIKE '%".$keyword."%'
                                                            OR amount LIKE '%".$keyword."%'
                                                            OR date_start LIKE '%".$keyword."%'
                                                            OR date_ended LIKE '%".$keyword."%'
                                                            OR subscription.status LIKE '%".$keyword."%'
                                                                ";

                                        $result_count = mysqli_query($connect, $result_sql);
                                        $total_records = mysqli_fetch_array($result_count);
                                        $total_records = $total_records['total_records'];
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $second_last = $total_no_of_pages - 1; // total page minus 1

                                        if ($keyword == '' || empty($keyword)) {
                                            $message = "No data found!";
                                        } else {
                                            $sql_result = " SELECT 
                                                                subscription_id,
                                                                subscription.user_id,
                                                                amount,
                                                                date_start,
                                                                date_ended,
                                                                subscription.status,
                                                                subscription_payment,
                                                                users.firstname,
                                                                users.lastname
                                                            FROM 
                                                                subscription 
                                                            INNER JOIN 
                                                                users 
                                                            ON 
                                                                users.user_id = subscription.user_id
                                                            WHERE(
                                                                firstname LIKE '%".$keyword."%'
                                                                OR lastname LIKE '%".$keyword."%'
                                                                OR amount LIKE '%".$keyword."%'
                                                                OR date_start LIKE '%".$keyword."%'
                                                                OR date_ended LIKE '%".$keyword."%'
                                                                OR subscription.status LIKE '%".$keyword."%')
                                                            LIMIT $offset, $total_records_per_page
                                                            ";
                                        }
                                    } else {
                                        $result_count = mysqli_query($connect, "select count(*) as total_records from subscription");
                                        $total_records = mysqli_fetch_array($result_count);
                                        $total_records = $total_records['total_records'];
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $second_last = $total_no_of_pages - 1; // total page minus 1

                                        $sql_result = " SELECT 
                                                            subscription_id,
                                                            subscription.user_id,
                                                            amount,
                                                            date_start,
                                                            date_ended,
                                                            subscription.status,
                                                            subscription_payment,
                                                            users.firstname,
                                                            users.lastname
                                                        FROM 
                                                            subscription 
                                                        INNER JOIN 
                                                            users 
                                                        ON 
                                                            users.user_id = subscription.user_id
                                                         LIMIT $offset, $total_records_per_page";
                                    }

                                    $result = mysqli_query($connect, $sql_result);

                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>
                                                    <td>" . $row['firstname'] ." ". $row['lastname']. "</td>
                                                    <td>&#8369;" . $row['amount'] . "</td>
                                                    <td>" . $row['date_start'] . "</td>
                                                    <td>" . $row['date_ended'] . "</td>
                                                    <input type='text' name='subscription_id' value='" . $row['subscription_id'] . "' hidden></td>";

                                            if (strtolower($row['status']) == "active") {
                                                echo "<td class='data_status text-success'>" . ucfirst($row['status']) . "</td>";
                                            } else if (strtolower($row['status']) == "expired") {
                                                echo "<td class='data_status text-danger'>" . ucfirst($row['status']) . "</td>";
                                            } else {
                                                echo "<td class='data_status text-danger'>" . ucfirst($row['status']) . "</td>";
                                            }

                                            echo "<td>" ?>
                                            <!-- modal button -->
                                            <button type='button' class='action-head btn btn-sm bg-primary text-white' data-toggle='modal' data-target='#myModal<?php echo $row['user_id'] ?>'>View</button>

                                            <?php
                                            echo "</td>";
                                            echo "<td>";
                                            if (strtolower($row['status']) == "active") {
                                                echo "<a class='confirmation action-head btn btn-sm btn-danger text-white'href='update.php?user_id=" . $row['subscription_id'] . "&status=" . $row['status'] . "&page=subscription'>Hold</a>";
                                            } else if (strtolower($row['status']) == "pending") {
                                                echo "<a class='action-head btn btn-sm btn-secondary text-white'>Pending</a>";
                                            } else {
                                                echo "<a class='confirmation action-head btn btn-sm btn-success text-white'href='update.php?user_id=" . $row['subscription_id'] . "&status=" . $row['status'] . "&page=subscription'>Activate</a>";
                                            }

                                            echo "</td>
                          </tr>"; ?>
                                            <div class="modal" id="myModal<?php echo $row['user_id'] ?>">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h1 class="modal-title">Proof of Payment</h1>
                                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                                        </div>

                                                        <!-- Modal body -->

                                                        <div class="modal-body" id="modalBody">
                                                            <form method="post" class="form-view ">
                                                                <div class="fv-main">
                                                                    <div class="w-100 mb-3 d-flex justify-content-center">
                                                                        <?php
                                                                        $basePath = getBaseUrl() . $row['subscription_payment'];
                                                                        echo "<img id='profile_img' src='$basePath' class='w-100'>";
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-end w-100 ">
                                                                    <?php
                                                                    if ((strtolower($row['status']) == 'pending')) {
                                                                        echo "
                                        <a class='confirmation action-head btn btn-sm btn-success text-white' href='update.php?user_id=" . $row['subscription_id'] . "&status=" . $row['status'] . "&page=subscription'>Activate</a>
                                    ";
                                                                    } else {
                                                                        // dsiplay nothing
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }

                                        mysqli_free_result($result);
                                    } else {
                                        $message = "No data Found!";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </form>
                    </div>

                    <div class="pageCount">
                        <!-- PAGE NUMBER -->
                        <div class="page_of">
                            <strong>Page
                                <?php echo $page_no . " of " . $total_no_of_pages; ?>
                            </strong>
                        </div>
                        <!-- TOGGLE PAGE -->
                        <div class="page_toggle">
                            <ul class="pagination">
                                <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } 
                                ?>

                                <li <?php if ($page_no <= 1) {
                                        echo "class='disabled'";
                                    } ?>>
                                    <a <?php if ($page_no > 1) {
                                            echo "href='?page_no=$previous_page'";
                                        } ?> class="border">Previous</a>
                                </li>

                                <?php
                                if ($total_no_of_pages <= 10) {
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='active'><a class='border'>$counter</a></li>";
                                        } else {
                                            echo "<li><a href='?page_no=$counter' class='border'>$counter</a></li>";
                                        }
                                    }
                                } elseif ($total_no_of_pages > 10) {

                                    if ($page_no <= 4) {
                                        for ($counter = 1; $counter < 8; $counter++) {
                                            if ($counter == $page_no) {
                                                echo "<li class='active'><a class='border'>$counter</a></li>";
                                            } else {
                                                echo "<li><a href='?page_no=$counter' class='border'>$counter</a></li>";
                                            }
                                        }
                                        echo "<li><a>...</a></li>";
                                        echo "<li><a href='?page_no=$second_last' class='border'>$second_last</a></li>";
                                        echo "<li><a href='?page_no=$total_no_of_pages' class='border'>$total_no_of_pages</a></li>";
                                    } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                                        echo "<li><a href='?page_no=1' class='border'>1</a></li>";
                                        echo "<li><a href='?page_no=2' class='border'>2</a></li>";
                                        echo "<li><a>...</a></li>";
                                        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                            if ($counter == $page_no) {
                                                echo "<li class='active'><a class='border'>$counter</a></li>";
                                            } else {
                                                echo "<li><a href='?page_no=$counter' class='border'>$counter</a></li>";
                                            }
                                        }
                                        echo "<li><a>...</a></li>";
                                        echo "<li><a href='?page_no=$second_last' class='border'>$second_last</a></li>";
                                        echo "<li><a href='?page_no=$total_no_of_pages' class='border'>$total_no_of_pages</a></li>";
                                    } else {
                                        echo "<li><a href='?page_no=1' class='border'>1</a></li>";
                                        echo "<li><a href='?page_no=2' class='border'>2</a></li>";
                                        echo "<li><a>...</a></li>";

                                        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                            if ($counter == $page_no) {
                                                echo "<li class='active'><a class='border'>$counter</a></li>";
                                            } else {
                                                echo "<li><a href='?page_no=$counter' class='border'>$counter</a></li>";
                                            }
                                        }
                                    }
                                }
                                ?>

                                <li <?php if ($page_no >= $total_no_of_pages) {
                                        echo "class='disabled'";
                                    } ?>>
                                    <a <?php if ($page_no < $total_no_of_pages) {
                                            echo "href='?page_no=$next_page'";
                                        } ?> class='border'>Next</a>
                                </li>
                                <?php if ($page_no < $total_no_of_pages) {
                                    echo "<li><a href='?page_no=$total_no_of_pages' class='border'>Last &rsaquo;&rsaquo;</a></li>";
                                } ?>
                            </ul>
                        </div>
                    </div>

                    <?php
                    if ($message != null) {
                        echo "<style>.username-error{display:block;text-align:center;}</style>";
                    }
                    ?>

                    <p class="error username-error"><?php echo $message; ?></p>
                </div>
            </section>
        </div>
    </div>



    <!-- ========= JS ========= -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('.reportMessage').on('click', function() {
            return confirm('Are you sure to view report?');
        });

        $('.confirmation').on('click', function() {
            return confirm('Are you sure to make changes in this account?');
        });

        (function($) {

            "use strict";

            var fullHeight = function() {

                $('.js-fullheight').css('height', $(window).height());
                $(window).resize(function() {
                    $('.js-fullheight').css('height', $(window).height());
                });

            };

            fullHeight();

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

        })(jQuery);
    </script>
</body>

</html>