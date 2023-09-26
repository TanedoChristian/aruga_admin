<?php
include("connect.php");
error_reporting();
session_start();


$message = null;

if (!isset($_SESSION["id"])) {
  header("Location: login.php");
}

if(isset($_POST['exportBTN'])){

  $month = $_POST['filterMonth'];
  $year = $_POST['filterYear'];

  header("Location: export.php?page=home&m=$month&y=$year");
  exit();
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" href="img/logo.png" />

  <!-- ========== MATERIALIZE CSS ========== -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <!-- ========== BOOTSTRAP ========== -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <!-- ========== CSS ========== -->
  <link rel="stylesheet" href="css/index.css">

  <!-- chart js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      updateTime();
    });

    function updateTime() {
      $.ajax({
        url: 'date.php',
        success: function(data) {
          $('#time').html(data);
          setTimeout(updateTime, 1000); // Update every second
        }
      });
    }
  </script>
</head>
<style>

</style>

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
          <li class="active">
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customers</a>
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
    <div id="content" class="p-4 ">

      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container-fluid d-flex justify-content-between w-100 bg-dark p-2 ">
          <div>
            <?php

            $user_sql = "SELECT `username` FROM `admin` WHERE admin_id = '" . $_SESSION['id'] . "' LIMIT 1";
            $user_query = mysqli_query($connect, $user_sql);

            if (mysqli_num_rows($user_query) > 0) {
              while ($row = mysqli_fetch_assoc($user_query)) {
                $login_user = $row['username'];
              }
              echo "<span class='text-white'>Welcome</span><b class='babyChartColor'>&nbsp;" . ucfirst($login_user) . "!</b>";
            }

            ?>
          </div>
          <div id="time" class="text-white"></div>
      </nav>

      <!-- graph and datas -->
      <div class="navContent">
        <div class="main-graph bg-light p-2">
          <!-- FIRST graph -->
          <div class="mg-content bg-dark">

            <?php
            $user_query2 = mysqli_query($connect, "select count(*) as total from users");
            $rows = mysqli_fetch_assoc($user_query2);
            $total_bs = $rows['total'];

            ?>

            <h6><span class="text-white">Total</span> <span class='babyChartColor'>Customers </span><?php echo "<span class='fw-bold text-white text-center'> :&nbsp;" . $total_bs . "</span>"; ?></h6>

            <hr class="bg-light ">

            <!-- graph here -->
            <section class="d-flex w-100">
              <?php
              $customer_sql = "SELECT count(`type`) as count,`type` FROM `users` GROUP BY type";
              $customer_query = mysqli_query($connect, $customer_sql);
              $customer_query2 = mysqli_query($connect, $customer_sql);
              $total_customer = 0;

              if (mysqli_num_rows($customer_query) > 0) {
                while ($rows = mysqli_fetch_assoc($customer_query)) {
                  $total_customer += $rows['count'];
                  $customer_count[] = $rows['count'];
                  $customer_type[] = $rows['type'];
                }
              }

              foreach ($customer_count as $data) {
                $tbt_data[] = round((($data / $total_customer) * 100), 2);
              }

              ?>
              <div class="w-50 d-block">
                <div>
                  <h6 class=" text-warning text-center">Count</h6>
                </div>
                <div>
                  <table class="w-100 text-white">
                    <?php
                    if (mysqli_num_rows($customer_query2) > 0) {
                      while ($rows = mysqli_fetch_assoc($customer_query2)) {

                        echo "<tr>
                                <td>" . $rows['type'] . "</td>
                                <td>" . $rows['count'] . "</td>
                              </tr>";
                      }
                    }
                    ?>
                  </table>
                </div>
              </div>
              <div class="w-50 d-block">
                <div>
                  <h6 class=" text-warning text-center">Percentage</h6>
                </div>
                <div>
                  <center>
                    <canvas id="graph-customers" width="100"></canvas>
                  </center>
                </div>
              </div>
            </section>

            <script>
              var barColors = [
                "#b91d47",
                "#00aba9",
              ];

              new Chart("graph-customers", {
                type: "doughnut",
                data: {
                  labels: ["Babysitter", "Parents"],
                  datasets: [{
                    backgroundColor: barColors,
                    data: <?php echo json_encode($tbt_data); ?>
                  }]
                },
                options: {
                  responsive: false,
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

          <!-- SECOND graph -->
          <div class="mg-content bg-dark">


            <?php
            $post_query = mysqli_query($connect, "select (select count(*) from post) as post_count, count(*) as blog_count from blog");
            $total_post = 0;

            if (mysqli_num_rows($post_query) > 0) {
              while ($rows = mysqli_fetch_assoc($post_query)) {
                $total_post += $rows['post_count'] + $rows['blog_count'];
              }
            }
            ?>

            <h6><span class="text-white">Total</span> <span class='babyChartColor'>Post </span><?php echo "<span class='fw-bold text-white text-center'> :&nbsp;" . $total_post . "</span>"; ?></h6>

            <hr class="bg-light ">

            <!-- graph here -->
            <section class="d-flex w-100">
              <?php
              $posts_sql = "select (select count(*) from post) as post_count, count(*) as blog_count from blog";
              $posts_query = mysqli_query($connect, $posts_sql);
              $posts_query2 = mysqli_query($connect, $posts_sql);

              if (mysqli_num_rows($posts_query) > 0) {
                while ($rows = mysqli_fetch_assoc($posts_query)) {
                  $posts_count = $rows['post_count'];
                  $blog_count = $rows['blog_count'];
                  $post_content[] =  $rows['post_count'];
                  $post_content[] =  $rows['blog_count'];
                }
              }

              foreach ($post_content as $data) {
                if($data != 0) {
                  $post_content_percentage[] = round((($data / $total_post) * 100), 2);
                }
               
              }

              ?>
              <div class="w-50 d-block">
                <div>
                  <h6 class=" text-warning text-center">Count</h6>
                </div>
                <div>
                  <table class="w-100 text-white">
                    <?php
                    echo "<tr>
                                <td>Job Post</td>
                                <td>" . $posts_count . "</td>
                              </tr>
                              <tr>
                                <td>Blog Post</td>
                                <td>" . $blog_count . "</td>
                              </tr>";
                    ?>
                  </table>


                </div>
              </div>
              <div class="w-50 d-block">
                <div>
                  <h6 class=" text-warning text-center">Percentage</h6>
                </div>
                <div>
                  <center>
                    <canvas id="graph-post" width="100"></canvas>
                  </center>
                </div>
              </div>
            </section>

            <script>
              var barColors = [
                "#b91d47",
                "#00aba9",
              ];

              new Chart("graph-post", {
                type: "pie",
                data: {
                  labels: ["Job", "Blog"],
                  datasets: [{
                    backgroundColor: barColors,
                    data: <?php echo json_encode($post_content_percentage); ?>
                  }]
                },
                options: {
                  responsive: false,
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
          <!-- THIRD graph -->
          <div class="mg-content bg-dark">
            <?php
            $application_query = mysqli_query($connect, "select count(*) as total_application from application");
            $rows = mysqli_fetch_assoc($application_query);
            $total_application = $rows['total_application'];
            ?>

            <h6><span class="text-white">Total</span> <span class='babyChartColor'>Application </span><?php echo "<span class='fw-bold text-white text-center'> :&nbsp;" . $total_application . "</span>"; ?></h6>

            <hr class="bg-light ">

            <section class="d-flex w-100">
              <?php
              $posts_sql = "select (select count(*) from post) as post_count, count(*) as blog_count from blog";
              $posts_query = mysqli_query($connect, $posts_sql);
              $posts_query2 = mysqli_query($connect, $posts_sql);

              if (mysqli_num_rows($posts_query) > 0) {
                while ($rows = mysqli_fetch_assoc($posts_query)) {
                  $posts_count = $rows['post_count'];
                  $blog_count = $rows['blog_count'];
                  $post_content[] =  $rows['post_count'];
                  $post_content[] =  $rows['blog_count'];
                }
              }

              foreach ($post_content as $data) {
                if($data != 0) {
                  $post_content_percentage[] = round((($data / $total_post) * 100), 2);
                }
               
              }

              ?>
              <div class="w-50 d-block">
                <div>
                  <h6 class=" text-warning text-center">Status Count</h6>
                </div>
                <div>
                  <?php
                  $query = mysqli_query($connect, "select apply_status, count(apply_status) as apply_count  from application group by apply_status desc");

                  echo "<table class='w-100 text-white'>";

                  $ratings = array();
                  $apply_count = array();
                  $review_total = 0;

                  while ($rows = mysqli_fetch_assoc($query)) {
                    $ratings[] = $rows['apply_status'];
                    $apply_count[] = $rows['apply_count'];
                    $review_total += $rows['apply_count'];
                    echo "  <tr>";
                    echo "    <td>" . $rows['apply_status'] . "</td>";
                    echo "    <td>" . $rows['apply_count'] . "</td>";
                    echo "  </tr>";
                  }
                  echo "</table>";

                  foreach ($apply_count as $data) {
                    $review_percentage_total1[] = round((($data / $review_total) * 100), 2);
                  }
                  ?>
                </div>
              </div>
              <div class="w-50 d-block">

                <div>
                  <h6 class=" text-warning text-center">Percentage</h6>
                </div>
                <div>
                  <center>
                    <canvas id="graph-application" width="100"></canvas>
                  </center>
                  <script>
                    new Chart("graph-application", {
                      type: 'pie',
                      data: {
                        labels: <?php echo json_encode($ratings); ?>,
                        datasets: [{
                          // label: "Population (millions)",
                          backgroundColor: ["#b91d47", "#3e95cd", "#3cba9f", "#e8c3b9", "#c45850"],
                          data: <?php echo json_encode($review_percentage_total1); ?>
                        }]
                      },
                      options: {
                        responsive: false,
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
            </section>
          </div>
          <!-- FORTH graph -->
          <div class="mg-content bg-dark">
            <?php
            $review_query1 = mysqli_query($connect, "select count(*) as total_review from reviews");
            $rows = mysqli_fetch_assoc($review_query1);
            $total_review = $rows['total_review'];
            ?>
            <h6><span class="text-white">Total</span> <span class='babyChartColor'>Review </span><?php echo "<span class='fw-bold text-white text-center'> :&nbsp;" . $total_review . "</span>"; ?></h6>

            <hr class="bg-light ">
            <section class="d-flex w-100">

              <div class="w-50 d-block">
                <div>
                  <h6 class=" text-warning text-center">Count</h6>
                </div>
                <div>
                  <?php
                  $review_query2 = mysqli_query($connect, "select review_ratings, count(review_ratings) as review_count  from reviews group by review_ratings desc");

                  echo "<table class='w-100 text-white'>";

                  $ratings = array();
                  $review_count = array();
                  $review_total = 0;

                  while ($rows = mysqli_fetch_assoc($review_query2)) {
                    $ratings[] = $rows['review_ratings'] . " stars";
                    $review_count[] = $rows['review_count'];
                    $review_total += $rows['review_count'];
                    echo "  <tr>";
                    echo "    <td>" . $rows['review_ratings'] . " <span class='fa fa-star checked text-warning'></span></td>";
                    echo "    <td>" . $rows['review_count'] . "</td>";
                    echo "  </tr>";
                  }
                  echo "</table>";
                  foreach ($review_count as $data) {
                    $review_percentage_total[] = round((($data / $review_total) * 100), 2);
                  }

                  ?>
                </div>
              </div>
              <div class="w-50 d-block">
                <div>
                  <h6 class=" text-warning text-center">Percentage</h6>
                </div>
                <div>
                  <center>
                    <canvas id="graph-review" width="100"></canvas>
                  </center>
                  <script>
                    new Chart("graph-review", {
                      type: 'pie',
                      data: {
                        labels: <?php echo json_encode($ratings); ?>,
                        datasets: [{
                          // label: "Population (millions)",
                          backgroundColor: ["#3cba9f", "#b91d47", "#3e95cd", "#e8c3b9", "#c45850"],
                          data: <?php echo json_encode($review_percentage_total); ?>
                        }]
                      },
                      options: {
                        responsive: false,
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
            </section>
          </div>
          <!-- fifth graph -->
          <div class="mg-content bg-dark">

            <?php
            $subscription_query = mysqli_query($connect, "select count(*) as total_sub from subscription");
            $rows = mysqli_fetch_assoc($subscription_query);
            $total_sub = $rows['total_sub'];
            ?>

            <h6><span class="text-white">Total</span> <span class='babyChartColor'>Subscription </span><?php echo "<span class='fw-bold text-white text-center'> :&nbsp;" . $total_sub . "</span>"; ?></h6>

            <hr class="bg-light ">
            <section class="d-flex w-100">

              <div class="w-50 d-block">
                <div>
                  <h6 class=" text-warning text-center">Count</h6>
                </div>
                <div>
                  <?php
                  $query = mysqli_query($connect, "select status, count(status) as status_count  from subscription group by status desc");

                  echo "<table class='w-100 text-white'>";

                  $sub_status = array();
                  $sub_count = array();
                  $sub_total = 0;

                  while ($rows = mysqli_fetch_assoc($query)) {
                    $sub_status[] = $rows['status'];
                    $sub_count[] = $rows['status_count'];
                    $sub_total += $rows['status_count'];
                    echo "  <tr>";
                    echo "    <td>" . $rows['status'] . "</td>";
                    echo "    <td>" . $rows['status_count'] . "</td>";
                    echo "  </tr>";
                  }
                  echo "</table>";

                  foreach ($sub_count as $data) {
                    $sub_percentage[] = round((($data / $sub_total) * 100), 2);
                  }
                  ?>
                </div>
              </div>
              <div class="w-50 d-block">
                <div>
                  <h6 class=" text-warning text-center">Percentage</h6>
                </div>
                <div>
                  <center>
                    <canvas id="graph-subscription" width="100"></canvas>
                  </center>
                  <script>
                    new Chart("graph-subscription", {
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
                        responsive: false,
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
            </section>
          </div>
        </div>
      </div>
      <hr>
      <div class="middle-main bg-light shadow">
        <div class="middle-content shadow-sm p-2">
          <ul class="nav nav-pills mb-3 bg-dark p-1" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Application</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-menu1-tab" data-toggle="pill" href="#pills-menu1" role="tab" aria-controls="pills-menu1" aria-selected="false">Job Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-menu2-tab" data-toggle="pill" href="#pills-menu2" role="tab" aria-controls="pills-menu2" aria-selected="false">Blog Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-menu3-tab" data-toggle="pill" href="#pills-menu3" role="tab" aria-controls="pills-menu3" aria-selected="false">Reviews</a>
            </li>
            <li class="nav-item ml-auto">
              <!-- <a class="reportMessage nav-link bg-success text-white" id="pills-menu4-tab" href="export.php?page=home"  aria-selected="false"><i class="fa fa-download" aria-hidden="true"></i></a> -->
                
              <form method="post" class="form-inline">
                <div class="form-group">
                  <label for="filter-month">Filter Report:</label>
                  <select id="filter-month" name="filterMonth" class="form-control ml-2">
                    <option value="">Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
                <div class="form-group">
                  <select id="filter-year" name="filterYear" class="form-control ml-2">
                    <option value="">Year</option>
                    <option value="2023">2023</option>
                  </select>
                </div>
                <button class="reportMessage nav-link btn btn-success text-white ml-2" type="submit" name="exportBTN"><i class="fa fa-download" aria-hidden="true"></i></button>
              </form>

            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="eachTab table-responsive tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <?php
                    
                    $i_application_sql = "SELECT
                                              CONCAT(users.firstname,' ',users.lastname) AS babysitter_name,
                                              CONCAT(users2.firstname,' ',users2.lastname) AS parent_name,
                                              application.apply_date,
                                              application.apply_status
                                          FROM
                                              application
                                          inner join users on users.user_id = application.babysitter_id
                                          inner join users as users2 on users2.user_id = application.parent_id
                                          

                                          ORDER BY
                                              application.apply_date DESC";

                    // $i_application_sql = "SELECT
                    //                           CONCAT(users.firstname,' ',users.lastname) AS babysitter_name,
                    //                           CONCAT(users2.firstname,' ',users2.lastname) AS parent_name,
                    //                           application.apply_date,
                    //                           application.apply_status
                    //                       FROM
                    //                           application
                    //                           JOIN babysitter_account ON application.babysitter_id = babysitter_account.babysitter_id
                    //                           JOIN users ON babysitter_account.user_id = users.user_id
                    //                           JOIN post ON application.jobpost_id = post.jobpost_id
                    //                           JOIN parent_account ON post.parent_id = parent_account.parent_id
                    //                           JOIN users AS users2 ON parent_account.user_id = users2.user_id
                    //                       ORDER BY
                    //                           application.apply_date DESC";


                    $i_application_query = mysqli_query($connect,$i_application_sql);

                    if(mysqli_num_rows($i_application_query)>0){

                      echo "<table class='table table-sm table-hover text-nowrap'>
                              <tr>
                                <th>Babysitter Applicant</th>
                                <th>Parent</th>
                                <th>Applied Date</th>
                                <th>Status</th>
                              </tr>";

                      while($row = mysqli_fetch_assoc($i_application_query)){
                        
                        echo "<tr>
                                <td>".$row['babysitter_name']."</td>
                                <td>".$row['parent_name']."</td>
                                <td>".$row['apply_date']."</td>
                                <td>".$row['apply_status']."</td>
                              </tr>";

                      }

                      echo "</table>";
                    }
                    ?>
            </div>
            <div class="eachTab table-responsive tab-pane fade" id="pills-menu1" role="tabpanel" aria-labelledby="pills-menu1-tab">
              <?php 
                $i_jobpost_sql = "SELECT DISTINCT
                                    post.jobpost_date,
                                    users.firstname,
                                      users.lastname,
                                      post.jobpost_type,
                                      post.jobpost_status
                                  FROM
                                      users
                                  inner join post 
                                  ON users.user_id = post.parent_id
                                  ORDER BY	
                                    post.jobpost_date DESC";

                // $i_jobpost_sql = "SELECT DISTINCT
                //                     post.jobpost_date,
                //                     users.firstname,
                //                       users.lastname,
                //                       post.jobpost_type,
                //                       post.jobpost_status
                //                   FROM
                //                       users,
                //                       parent_account,
                //                       post
                //                   WHERE
                //                       users.user_id = parent_account.user_id AND post.parent_id = parent_account.parent_id
                //                   ORDER BY	
                //                     post.jobpost_date DESC";


                $i_jobpost_query = mysqli_query($connect,$i_jobpost_sql);

                if(mysqli_num_rows($i_jobpost_query)>0){

                  echo "<table class='table table-sm table-hover text-nowrap'>
                          <tr>
                            <th>Job Post Date</th>
                            <th>Parent Name</th>
                            <th>Type</th>
                            <th>Status</th>
                          </tr>";

                  while($row = mysqli_fetch_assoc($i_jobpost_query)){
                    
                    echo "<tr>
                            <td>".$row['jobpost_date']."</td>
                            <td>".$row['firstname'] ." ". $row['lastname']."</td>
                            <td>".$row['jobpost_type']."</td>
                            <td>".$row['jobpost_status']."</td>
                          </tr>";

                  }

                  echo "</table>";
                }
              ?>
            </div>
            <div class="eachTab table-responsive tab-pane fade" id="pills-menu2" role="tabpanel" aria-labelledby="pills-menu2-tab">

                <?php 
                
                $i_blog_sql = "SELECT
                                  CONCAT(users.firstname,' ',users.lastname) AS parent_name,
                                    blog_postdate,
                                    blog_title,
                                    blog_deleted
                                FROM
                                    blog 
                                JOIN users ON blog.user_id = users.user_id
                                ORDER BY
                                  blog_postdate DESC";
                $i_blog_query = mysqli_query($connect,$i_blog_sql);

                if(mysqli_num_rows($i_blog_query)>0){

                  echo "<table class='table table-sm table-hover text-nowrap'>
                          <tr>
                            <th>Parent Name</th>
                            <th>Post Date</th>
                            <th>Title</th>
                            <th>Status</th>
                          </tr>";

                  while($row = mysqli_fetch_assoc($i_blog_query)){
                    
                    echo "<tr>
                            <td>".$row['parent_name']."</td>
                            <td>".$row['blog_postdate'] ."</td>
                            <td>".$row['blog_title']."</td>
                            <td>".$row['blog_deleted']."</td>
                          </tr>";

                  }

                  echo "</table>";
                }
                ?>
            </div>
            <div class="eachTab table-responsive tab-pane fade" id="pills-menu3" role="tabpanel" aria-labelledby="pills-menu3-tab">
              <?php 
              
              $i_review_sql = "SELECT
                                  CONCAT(users.firstname,' ',users.lastname) AS babysitter_name,
                                  CONCAT(users2.firstname,' ',users2.lastname) AS parent_name,
                                  reviews.review_date,
                                  reviews.review_details,
                                  reviews.review_ratings
                                FROM
                                  reviews 
                                INNER JOIN users users2 ON users2.user_id = reviews.parent_id
                                INNER JOIN users  ON users.user_id = reviews.babysitter_id  
                                ORDER BY
                                  review_date DESC";

              // $i_review_sql = "SELECT
              //                     CONCAT(users.firstname,' ',users.lastname) AS babysitter_name,
              //                     CONCAT(users2.firstname,' ',users2.lastname) AS parent_name,
              //                     reviews.review_date,
              //                     reviews.review_details,
              //                     reviews.review_ratings
              //                   FROM
              //                     reviews 
                                  
              //                     JOIN babysitter_account ON reviews.babysitter_id = babysitter_account.babysitter_id
              //                     JOIN parent_account ON reviews.parent_id = parent_account.parent_id
              //                     JOIN users ON babysitter_account.user_id = users.user_id
              //                     JOIN users AS users2 ON parent_account.user_id = users2.user_id
                                    
              //                   ORDER BY
              //                     review_date DESC";

              $i_review_query = mysqli_query($connect,$i_review_sql);

              if(mysqli_num_rows($i_review_query)>0){

                echo "<table class='table table-sm table-hover text-nowrap'>
                        <tr>
                          <th>Babysitter</th>
                          <th>Parent</th>
                          <th>Date</th>
                          <th>Details</th>
                          <th>Ratings</th>
                        </tr>";

                while($row = mysqli_fetch_assoc($i_review_query)){
                  
                  echo "<tr>
                          <td>".$row['babysitter_name']."</td>
                          <td>".$row['parent_name'] ."</td>
                          <td>".$row['review_date']."</td>
                          <td class='text-truncate' style='max-width: 200px;'>".$row['review_details']."</td>
                          <td>".$row['review_ratings']."</td>
                        </tr>";

                }

                echo "</table>";
              }
              ?>
            </div>
          </div>
        </div>
        <div class="middle-content shadow-sm p-2">
          <?php

          $ranking = 0;
          echo '<table class="table table-sm table-hover ">';

          $top_user_query = "SELECT
                                  CONCAT(users.lastname,' ',users.firstname) as `name`,
                                  round(AVG(reviews.review_ratings),1) AS rating
                              FROM users
                              INNER JOIN reviews ON reviews.babysitter_id = users.user_id
                              GROUP BY users.lastname,users.firstname
                              ORDER BY rating DESC
                              LIMIT 10";

          // $top_user_query = "SELECT DISTINCT 
          //                         users.lastname,
          //                         users.firstname,
          //                         round(sum(reviews.review_ratings)/count(review_ratings),1) AS rating
          //                     FROM 
          //                         users,babysitter_account,reviews 
          //                     WHERE 
          //                         users.user_id = babysitter_account.user_id 
          //                     AND 
          //                         reviews.babysitter_id = babysitter_account.babysitter_id
          //                     GROUP BY 
          //                         lastname,firstname
          //                     ORDER BY
          //                         rating DESC LIMIT 10";

          $top_user = mysqli_query($connect, $top_user_query);
          if (mysqli_num_rows($top_user) > 0) {

            echo '
                          <tr class="bg-dark text-white text-center">
                              <th style="max-width: 60px;">Babysitters Rank</th>
                              <th>Name</th>
                              <th>Ratings</th>
                          </tr>
                          ';

            while ($row = mysqli_fetch_assoc($top_user)) {

              $ranking += 1;

              echo '
                              <tr> 
                                  <td> ' . $ranking . '</td>
                                  <td> ' . $row['name'] . '</td>
                                  <td><b>' . $row['rating'] . '</b> / 5</td>
                              </tr>';
            }
            echo "</table>";
          }

          echo '<table class="table table-sm table-hover ">';

          $hired_count = mysqli_query($connect,"SELECT count(*) as count FROM application WHERE apply_status = 'hired' OR apply_status = 'done'");
          if (mysqli_num_rows($hired_count) > 0) {
            $total_hired = 0;
            while ($row = mysqli_fetch_assoc($hired_count)) {
              $total_hired += $row['count'];
            }
          }


          $age_query = "SELECT
                                count(age) as count,
                                  users.age as age
                              FROM application
                              INNER JOIN users ON users.user_id = application.babysitter_id
                              WHERE apply_status = 'hired' OR apply_status = 'done'
                              GROUP BY age";

          $age_user = mysqli_query($connect, $age_query);
          if (mysqli_num_rows($age_user) > 0) {

            echo '
                          <tr class="bg-dark text-white text-center">
                              <th>Babysitter Age</th>
                              <th>Hired Percentage</th>
                          </tr>
                          ';
            $total_post = 0;
            while ($row = mysqli_fetch_assoc($age_user)) {

              echo '
                              <tr> 
                                  <td> <b>' . $row['age'] . '</b> Yrs Old</td>
                                  <td><b>' . round((($row['count'] / $total_hired) * 100), 2) . '%</b></td>
                              </tr>';
            }
            echo "</table>";
          }

          ?>
        </div>
      </div>
    </div>


    <!-- ========= JS ========= -->
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>

      $('.reportMessage').on('click', function() {
          return confirm('Are you sure to Download all reports?');
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