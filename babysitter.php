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
  <title>Babysitter</title>
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

      <div class="custom-menu ">
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
          <li class="active">
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">Customers</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
              <li class="active">
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
    <div id="content" class="p-3">
      <!-- TOTAL BABYSITTER -->
      <nav class="navbar navbar-light bg-light" id="navbar">
        <div class="navContent">
          <div class="totalBabysitter bg-dark m-2 p-2">
            <div class="containertotalBabysitter">
              <h6><span class="text-white">Total</span> <span class='babyChartColor'>Babysitters</span></h6>
              <hr class="bg-light ">

              <?php
              $query = mysqli_query($connect, "select count(type) as totalBabysitters from users where type = 'babysitter'");
              $rows = mysqli_fetch_assoc($query);
              $total_bs = $rows['totalBabysitters'];
              echo "<h2 class='fw-bold text-white text-center'>" .$total_bs . "</h2>";
              ?>

            </div>
            <div class="containertotalBabysitter2 p-1 text-center">

              <h6 class="text-warning">Percentage</h6>
              <canvas id="total-baby-canvas"></canvas>

              <?php
              $sql = "SELECT count(`type`) as count FROM `users` GROUP BY type";
              $query = mysqli_query($connect, $sql);
              $total_users_count = 0;

              // GET ALL DATA COUNTS
              while($tb_rows = mysqli_fetch_assoc($query)){
                $tbt_count[] = $tb_rows['count'];
                $total_users_count += $tb_rows['count'];
              }

              // CALCULATE PERCENTAGE OF THE DATA 
              foreach ($tbt_count as $data){
                $tbt_data[] = round((($data / $total_users_count) * 100), 2);
              }

              ?>
              <script>
                var barColors = [
                  "#b91d47",
                  "#00aba9",
                ];

                new Chart("total-baby-canvas", {
                  type: "doughnut",
                  data: {
                    labels: ["Babysitter", "Parents"],
                    datasets: [{
                      backgroundColor: barColors,
                      data: <?php echo json_encode($tbt_data); ?>
                    }]
                  },
                  options: {
                    title: {
                      display: false
                    },
                    legend: {
                      display: false
                    }
                  }
                });
              </script>

            </div>
          </div>
          <!-- ACTIVE BABYSITTER -->
          <div class="totalBabysitter bg-dark text-white m-2 p-2">
            <div class="containertotalBabysitter">
              <section>
                <h6>Babysitters <span class='babyChartColor'>Status</span></h6>
                <hr class="bg-light">
              </section>
              <section>
                <?php
                $query = mysqli_query($connect, "select status,count(status) as count from users where type='babysitter' group by status");

                echo "<table class='htable'>";
                while ($rows = mysqli_fetch_assoc($query)) {
                  echo "  <tr>";
                  echo "    <td>" . $rows['status'] . "</td>";
                  echo "    <td class='pl-5'>" . $rows['count'] . "</td>";
                  echo "  </tr>";
                }
                echo "</table>";

                ?>
              </section>
            </div>
            <div class="containertotalBabysitter2 p-1">

              <h6 class="text-warning text-center">Percentage</h6>
              <canvas id="activebabysitter"></canvas>

              <?php
              // GET TOTAL BABYSIITER
              $totalquery = mysqli_query($connect, "select count(*) as total from users where type='babysitter'");
              // TOTAL BABYSITTER QUERY
              $tb_query = mysqli_fetch_assoc($totalquery);
              $tb_count = $tb_query['total'];
              // GET TOTAL ACTIVE 
              $sql = "select status,count(status) as count from users where type='babysitter' group by status";
              $query = mysqli_query($connect, $sql);
              // echo $total_babysitter['total'];
              foreach ($query as $data) {
                $title[] = $data['status'];
                $count1[] = round((($data['count'] / $tb_count) * 100), 2);
                //$count1[] = $data['count'];
              }
              // echo json_encode($count1);
              ?>
              <script>
                new Chart("activebabysitter", {
                  type: 'pie',
                  data: {
                    labels: <?php echo json_encode($title); ?>,
                    datasets: [{
                      // label: "Population (millions)",
                      backgroundColor: ["#3cba9f", "#b91d47", "#3e95cd", "#e8c3b9", "#c45850"],
                      data: <?php echo json_encode($count1); ?>
                    }]
                  },
                  options: {
                    title: {
                      display: false,
                    },
                    legend: {
                      display: false
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
        <div class="search shadow-sm">
          <form method="post" id="searchform">
            <input type="text" class="search-input" name="keyword" placeholder="Search..." name="search" required>
            <a href="babysitter.php">
              <button type="button" class="search-icon" name="submitSearch" id="submitSearch">
                <i class="fa fa-refresh"></i>
              </button>
            </a>
            <button type="submit" class="search-icon mr-2" name="submitSearch" id="submitSearch">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>
        <div class="babysitterContent" id="babysitterContent">

          <div class="fullTable ">
            <form method='post' class="table-responsive">
              <table class='table table-striped table-sm text-nowrap'>
                <thead class='table-dark'>
                  <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>TelNo.</th>
                    <th>MobileNo</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Type</th>
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

                    $result_sql = "SELECT count(*) as total_records FROM `users` WHERE  (
                                    `firstname` like '%" . $keyword . "%' 
                                    or `lastname` like '%" . $keyword . "%' 
                                    or `address` like '%" . $keyword . "%' 
                                    or `age` like '%" . $keyword . "%' 
                                    or `telno` like '%" . $keyword . "%' 
                                    or `mobileno` like '%" . $keyword . "%' 
                                    or `email` like '%" . $keyword . "%' 
                                    or `username` like '%" . $keyword . "%' 
                                    or `type` like '%" . $keyword . "%' 
                                    or `status` like '%" . $keyword . "%' )

                                    and type = 'babysitter'";

                    $result_count = mysqli_query($connect, $result_sql);
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

                    if ($keyword == '' || empty($keyword)) {
                      $message = "No data found!";
                    } 
                    else {
                      $sql_result = "SELECT * FROM `users`WHERE  (

                        `firstname` like '%" . $keyword . "%' 
                        or `lastname` like '%" . $keyword . "%' 
                        or `address` like '%" . $keyword . "%' 
                        or `age` like '%" . $keyword . "%' 
                        or `telno` like '%" . $keyword . "%' 
                        or `mobileno` like '%" . $keyword . "%' 
                        or `email` like '%" . $keyword . "%' 
                        or `username` like '%" . $keyword . "%' 
                        or `type` like '%" . $keyword . "%' 
                        or `status` like '%" . $keyword . "%' )
  
                        and type = 'babysitter'
                        LIMIT $offset, $total_records_per_page";
                    }

                  }
                  else{
                    $result_count = mysqli_query($connect, "SELECT COUNT(*) As total_records FROM users where type = 'babysitter'");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

                    $sql_result = "SELECT * FROM `users` WHERE `type` = 'babysitter' LIMIT $offset, $total_records_per_page";
                  }

                  $result = mysqli_query($connect,$sql_result);

                  if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>
                            <td>" . $row['firstname'] . "</td>
                            <td>" . $row['lastname'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['age'] . "</td>
                            <td>" . $row['telno'] . "</td>
                            <td>" . $row['mobileno'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['type'] . "
                            <input type='text' name='user_id' value=" . $row['user_id'] . " hidden></td>";

                      if (strtolower($row['status']) == "active") {
                        echo "<td class='data_status text-success'>" . $row['status'] . "</td>";
                      } else {
                        echo "<td class='data_status text-danger'>" . $row['status'] . "</td>";
                      }
                      echo "<td>" ?>
                      <button type='button' class='action-head btn btn-sm bg-primary text-white' data-toggle='modal' data-target='#myModal<?php echo $row['user_id'] ?>'>
                        View
                      </button>
                      <?php
                      echo "</td>
                            <td>";

                      if (strtolower($row['status']) == "active") {
                        echo "<a class='confirmation action-head btn btn-sm btn-danger text-white'href='update.php?user_id=" . $row['user_id'] . "&status=" . $row['status'] . "&page=babysitter'>Ban</a>";
                      } else if (strtolower($row['status']) == "banned") {
                        echo "<a class='confirmation action-head btn btn-sm btn-success text-white'href='update.php?user_id=" . $row['user_id'] . "&page=babysitter'>Unban</a>";
                      } else {
                        echo "<a class='action-head btn btn-sm btn-secondary text-white' >Pending</a>";
                      }

                      echo "</td>
                          </tr>"; ?>
                      <div class="modal" id="myModal<?php echo $row['user_id'] ?>">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h1 class="modal-title">Babysitter Account</h1>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                            <!-- Modal body -->

                            <div class="modal-body" id="modalBody">
                              <form method="post" class="form-view ">
                                <div class="w-100 mb-3 d-flex justify-content-center">
                                  <div>
                                    <?php 
                                      $basePath = getBaseUrl() . $row['img'];
                                     
                                      ?>
                                      <div class="d-flex w-full rounded-circle">
                                    <?php echo <<<HERE
                                          <img id=profile_img src=$basePath class=w-50 rounded-circle d-flex>
                                    HERE;
                                  ?>
                                  </div>
                                  </div>
                                </div>
                                <div class="fv-main">
                                  <div class="fv1">
                                    <div>
                                      <label for="id" class="modalLabel">USER ID</label>
                                      <input type="text" value="<?php echo $row['user_id'] ?>" readonly><br>
                                      <label for="firstname" class="modalLabel">Firstname</label>
                                      <input type="text" value="<?php echo $row['firstname'] ?>" readonly><br>
                                      <label for="lastname" class="modalLabel">Lastname</label>
                                      <input type="text" value="<?php echo $row['lastname'] ?>" readonly><br>
                                      <label for="address" class="modalLabel">Address</label>
                                      <input type="text" value="<?php echo $row['address'] ?>" readonly><br>
                                      <label for="telno" class="modalLabel">TelNo.</label>
                                      <input type="text" value="<?php echo $row['telno'] ?>" readonly><br>
                                      <label for="mobileno" class="modalLabel">MobileNo</label>
                                      <input type="text" value="<?php echo $row['mobileno'] ?>" readonly><br>
                                    </div>
                                  </div>

                                  <div class="fv1">
                                    <div>
                                      <label for="email" class="modalLabel">Email</label>
                                      <input type="text" value="<?php echo $row['email'] ?>" readonly><br>
                                      <label for="username" class="modalLabel">Username</label>
                                      <input type="text" value="<?php echo $row['username'] ?>" readonly><br>
                                      <label for="type" class="modalLabel">Type</label>
                                      <input type="text" value="<?php echo $row['type'] ?>" readonly><br>
                                      <label for="deleted" class="modalLabel">Ban</label>
                                      <input type="text" value="<?php echo $row['deleted'] ?>" readonly><br>
                                      <label for="status" class="modalLabel">Status</label>
                                      <input type="text" value="<?php echo $row['status'] ?>" readonly><br>
                                      <label for="age" class="modalLabel">Age</label>
                                      <input type="text" value="<?php echo $row['age'] ?>" readonly><br>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex justify-content-end w-100 ">
                                  <?php
                                  if ((strtolower($row['status']) == "pending")) {
                                    echo "<a class='confirmation action-head btn btn-sm btn-success text-white'href='update.php?user_id=" . $row['user_id'] . "&status=" . $row['status'] . "&page=babysitter'>Activate</a>";
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
    </div>
  </div>

  <!-- ========= JS ========= -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
 
  <script>
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