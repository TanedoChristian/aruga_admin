<?php
include("connect.php");
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
    <title>Job Application</title>
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
    <!-- <link rel="stylesheet" href="css/index2.css"> FOR STICKY TOPBAR-->

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
                    <li>
                        <a href="subscription.php">Subscription</a>
                    </li>
                    <li class="active">
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
                            <h6><span class="text-white">Total</span> <span class='babyChartColor'>Applications</span></h6>
                            <hr class="bg-light ">

                            <?php
                            $query = mysqli_query($connect, "select count(*) as total_application from application");
                            $rows = mysqli_fetch_assoc($query);
                            $total_application = $rows['total_application'];
                            echo "<h2 class='fw-bold text-white text-center'>" . $total_application . "</h2>";
                            ?>

                        </div>
                        <div class="containertotaljob2 p-1 text-center">

                            <h6 class="text-warning">Request Per Month 2023</h6>
                            <canvas id="jobChart"></canvas>

                            <?php
                            $sql = "select count(apply_date) as apply_count , month(apply_date) as date from application group by date asc";
                            $query = mysqli_query($connect, $sql);
                            // $chartRow = mysqli_fetch_assoc($query);
                            foreach ($query as $data) {

                                $monthNum = $data['date'];
                                $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

                                $count[] = $data['apply_count']; // distinct date count
                                $date[] = $monthName;   // distinct date display as Word
                            }
                            ?>
                            <script>
                                const xValues = <?php echo json_encode($date); ?>;
                                const yValues = <?php echo json_encode($count); ?>;

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
                                                    stepSize: 10
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
                                <h6>Application <span class='babyChartColor'>Status</span></h6>
                                <hr class="bg-light">
                            </section>
                            <section>
                                <?php
                                $query = mysqli_query($connect, "select apply_status, count(apply_status) as apply_count  from application group by apply_status desc");

                                echo "<table class='htable'>";

                                $ratings = array();
                                $apply_count = array();
                                $review_total = 0;

                                while ($rows = mysqli_fetch_assoc($query)) {
                                    $ratings[] = $rows['apply_status'];
                                    $apply_count[] = $rows['apply_count'];
                                    $review_total += $rows['apply_count'];
                                    echo "  <tr>";
                                    echo "    <td>" . $rows['apply_status'] . "</td>";
                                    echo "    <td class='pl-5'>" . $rows['apply_count'] . "</td>";
                                    echo "  </tr>";
                                }
                                echo "</table>";

                                foreach ($apply_count as $data) {
                                    $review_percentage_total[] = round((($data / $review_total) * 100), 2);
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
                                        labels: <?php echo json_encode($ratings); ?>,
                                        datasets: [{
                                            // label: "Population (millions)",
                                            backgroundColor: ["#b91d47", "#3e95cd", "#3cba9f", "#e8c3b9", "#c45850"],
                                            data: <?php echo json_encode($review_percentage_total); ?>
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
                        <a href="export.php?page=application" class="reportMessage">
                            <button type="button" class="btn btn-success" id="viewReport" style="font-size: 14px;">View Report</button>
                        </a>
                    </div>
                    <div class="searchContent2 search shadow-sm" id="searchJob">
                        <form method="post" id="searchform" class="w-100">
                            <input type="text" class="search-input" name="keyword" placeholder="Search..." name="search" required>
                            <a href="application.php">
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

                    <style>
                        .secondContent {
                            display: none;
                        }
                    </style>

                    <div class="fullTable ">
                        <form method='post' class="table-responsive">
                            <table class='table table-striped table-sm text-nowrap'>
                                <thead class='table-dark'>
                                    <tr>
                                        <th>Parent Employer</th>
                                        <th>Babysitter Applicant</th>
                                        <th>Apply Date</th>
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


                                    if(isset($_POST['submitSearch'])){

                                        $keyword = strval($_POST['keyword']);
                                    
                                        $result_sql = "SELECT
                                                            count(*) as total_records,
                                                            apply_id,
                                                            babysitter_id,
                                                            parent_id,
                                                            subscription_id,
                                                            jobpost_id,
                                                            apply_date,
                                                            apply_status,
                                                            apply_deleted,
                                                            users_b.firstname as b_fname,
                                                            users_b.lastname as b_lname,
                                                            users_p.firstname as p_fname,
                                                            users_p.lastname as p_lname 
                                                        FROM application
                                                        INNER JOIN users users_b ON users_b.user_id = application.babysitter_id
                                                        INNER JOIN users users_p ON users_p.user_id = application.parent_id
                                                        WHERE  (
                                                            users_b.firstname like '%".$keyword."%' 
                                                            or users_b.lastname like '%".$keyword."%' 
                                                            or users_p.firstname like '%".$keyword."%' 
                                                            or users_p.lastname like '%".$keyword."%' 
                                                            or apply_date like '%" . $keyword . "%' 
                                                            or apply_status like '%" . $keyword . "%')";
                                    
                                        $result_count = mysqli_query($connect, $result_sql);
                                        $total_records = mysqli_fetch_array($result_count);
                                        $total_records = $total_records['total_records'];
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $second_last = $total_no_of_pages - 1; // total page minus 1
                                    
                                        if ($keyword == '' || empty($keyword)) {
                                          $message = "No data found!";
                                        } 
                                        else {
                                          $sql_result = "SELECT
                                                            apply_id,
                                                            babysitter_id,
                                                            parent_id,
                                                            subscription_id,
                                                            jobpost_id,
                                                            apply_date,
                                                            apply_status,
                                                            apply_deleted,
                                                            users_b.firstname as b_fname,
                                                            users_b.lastname as b_lname,
                                                            users_p.firstname as p_fname,
                                                            users_p.lastname as p_lname 
                                                        FROM application
                                                        INNER JOIN users users_b ON users_b.user_id = application.babysitter_id
                                                        INNER JOIN users users_p ON users_p.user_id = application.parent_id
                                                        WHERE  (
                                                            users_b.firstname like '%".$keyword."%' 
                                                            or users_b.lastname like '%".$keyword."%' 
                                                            or users_p.firstname like '%".$keyword."%' 
                                                            or users_p.lastname like '%".$keyword."%' 
                                                            or apply_date like '%" . $keyword . "%' 
                                                            or apply_status like '%" . $keyword . "%')
                                            LIMIT $offset, $total_records_per_page";
                                        }
                                    
                                      }
                                      else{
                                        $result_count = mysqli_query($connect, "SELECT COUNT(*) As total_records FROM `application`");
                                        $total_records = mysqli_fetch_array($result_count);
                                        $total_records = $total_records['total_records'];
                                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                        $second_last = $total_no_of_pages - 1; // total page minus 1
                                    
                                        $sql_result = "SELECT
                                                            apply_id,
                                                            babysitter_id,
                                                            parent_id,
                                                            subscription_id,
                                                            jobpost_id,
                                                            apply_date,
                                                            apply_status,
                                                            apply_deleted,
                                                            users_b.firstname as b_fname,
                                                            users_b.lastname as b_lname,
                                                            users_p.firstname as p_fname,
                                                            users_p.lastname as p_lname 
                                                        FROM application
                                                        INNER JOIN users users_b ON users_b.user_id = application.babysitter_id
                                                        INNER JOIN users users_p ON users_p.user_id = application.parent_id
                                                        LIMIT $offset, $total_records_per_page";
                                      }
                                    
                                      $result = mysqli_query($connect,$sql_result);

                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>
                                                    <td>" . $row['p_fname'] ." " .$row['p_lname']. "</td>
                                                    <td>" . $row['b_fname'] ." " .$row['b_lname']. "</td>
                                                    <td>" . $row['apply_date'] . "</td>
                                                    <input type='text' name='apply_id' value='" . $row['apply_id'] . "' hidden></td>";

                                            if (strtolower($row['apply_status']) == "hired") {
                                                echo "<td class='data_status text-success'>" . $row['apply_status'] . "</td>";
                                            } else if (strtolower($row['apply_status']) == "rejected") {
                                                echo "<td class='data_status text-danger'>" . $row['apply_status'] . "</td>";
                                            } else if (strtolower($row['apply_status']) == "done") {
                                                echo "<td class='data_status text-success'>" . $row['apply_status'] . "</td>";
                                            }
                                            else {
                                                echo "<td class='data_status text-danger'>" . $row['apply_status'] . "</td>";
                                            }
                                            ?>
                                            <?php
                                            
                                            if (strtolower($row['apply_status']) == "hired" ) {
                                                echo "<td colspan='2'>None</td>";
                                            }else if (strtolower($row['apply_status']) == "rejected") {
                                                echo "<td colspan='2'>None</td>";
                                            }else if (strtolower($row['apply_status']) == "done") {
                                                echo "<td colspan='2'>None</td>";
                                            }
                                            else {

                                                echo "<td>
                                                        <a class='confirmation action-head btn btn-sm btn-danger text-white'href='update.php?user_id=" . $row['apply_id'] . "&status=" . $row['apply_status'] . "&page=application&action=reject'>Reject</a>
                                                      </td>
                                                      <td>
                                                        <a class='confirmation action-head btn btn-sm btn-success text-white'href='update.php?user_id=" . $row['apply_id'] . "&status=" . $row['apply_status'] . "&page=application&action=hire'>Hire</a>
                                                      </td>";
                                            }

                                            echo "</tr>"; ?>
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