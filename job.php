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
  <title>Job Post</title>
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
          <li class="active">
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Post</a>
            <ul class="collapse list-unstyled" id="pageSubmenu2">
              <li class="active">
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
              <h6><span class="text-white">Total</span> <span class='babyChartColor'>Job Post</span></h6>
              <hr class="bg-light ">

              <?php
              $query = mysqli_query($connect, "select count(*) as total_post from post");
              $rows = mysqli_fetch_assoc($query);
              $total_post = $rows['total_post'];
              echo "<h2 class='fw-bold text-white text-center'>" . $total_post . "</h2>";
              ?>

            </div>
            <div class="containertotaljob2 p-1 text-center">

              <h6 class="text-warning">Post Per Month 2023</h6>
              <canvas id="jobChart"></canvas>

              <?php
              $sql = "select count(jobpost_date) as count, month(jobpost_date) as date from post group by date asc";
              $query = mysqli_query($connect, $sql);
              // $chartRow = mysqli_fetch_assoc($query);
              foreach ($query as $data) {

                $monthNum = $data['date'];
                $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                
                $count[] = $data['count']; // distinct date count
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
                <h6>Job Post <span class='babyChartColor'>Status</span></h6>
                <hr class="bg-light">
              </section>
              <section>
                <?php
                $query = mysqli_query($connect, "select jobpost_status, count(jobpost_status) as jobpost_count  from post group by jobpost_status");

                echo "<table class='htable'>";

                $appCount = mysqli_query($connect, "select count(*) as appCount from post");
                $appCountRows = mysqli_fetch_assoc($appCount);
                $appCountData = $appCountRows['appCount'];
                $jobpost_status = array();
                $jobpost_count = array();
                $jp_total = 0;

                echo "  <tr>";
                echo "    <td>No. of Post</td>";
                echo "    <td class='text-success pl-5'>" . $appCountData . "</td>";
                echo "  </tr>";

                while ($rows = mysqli_fetch_assoc($query)) {
                  $jobpost_status[] = $rows['jobpost_status'];
                  $jobpost_count[] = $rows['jobpost_count'];
                  $jp_total += $rows['jobpost_count'];
                  echo "  <tr>";
                  echo "    <td>" . $rows['jobpost_status'] . "</td>";
                  echo "    <td>" . $rows['jobpost_count'] . "</td>";
                  echo "  </tr>";
                }
                echo "</table>";

                foreach ($jobpost_count as $data) {
                  $jobpost_total[] = round((($data / $jp_total) * 100), 2);
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
                    labels: <?php echo json_encode($jobpost_status); ?>,
                    datasets: [{
                      // label: "Population (millions)",
                      backgroundColor: ["#3cba9f", "#b91d47", "#3e95cd", "#e8c3b9", "#c45850"],
                      data: <?php echo json_encode($jobpost_total); ?>
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
            <a href="export.php?page=job" class="reportMessage">
              <button type="button" class="btn btn-success" id="viewReport"  style="font-size: 14px;">View Report</button>
            </a>
          </div>
          <div class="searchContent2 search shadow-sm" id="searchJob">
            <form method="post" id="searchform" class="w-100">
              <input type="text" class="search-input" name="keyword" placeholder="Search..." name="search" required>
              <a href="job.php">
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
                    <th>Job Title</th>
                    <th>Job Type</th>
                    <th>Description</th>
                    <th>Salary</th>
                    <th>Date</th>
                    <th>Parent ID.</th>
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
                                      jobpost_id, 
                                      jobpost_type, 
                                      jobpost_desc, 
                                      jobpost_duration,
                                      post.deleted,
                                      subscription_id,
                                      jobpost_address,
                                      salary,
                                      jobpost_title,
                                      jobpost_date, 
                                      post.parent_id, 
                                      jobpost_status,
                                      users.firstname,
                                      users.lastname
                                    FROM post
                                    INNER JOIN users ON users.user_id = post.parent_id 
                                    
                                    WHERE  (

                                      `firstname` like '%" . $keyword . "%' 
                                      or `lastname` like '%" . $keyword . "%' 
                                      or `jobpost_date` like '%" . $keyword . "%' 
                                      or `jobpost_duration` like '%" . $keyword . "%' 
                                      or `jobpost_desc` like '%" . $keyword . "%' 
                                      or `jobpost_type` like '%" . $keyword . "%' 
                                      or `jobpost_status` like '%" . $keyword . "%')";
                
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
                                      jobpost_id, 
                                      jobpost_type, 
                                      jobpost_desc, 
                                      jobpost_duration,
                                      post.deleted,
                                      subscription_id,
                                      jobpost_address,
                                      salary,
                                      jobpost_title,
                                      jobpost_date, 
                                      post.parent_id, 
                                      jobpost_status,
                                      users.firstname,
                                      users.lastname
                                    FROM post
                                    INNER JOIN users ON users.user_id = post.parent_id 
                                    
                                    WHERE  (

                                      `firstname` like '%" . $keyword . "%' 
                                      or `lastname` like '%" . $keyword . "%' 
                                      or `jobpost_date` like '%" . $keyword . "%' 
                                      or `jobpost_duration` like '%" . $keyword . "%' 
                                      or `jobpost_desc` like '%" . $keyword . "%' 
                                      or `jobpost_type` like '%" . $keyword . "%' 
                                      or `jobpost_status` like '%" . $keyword . "%')

                                    LIMIT $offset, $total_records_per_page";
                    }
                
                  }
                  else{
                    $result_count = mysqli_query($connect, "SELECT COUNT(*) As total_records FROM post");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1
                
                    $sql_result = "SELECT
                                    jobpost_id, 
                                    jobpost_type, 
                                    jobpost_desc, 
                                    jobpost_duration,
                                    post.deleted,
                                    subscription_id,
                                    jobpost_address,
                                    salary,
                                    jobpost_title,
                                    jobpost_date, 
                                    post.parent_id, 
                                    jobpost_status,
                                    users.firstname,
                                    users.lastname
                                  FROM post
                                  INNER JOIN users ON users.user_id = post.parent_id 
                                  LIMIT $offset, $total_records_per_page";
                  }
                
                  $result = mysqli_query($connect,$sql_result);

                  if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>
                              <td>" . ucfirst($row['jobpost_title']) . "</td>
                              <td>" . ucfirst($row['jobpost_type']) . "</td>
                              <td class='text-truncate' style='max-width: 500px;'>" . $row['jobpost_desc'] . "</td>
                              <td>&#8369;" . $row['salary'] . "</td>
                              <td>" . $row['jobpost_date'] . "</td>
                              <td>" . $row['firstname'] ." " . $row['lastname']. "</td>
                              <input type='text' name='jobpost_id' value=" . $row['jobpost_id'] . " hidden></td>";

                      if (strtolower($row['jobpost_status']) == "active" || strtolower($row['jobpost_status']) == "hired") {
                        echo "<td class='data_status text-success' >" . $row['jobpost_status'] . "</td>";
                      } else {
                        echo "<td class='data_status text-danger'>" . $row['jobpost_status'] . "</td>";
                      }
                      echo "  <td>" ?>
                      <button type='button' class='action-head btn btn-sm bg-primary text-white' data-toggle='modal' data-target='#myModal<?php echo $row['jobpost_id'] ?>'>
                        View
                      </button>
                      <?php
                      echo "</td>
                            <td>";

                      if (strtolower($row['jobpost_status']) == "active" || strtolower($row['jobpost_status']) == "hired") {
                        echo "<a class='confirmation action-head btn btn-sm btn-danger text-white'href='update.php?user_id=" . $row['jobpost_id'] . "&status=" . $row['jobpost_status'] . "&page=job'>Ban</a>";
                      } else if (strtolower($row['jobpost_status']) == "pending") {
                        echo "<a class='action-head btn btn-sm btn-secondary text-white' >Pending</a>";
                      } else if (strtolower($row['jobpost_status']) == "banned") {
                        echo "<a class='confirmation action-head btn btn-sm btn-success text-white'href='update.php?user_id=" . $row['jobpost_id'] . "&page=job'>Unban</a>";
                      } 
                      else {
                        echo "<a class='action-head btn btn-sm btn-secondary text-white' >Expired</a>";
                      }

                      echo "</td>
                          </tr>"; ?>
                      <div class="modal" id="myModal<?php echo $row['jobpost_id'] ?>">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h1 class="modal-title">Job Post Details</h1>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                            <!-- Modal body -->

                            <div class="modal-body " id="modalBody">
                              <hr>
                              <div class="w-100 d-flex justify-content-center ">
                                <div >
                                  <form method="post" class="form-inline">
                                    <label for="id" class="modalLabel">Job Post ID</label>
                                    <input type="text" value="<?php echo $row['jobpost_id'] ?>"><br>
                                    <label for="mobileno" class="modalLabel">Job Title</label>
                                    <input type="text" value="<?php echo $row['jobpost_title'] ?>"><br>
                                    <label for="telno" class="modalLabel">Parent ID.</label>
                                    <input type="text" value="<?php echo $row['parent_id'] ?>"><br>
                                    <label for="address" class="modalLabel">Date</label>
                                    <input type="text" value="<?php echo $row['jobpost_date'] ?>"><br>
                                    <label for="address" class="modalLabel">End</label>
                                    <input type="text" value="<?php echo $row['jobpost_duration'] ?>"><br>
                                    <label for="lastname" class="modalLabel">Description</label>
                                    <input type="text" value="<?php echo $row['jobpost_desc'] ?>"><br>
                                    <label for="firstname" class="modalLabel">Job Type</label>
                                    <input type="text" value="<?php echo $row['jobpost_type'] ?>"><br>
                                    <label for="mobileno" class="modalLabel">Status</label>
                                    <input type="text" value="<?php echo $row['jobpost_status'] ?>"><br>
                                    <label for="mobileno" class="modalLabel">Deleted</label>
                                    <input type="text" value="<?php echo $row['deleted'] ?>"><br>
                                    <label for="mobileno" class="modalLabel">Sub ID</label>
                                    <input type="text" value="<?php echo $row['subscription_id'] ?>"><br>
                                    <label for="mobileno" class="modalLabel">Job Address</label>
                                    <input type="text" value="<?php echo $row['jobpost_address'] ?>"><br>
                                    <label for="mobileno" class="modalLabel">Salary</label>
                                    <input type="text" value="<?php echo $row['salary'] ?>"><br>
                                    <div class="d-flex justify-content-end w-100">
                                      <?php
                                      if ((strtolower($row['jobpost_status']) == "pending")) {
                                        echo "<a class='confirmation action-head btn btn-sm btn-success text-white'href='update.php?user_id=" . $row['jobpost_id'] . "&status=" . $row['jobpost_status'] . "&page=job'>Activate</a>";
                                      } else if ((strtolower($row['jobpost_status']) == "expired")) {
                                        echo "<a class='confirmation action-head btn btn-sm btn-success text-white'href='update.php?user_id=" . $row['jobpost_id'] . "&status=" . $row['jobpost_status'] . "&page=job'>Activate</a>";
                                      } else {
                                        // do nothing
                                      }
                                      ?>
                                    </div>
                                  </form>
                                </div>
                              </div>
                              <hr>
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