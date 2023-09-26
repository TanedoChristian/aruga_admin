<!-- ========== BOOTSTRAP ========== -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- ========== CSS ========== -->
<link rel="stylesheet" href="css/index.css">
<!-- <link rel="stylesheet" href="css/index2.css"> FOR STICKY TOPBAR-->

<?php
include("connect.php");
error_reporting();
date_default_timezone_set('Asia/Manila');
$output = '';
$post_percent = array();
$total_post = null;

$page = $_GET['page'];

echo "<style>
            #table-header   {background-color:#EC878F}
            #sub-header     {background-color:#F74473}
            th,tr,td        {border: 1px solid black} 
            td,th           {padding:5px;}
            td              {color:black}
            th              {color:#fff;text-align:center}
            table           {border-collapse:collapse;background-color:#fff}
          </style>";


// JOB POST REPORT

if ($page == 'job') {

    // EXPORTING CONTENT INTO EXCEL/DOCUMENT FILE

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=jobpost-report.xls');

    echo "<div class='d-flex w-100 p-3'>";

    echo "  <div class='w-20 px-3'>";

    $count_query = "SELECT COUNT(*) as total_count from post";
    $count_result = mysqli_query($connect, $count_query);
    if ($count_result->num_rows > 0) {
        echo '
                        <table>
                            <tr id="sub-header" class=" text-center text-white">
                                <th colspan="3">Aruga</th>
                            </tr>
                            <tr id="table-header" class=" text-center text-white">
                                <th colspan="3">Job Post Report</th>
                            </tr>
                            ';

        while ($row = $count_result->fetch_assoc()) {
            $total_post = $row['total_count'];
            echo '
                        <tr> 
                            <td colspan="2">Date Generated</td>
                            <td>' . date("m-d-y h:i:s") . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Total Job Post</td>
                            <td> ' . $row['total_count'] . '</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr id="table-header" class=" text-white">
                            <th>Job Post Date</th>
                            <th>Count</th>
                            <th>Percentage</th>
                        </tr>
                        ';
        }
    }

    $job_query = "select count(jobpost_date) as count, month(jobpost_date) as date from post group by date asc";
    $job_result = mysqli_query($connect, $job_query);

    if (mysqli_num_rows($job_result) > 0) {

        while ($row = mysqli_fetch_assoc($job_result)) {

            $monthNum = $row['date'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

            $post_percent = round((($row['count'] / $total_post) * 100), 2);
            echo '
                        <tr> 
                            <td> ' . $monthName . '</td>
                            <td> ' . $row['count'] . '</td>
                            <td> ' . $post_percent . ' %</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>';
    }

    $status_query = "select (select count(jobpost_status) from post) as total_status,jobpost_status, count(jobpost_status) as jobpost_count  from post group by jobpost_status";
    $status_result = mysqli_query($connect, $status_query);

    if (mysqli_num_rows($status_result) > 0) {

        echo '<tr id="table-header" class=" text-white">
                        <th>Job Status</th>
                        <th>Count</th>
                        <th>Percentage</th>
                    </tr>
                        ';

        while ($row = mysqli_fetch_assoc($status_result)) {

            echo '
                        <tr> 
                            <td> ' . $row['jobpost_status'] . '</td>
                            <td> ' . $row['jobpost_count'] . '</td>
                            <td> ' . round((($row['jobpost_count'] / $row['total_status']) * 100), 2) . ' %</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    </table>';
    }
    echo "</div>
          <div class='w-80 px-3'>
          <table></table>
          </div>
    </div>";
}

// BLOG POST REPORT

if ($page == 'blog') {


    // EXPORTING CONTENT INTO EXCEL/DOCUMENT FILE

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=blogpost-report.xls');

    echo "<div class='d-flex w-100 p-3'>";

    echo "  <div class='w-20 px-3'>";

    $count_query = "SELECT COUNT(*) as total_count from blog";
    $count_result = mysqli_query($connect, $count_query);
    if ($count_result->num_rows > 0) {
        echo '
                        <table>
                            <tr id="sub-header" class=" text-center text-white">
                                <th colspan="3">Aruga</th>
                            </tr>
                            <tr id="table-header" class=" text-center text-white">
                                <th colspan="3">Blog Post Report</th>
                            </tr>
                            ';

        while ($row = $count_result->fetch_assoc()) {
            $total_post = $row['total_count'];
            echo '
                        <tr> 
                            <td colspan="2">Date Generated</td>
                            <td>' . date("m-d-y h:i:s") . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Total Job Post</td>
                            <td> ' . $row['total_count'] . '</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr id="table-header" class=" text-white">
                            <th>Blog Post Date</th>
                            <th>Count</th>
                            <th>Percentage</th>
                        </tr>
                        ';
        }
    }

    $blog_query = "select count(blog_id) as blog_count, month(blog_postdate) as date from blog group by date asc";
    $blog_result = mysqli_query($connect, $blog_query);

    if (mysqli_num_rows($blog_result) > 0) {

        while ($row = mysqli_fetch_assoc($blog_result)) {

            $monthNum = $row['date'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

            $post_percent = round((($row['blog_count'] / $total_post) * 100), 2);
            echo '
                        <tr> 
                            <td> ' . $monthName . '</td>
                            <td> ' . $row['blog_count'] . '</td>
                            <td> ' . $post_percent . ' %</td>
                        </tr>';
        }

        echo '<tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>';
    }

    $status_query = "select (select count(blog_deleted) from blog) as total_status, blog_deleted, count(blog_deleted) as blog_count  from blog group by blog_deleted";
    $status_result = mysqli_query($connect, $status_query);

    if (mysqli_num_rows($status_result) > 0) {

        echo '<tr id="table-header" class=" text-white">
                            <th>Blog Post Status</th>
                            <th>Count</th>
                            <th>Percentage</th>
                        </tr>
                        ';

        while ($row = mysqli_fetch_assoc($status_result)) {

            echo '
                        <tr> 
                            <td> ' . $row['blog_deleted'] . '</td>
                            <td> ' . $row['blog_count'] . '</td>
                            <td> ' . round((($row['blog_count'] / $row['total_status']) * 100), 2) . ' %</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    </table>';
    }

    echo "</div>
          <div class='w-80 px-3'>
          <table></table>
          </div>
    </div>";
}

// REVIEW REPORT

if ($page == 'review') {

    // EXPORTING CONTENT INTO EXCEL/DOCUMENT FILE

    // header('Content-Type: application/xls');
    // header('Content-Disposition: attachment; filename=review-report.xls');

    echo "<div class='d-flex w-100 p-3'>";

    echo "  <div class='w-20 px-3'>";

    $ranking = 0;
    $count_query = "SELECT COUNT(*) as total_count from reviews";
    $count_result = mysqli_query($connect, $count_query);
    if ($count_result->num_rows > 0) {
        echo '
                        <table>
                            <tr id="sub-header" class=" text-center text-white">
                                <th colspan="4">Aruga</th>
                            </tr>
                            <tr id="table-header" class=" text-center text-white">
                                <th colspan="4">Review Report</th>
                            </tr>
                            ';

        while ($row = $count_result->fetch_assoc()) {
            $total_review = $row['total_count'];
            echo '
                        <tr> 
                            <td colspan="2">Date Generated</td>
                            <td colspan="2">' . date("m-d-y h:i:s") . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Total Reviews</td>
                            <td colspan="2"> ' . $row['total_count'] . '</td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr id="table-header" class=" text-white">
                            <th>Reviews Date</th>
                            <th>Count</th>
                            <th colspan="2">Percentage</th>
                        </tr>
                        ';
        }
    }

    $review_query = "select count(review_date) as review_count , month(review_date) as date from reviews group by date asc";
    $review_result = mysqli_query($connect, $review_query);

    if (mysqli_num_rows($review_result) > 0) {

        while ($row = mysqli_fetch_assoc($review_result)) {

            $monthNum = $row['date'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

            $review_percent = round((($row['review_count'] / $total_review) * 100), 2);
            echo '
                        <tr> 
                            <td> ' . $monthName . '</td>
                            <td> ' . $row['review_count'] . '</td>
                            <td colspan="2"> ' . $review_percent . ' %</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }

    $status_query = "select review_ratings, count(review_ratings) as review_count  from reviews group by review_ratings desc";
    $status_result = mysqli_query($connect, $status_query);

    if (mysqli_num_rows($status_result) > 0) {

        echo '<tr id="table-header" class=" text-white">
                            <th>Review Ratings</th>
                            <th>Count</th>
                            <th colspan="2">Percentage</th>
                        </tr>
                        ';

        while ($row = mysqli_fetch_assoc($status_result)) {

            echo '
                        <tr> 
                            <td> ' . $row['review_ratings'] . ' Stars</td>
                            <td> ' . $row['review_count'] . '</td>
                            <td colspan="2"> ' . round((($row['review_count'] / $total_review) * 100), 2) . ' %</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }

    $top_user_query = "SELECT DISTINCT 
                            users.lastname,
                            users.firstname,
                            round(sum(reviews.review_ratings)/count(review_ratings),1) AS rating
                        FROM 
                            users,babysitter_account,reviews 
                        WHERE 
                            users.user_id = babysitter_account.user_id 
                        AND 
                            reviews.babysitter_id = babysitter_account.babysitter_id
                        GROUP BY 
                            lastname,firstname
                        ORDER BY
                            rating DESC";

    $top_user = mysqli_query($connect, $top_user_query);

    if (mysqli_num_rows($top_user) > 0) {

        echo '
                    <tr>
                        <th id="sub-header" colspan="4" class=" text-center text-white">Top Babysitters</th>
                    </tr>
                    <tr id="table-header" class=" text-white">
                        <th>Ranking</th>
                        <th>Name</th>
                        <th>Ratings</th>
                    </tr>
                    ';

        while ($row = mysqli_fetch_assoc($top_user)) {

            $ranking += 1;

            echo '
                        <tr> 
                            <td> ' . $ranking . '</td>
                            <td> ' . $row['firstname'] . " " . $row['lastname'] . '</td>
                            <td> ' . $row['rating'] . ' stars</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>';
    }

    $reviewer_sql = "SELECT DISTINCT
                        CONCAT(u1.firstname, ' ', u1.lastname) AS babysitter,
                        CONCAT(u2.firstname, ' ', u2.lastname) AS parent,
                        review_ratings,
                        review_date
                    FROM 
                        reviews r
                    INNER JOIN 
                        users u1 ON u1.user_id = r.babysitter_id
                    INNER JOIN 
                        users u2 ON u2.user_id = r.parent_id
                    GROUP BY
                        review_ratings";

    $reviewer_query = mysqli_query($connect, $reviewer_sql);

    if (mysqli_num_rows($reviewer_query) > 0) {

        echo '
                    <tr>
                        <th id="sub-header" colspan="4" class=" text-center text-white">User Reviewed List</th>
                    </tr>
                    <tr id="table-header" class=" text-white">
                        <th>Babysitter</th>
                        <th>Parent</th>
                        <th>Ratings</th>
                        <th>Date</th>
                    </tr>
                    ';

        while ($row = mysqli_fetch_assoc($reviewer_query)) {

            $ranking += 1;

            echo '
                        <tr> 
                            <td> ' . $row['babysitter'] . '</td>
                            <td> ' . $row['parent'] . '</td>
                            <td> ' . $row['review_ratings'] . '</td>
                            <td> ' . $row['review_date'] . '</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }

    echo "
            </table>
          </div>
          <div class='w-80 px-3'>
          <table></table>
          </div>
    </div>";
}

// JOB APPLICATION REPORT

if ($page == 'application') {

    // EXPORTING CONTENT INTO EXCEL/DOCUMENT FILE

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=blogpost-report.xls');

    echo "<div class='d-flex w-100 p-3'>";

    echo "  <div class='w-20 px-3'>";

    $count_query = "SELECT COUNT(*) as total_count from `application`";
    $count_result = mysqli_query($connect, $count_query);

    if ($count_result->num_rows > 0) {
        echo '
                        <table>
                            <tr id="sub-header" class=" text-center text-white">
                                <th colspan="3">Aruga</th>
                            </tr>
                            <tr id="table-header" class=" text-center text-white">
                                <th colspan="3">Job Application Report</th>
                            </tr>
                            ';

        while ($row = $count_result->fetch_assoc()) {
            $total_post = $row['total_count'];
            echo '
                        <tr> 
                            <td colspan="2">Date Generated</td>
                            <td>' . date("m-d-y h:i:s") . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Total Job Post</td>
                            <td> ' . $total_post . '</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr id="table-header" class=" text-white">
                            <th>Application Date</th>
                            <th>Count</th>
                            <th>Percentage</th>
                        </tr>
                        ';
        }
    }

    $application_query = "select count(apply_date) as apply_count , month(apply_date) as date from application group by date asc";
    $application_result = mysqli_query($connect, $application_query);

    if (mysqli_num_rows($application_result) > 0) {
        while ($row = mysqli_fetch_assoc($application_result)) {

            $monthNum = $row['date'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

            $application_percent = round((($row['apply_count'] / $total_post) * 100), 2);
            echo '
                        <tr> 
                            <td> ' . $monthName . '</td>
                            <td> ' . $row['apply_count'] . '</td>
                            <td> ' . $application_percent . ' %</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>';
    }

    $status_query = "select apply_status, count(apply_status) as apply_count  from application group by apply_status desc";
    $status_result = mysqli_query($connect, $status_query);

    if (mysqli_num_rows($status_result) > 0) {

        echo '<tr id="table-header" class=" text-white">
                        <th>Application Status</th>
                        <th>Count</th>
                        <th>Percentage</th>
                    </tr>
                        ';

        while ($row = mysqli_fetch_assoc($status_result)) {

            echo '
                        <tr> 
                            <td> ' . $row['apply_status'] . '</td>
                            <td> ' . $row['apply_count'] . '</td>
                            <td> ' . round((($row['apply_count'] / $total_post) * 100), 2) . ' %</td>
                           
                        </tr>';
        }

        echo '<tr>
                        <td colspan="3">&nbsp;</td>
                    </tr></table>';
    }
    echo "</div>
          <div class='w-80 px-3'>
          <table></table>
          </div>
    </div>";
}


// Subscription REPORT

if ($page == 'subscription') {

    // EXPORTING CONTENT INTO EXCEL/DOCUMENT FILE

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=subscription-report.xls');

    echo "<div class='d-flex w-100 p-3'>";

    echo "  <div class='w-20 px-3'>";
    $count_query = "SELECT 
                        COUNT(*) as total_count,
                        (SELECT SUM(amount) as partial from subscription where status != 'pending') as partial,
                        (SELECT SUM(amount) as revenue from subscription where status = 'pending') as revenue
                    from `subscription`";
    $count_result = mysqli_query($connect, $count_query);

    if ($count_result->num_rows > 0) {
        echo '
                        <table>
                            <tr id="sub-header" class=" text-center text-white">
                                <th colspan="4">Aruga</th>
                            </tr>
                            <tr id="table-header" class=" text-center text-white">
                                <th colspan="4">Subscription Report</th>
                            </tr>
                            ';

        while ($row = $count_result->fetch_assoc()) {
            $total_post = $row['total_count'];
            $total = $row['partial'] + $row['revenue'];
            echo '
                        <tr> 
                            <td colspan="2">Date Generated</td>
                            <td colspan="2">' . date("m-d-y h:i:s") . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Total Job Post</td>
                            <td colspan="2"> ' . $total_post . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Partial Earnings</td>
                            <td colspan="2"> &#8369;' . $row['partial'] . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Deferred Revenue</td>
                            <td colspan="2"> &#8369;' . $row['revenue'] . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Total</td>
                            <td colspan="2"> &#8369;' . $total . '</td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        
                        ';
        }
    }

    $date_sql = "SELECT 
                    MONTH(date_start) as month,
                    count(date_start) as count,
                    SUM(amount) AS total_amount 
                FROM subscription 
                GROUP BY month;";

    $date_query = mysqli_query($connect, $date_sql);
    $counts = null;
    $t_earn = null;
    $t_per = null;

    if (mysqli_num_rows($date_query) > 0) {

        echo '
                    <tr>
                        <th colspan="4" id="sub-header">Subscription Started</th>
                    </tr>
                    <tr id="table-header" class=" text-white">
                        <th>Month</th>
                        <th>Count</th>
                        <th>Earnings</th>
                        <th>Percentage</th>
                    </tr>
                        ';

        while ($row = mysqli_fetch_assoc($date_query)) {

            $monthNum = $row['month'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
            $counts += $row['count'];

            $t_earn += $row['total_amount'];
            $t_per +=  (($row['count'] / $total_post) * 100);
            $total = array();
            $total = ["<b>Total</b>", $counts, "&#8369;" . $t_earn . ".00", $t_per . " %"];

            echo '
                                        <tr> 
                                            <td> ' . $monthName . '</td>
                                            <td> ' . $row['count'] . '</td>
                                            <td> &#8369;' . $row['total_amount'] . '</td>
                                            <td> ' . round((($row['count'] / $total_post) * 100), 2) . ' %</td>
                                        </tr>';
        }
        echo '<tr>';
        foreach ($total as $result) {
            echo '<td>' . $result . '</td>';
        }
        echo '</tr>';

        mysqli_free_result($date_query);
        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }

    // EXPIRED SUBSCRIPTION

    $date_sql = "SELECT 
                    MONTH(date_ended) as month,
                    count(date_ended) as count
                FROM subscription 
                GROUP BY month;";
    $date_query = mysqli_query($connect, $date_sql);

    if (mysqli_num_rows($date_query) > 0) {

        echo '
                    <tr>
                        <th colspan="4" id="sub-header">Subscription Ended</th>
                    </tr>
                    <tr id="table-header" class=" text-white">
                        <th>Month</th>
                        <th>Count</th>
                        <th colspan="2">Percentage</th>
                    </tr>
                    ';

        while ($row = mysqli_fetch_array($date_query)) {

            $monthNum1 = $row['month'];
            $monthName1 = date("F", mktime(0, 0, 0, $monthNum1, 10));

            echo '
                        <tr> 
                            <td> ' . $monthName1 . '</td>
                            <td> ' . $row['count'] . '</td>
                            <td colspan="2"> ' . round((($row['count'] / $total_post) * 100), 2) . ' %</td>
                            
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    ';
    }

    $subs_query = "select status, count(status) as status_count  from subscription group by status desc";
    $subs_result = mysqli_query($connect, $subs_query);

    if (mysqli_num_rows($subs_result) > 0) {

        echo '
                        <tr id="table-header" class=" text-white">
                            <th>Status</th>
                            <th>Count</th>
                            <th colspan="2">Percentage</th>
                        </tr>
        ';

        while ($row = mysqli_fetch_assoc($subs_result)) {

            $subs_percent = round((($row['status_count'] / $total_post) * 100), 2);
            echo '
                        <tr> 
                            <td> ' . $row['status'] . '</td>
                            <td> ' . $row['status_count'] . '</td>
                            <td colspan="2"> ' . $subs_percent . ' %</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }

    $user_sub = "SELECT DISTINCT 
                    CONCAT(users.firstname,' ',users.lastname) as name,
                    date_start,
                    amount,
                    subscription.status
                FROM 
                    users
                INNER JOIN subscription ON subscription.user_id = users.user_id";

    $user_sub_query = mysqli_query($connect, $user_sub);

    if (mysqli_num_rows($user_sub_query) > 0) {

        echo '
                        <tr>
                            <th colspan="4" id="sub-header">Subscriber List</th>
                        </tr>
                        <tr id="table-header" class=" text-white">
                            <th>Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
        ';

        while ($row = mysqli_fetch_assoc($user_sub_query)) {

            echo '
                        <tr> 
                            <td> ' . $row['name'] . ' </td>
                            <td> ' . $row['date_start'] . '</td>
                            <td> &#8369;' . $row['amount'] . '</td>
                            <td> ' . $row['status'] . '</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }

    echo "</table>
          </div>
          <div class='w-80 px-3'>
          <table></table>
          </div>
    </div>";
}

// VIEW ALL REPORT----------------------------------------------------------------------------------

if ($page == 'home') {
    // EXPORTING CONTENT INTO EXCEL/DOCUMENT FILE
    $filter_month = $_GET['m'];
    $filter_year = $_GET['y'];
    $month_name = '';

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=all-report.xls');

    echo "<div class='d-flex w-100 '>";
    echo "<div class='w-20 px-3'>";
    // JOB POST REPORT

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $count_query = "SELECT COUNT(*) AS total_count FROM post WHERE YEAR(jobpost_date) = $filter_year AND MONTH(jobpost_date) = $filter_month;";
        $month_name = date('F', mktime(0, 0, 0, $filter_month, 1));
    } else if (strlen($filter_year) > 0) {
        $count_query = "SELECT COUNT(*) AS total_count FROM post WHERE YEAR(jobpost_date) = $filter_year;";
    } else {
        $count_query = "SELECT COUNT(*) as total_count from post";
    }

    $count_result = mysqli_query($connect, $count_query);

    if ($count_result->num_rows > 0) {
        echo '
                            <table>
                                <tr id="sub-header" class=" text-center text-white"> 
                                    <th colspan="4">Aruga</th>
                                </tr>
                                <tr> 
                                    <td colspan="2">Date Generated</td>
                                    <td colspan="2">' . date("m-d-y h:i:s") . '</td>
                                </tr>
                                <tr> 
                                    <td colspan="2">Filter Date</td>
                                    <td colspan="2"> ' . $month_name . " - " . $filter_year . '</td>
                                </tr>
                                <tr id="sub-header" class=" text-center text-white">
                                    <th colspan="4">Job Post Report</th>
                                </tr>
                                ';

        while ($row = $count_result->fetch_assoc()) {
            $total_post = $row['total_count'];
            echo '
                            
                            <tr> 
                                <td colspan="2">Total Job Post</td>
                                <td colspan="2"> ' . $row['total_count'] . '</td>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                            <tr id="table-header" class=" text-white">
                                <th>Job Post Date</th>
                                <th>Count</th>
                                <th colspan="2">Percentage</th>
                            </tr>
            ';
        }
    }

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $job_query = "select count(jobpost_date) as count, month(jobpost_date) as date from post WHERE YEAR(jobpost_date) = $filter_year AND MONTH(jobpost_date) = $filter_month group by date asc";
    } else if (strlen($filter_year) > 0) {
        $job_query = "select count(jobpost_date) as count, month(jobpost_date) as date from post WHERE YEAR(jobpost_date) = $filter_year group by date asc";
    } else {
        $job_query = "select count(jobpost_date) as count, month(jobpost_date) as date from post group by date asc";
    }


    $job_result = mysqli_query($connect, $job_query);

    if (mysqli_num_rows($job_result) > 0) {

        while ($row = mysqli_fetch_assoc($job_result)) {

            $monthNum = $row['date'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

            $post_percent = round((($row['count'] / $total_post) * 100), 2);
            echo '
                            <tr> 
                                <td> ' . $monthName . '</td>
                                <td> ' . $row['count'] . '</td>
                                <td colspan="2"> ' . $post_percent . ' %</td>
                            </tr>';
        }

        echo '<tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>';
    }

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $status_query = "select (select count(jobpost_status) from post) as total_status,jobpost_status, count(jobpost_status) as jobpost_count from post WHERE YEAR(jobpost_date) = $filter_year AND MONTH(jobpost_date) = $filter_month group by jobpost_status";
    } else if (strlen($filter_year) > 0) {
        $status_query = "select (select count(jobpost_status) from post) as total_status,jobpost_status, count(jobpost_status) as jobpost_count from post WHERE YEAR(jobpost_date) = $filter_year group by jobpost_status";
    } else {
        $status_query = "select (select count(jobpost_status) from post) as total_status,jobpost_status, count(jobpost_status) as jobpost_count from post group by jobpost_status";
    }


    $status_result = mysqli_query($connect, $status_query);

    if (mysqli_num_rows($status_result) > 0) {

        echo '<tr id="table-header" class=" text-white">
                            <th>Job Status</th>
                            <th>Count</th>
                            <th colspan="2">Percentage</th>
                        </tr>
                            ';

        while ($row = mysqli_fetch_assoc($status_result)) {

            echo '
                        <tr> 
                             <td> ' . $row['jobpost_status'] . '</td>
                             <td> ' . $row['jobpost_count'] . '</td>
                            <td colspan="2"> ' . round((($row['jobpost_count'] / $total_post) * 100), 2) . ' %</td>
                        </tr>';
        }

        echo '      <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>';
    }

    // BLOG POST REPORT 

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $count_query = "SELECT COUNT(*) as total_count from blog WHERE YEAR(blog_postdate) = $filter_year AND MONTH(blog_postdate) = $filter_month";
    } else if (strlen($filter_year) > 0) {
        $count_query = "SELECT COUNT(*) as total_count from blog WHERE YEAR(blog_postdate) = $filter_year";
    } else {
        $count_query = "SELECT COUNT(*) as total_count from blog";
    }

    $count_result = mysqli_query($connect, $count_query);
    if ($count_result->num_rows > 0) {
        echo '
                                <tr id="sub-header" class=" text-center text-white">
                                    <th colspan="4">Blog Post Report</th>
                                </tr>
                                ';

        while ($row = $count_result->fetch_assoc()) {
            $total_post = $row['total_count'];
            echo '
                            <tr> 
                                <td colspan="2">Total Job Post</td>
                                <td colspan="2"> ' . $row['total_count'] . '</td>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                            <tr id="table-header" class=" text-white">
                                <th>Blog Post Date</th>
                                <th>Count</th>
                                <th colspan="2">Percentage</th>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                            ';
        }
    }

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $blog_query = "select count(blog_id) as blog_count, month(blog_postdate) as date from blog WHERE YEAR(blog_postdate) = $filter_year AND MONTH(blog_postdate) = $filter_month group by date asc";
    } else if (strlen($filter_year) > 0) {
        $blog_query = "select count(blog_id) as blog_count, month(blog_postdate) as date from blog WHERE YEAR(blog_postdate) = $filter_year group by date asc";
    } else {
        $blog_query = "select count(blog_id) as blog_count, month(blog_postdate) as date from blog group by date asc";
    }

    $blog_result = mysqli_query($connect, $blog_query);

    if (mysqli_num_rows($blog_result) > 0) {

        while ($row = mysqli_fetch_assoc($blog_result)) {

            $monthNum = $row['date'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

            $post_percent = round((($row['blog_count'] / $total_post) * 100), 2);
            echo '
                            <tr> 
                                <td> ' . $monthName . '</td>
                                <td> ' . $row['blog_count'] . '</td>
                                <td colspan="2"> ' . $post_percent . ' %</td>
                            </tr>';
        }

        echo '<tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>';
    }

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $status_query = "select (select count(blog_deleted) from blog) as total_status, blog_deleted, count(blog_deleted) as blog_count  from blog WHERE YEAR(blog_postdate) = $filter_year AND MONTH(blog_postdate) = $filter_month group by blog_deleted";
    } else if (strlen($filter_year) > 0) {
        $status_query = "select (select count(blog_deleted) from blog) as total_status, blog_deleted, count(blog_deleted) as blog_count  from blog WHERE YEAR(blog_postdate) = $filter_year group by blog_deleted";
    } else {
        $status_query = "select (select count(blog_deleted) from blog) as total_status, blog_deleted, count(blog_deleted) as blog_count  from blog group by blog_deleted";
    }

    $status_result = mysqli_query($connect, $status_query);

    if (mysqli_num_rows($status_result) > 0) {

        echo '<tr id="table-header" class=" text-white">
                                <th>Blog Post Status</th>
                                <th>Count</th>
                                <th colspan="2">Percentage</th>
                            </tr>
                            ';

        while ($row = mysqli_fetch_assoc($status_result)) {

            echo '
                            <tr> 
                                <td> ' . $row['blog_deleted'] . '</td>
                                <td> ' . $row['blog_count'] . '</td>
                                <td colspan="2"> ' . round((($row['blog_count'] / $row['total_status']) * 100), 2) . ' %</td>
                            </tr>';
        }

        echo '         <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                    </table>';
    }
    echo "</div>";
    echo "<div class='w-20 px-3'>";
    // REVIEW REPORT

    $ranking = 0;

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $count_query = "SELECT COUNT(*) as total_count from reviews WHERE YEAR(review_date) = $filter_year AND MONTH(review_date) = $filter_month";
    } else if (strlen($filter_year) > 0) {
        $count_query = "SELECT COUNT(*) as total_count from reviews WHERE YEAR(review_date) = $filter_year";
    } else {
        $count_query = "SELECT COUNT(*) as total_count from reviews";
    }

    $count_result = mysqli_query($connect, $count_query);
    if ($count_result->num_rows > 0) {
        echo '
                            <table>
                                <tr id="sub-header" class=" text-center text-white">
                                    <th colspan="4">Review Report</th>
                                </tr>
                                ';

        while ($row = $count_result->fetch_assoc()) {
            $total_review = $row['total_count'];
            echo '
                            <tr> 
                                <td colspan="2">Total Reviews</td>
                                <td colspan="2"> ' . $row['total_count'] . '</td>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                            <tr id="table-header" class=" text-white">
                                <th>Reviews Date</th>
                                <th>Count</th>
                                <th colspan="2">Percentage</th>
                            </tr>
                            ';
        }
    }

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $review_query = "select count(review_date) as review_count , month(review_date) as date from reviews WHERE YEAR(review_date) = $filter_year AND MONTH(review_date) = $filter_month group by date asc";
    } else if (strlen($filter_year) > 0) {
        $review_query = "select count(review_date) as review_count , month(review_date) as date from reviews WHERE YEAR(review_date) = $filter_year group by date asc";
    } else {
        $review_query = "select count(review_date) as review_count , month(review_date) as date from reviews group by date asc";
    }

    $review_result = mysqli_query($connect, $review_query);

    if (mysqli_num_rows($review_result) > 0) {

        while ($row = mysqli_fetch_assoc($review_result)) {

            $monthNum = $row['date'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

            $review_percent = round((($row['review_count'] / $total_review) * 100), 2);
            echo '
                            <tr> 
                                <td> ' . $monthName . '</td>
                                <td> ' . $row['review_count'] . '</td>
                                <td colspan="2"> ' . $review_percent . ' %</td>
                            </tr>';
        }

        echo '          <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>';
    } else {
        echo '<tr>
            <td colspan="4">No data Found!</td>
        </tr>';
    }

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $status_query = "select review_ratings, count(review_ratings) as review_count  from reviews WHERE YEAR(review_date) = $filter_year AND MONTH(review_date) = $filter_month group by review_ratings desc";
    } else if (strlen($filter_year) > 0) {
        $status_query = "select review_ratings, count(review_ratings) as review_count  from reviews WHERE YEAR(review_date) = $filter_year group by review_ratings desc";
    } else {
        $status_query = "select review_ratings, count(review_ratings) as review_count  from reviews group by review_ratings desc";
    }

    $status_result = mysqli_query($connect, $status_query);

    if (mysqli_num_rows($status_result) > 0) {

        echo '<tr id="table-header" class=" text-white">
                                <th>Review Ratings</th>
                                <th>Count</th>
                                <th colspan="2">Percentage</th>
                            </tr>
                            ';

        while ($row = mysqli_fetch_assoc($status_result)) {

            echo '
                            <tr> 
                                <td> ' . $row['review_ratings'] . ' Stars</td>
                                <td> ' . $row['review_count'] . '</td>
                                <td colspan="2"> ' . round((($row['review_count'] / $total_review) * 100), 2) . ' %</td>
                            </tr>';
        }

        echo '<tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>';
    } else {
    }


    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $reviewer_sql = "SELECT DISTINCT
                        CONCAT(u1.firstname, ' ', u1.lastname) AS babysitter,
                        CONCAT(u2.firstname, ' ', u2.lastname) AS parent,
                        review_ratings,
                        review_date
                    FROM 
                        reviews r
                    INNER JOIN 
                        users u1 ON u1.user_id = r.babysitter_id
                    INNER JOIN 
                        users u2 ON u2.user_id = r.parent_id
                    WHERE YEAR(review_date) = $filter_year AND MONTH(review_date) = $filter_month
                    GROUP BY
                        review_ratings";
    } else if (strlen($filter_year) > 0) {
        $reviewer_sql = "SELECT DISTINCT
                        CONCAT(u1.firstname, ' ', u1.lastname) AS babysitter,
                        CONCAT(u2.firstname, ' ', u2.lastname) AS parent,
                        review_ratings,
                        review_date
                    FROM 
                        reviews r
                    INNER JOIN 
                        users u1 ON u1.user_id = r.babysitter_id
                    INNER JOIN 
                        users u2 ON u2.user_id = r.parent_id
                    WHERE 
                        YEAR(review_date) = $filter_year
                    GROUP BY
                        review_ratings";
    } else {
        $reviewer_sql = "SELECT DISTINCT
                        CONCAT(u1.firstname, ' ', u1.lastname) AS babysitter,
                        CONCAT(u2.firstname, ' ', u2.lastname) AS parent,
                        review_ratings,
                        review_date
                    FROM 
                        reviews r
                    INNER JOIN 
                        users u1 ON u1.user_id = r.babysitter_id
                    INNER JOIN 
                        users u2 ON u2.user_id = r.parent_id
                    GROUP BY
                        review_ratings";
    }



    $reviewer_query = mysqli_query($connect, $reviewer_sql);

    if (mysqli_num_rows($reviewer_query) > 0) {

        echo '
                    <tr>
                        <th id="sub-header" colspan="4" class=" text-center text-white">User Reviewed List</th>
                    </tr>
                    <tr id="table-header" class=" text-white">
                        <th>Babysitter</th>
                        <th>Parent</th>
                        <th>Ratings</th>
                        <th>Date</th>
                    </tr>
                    ';

        while ($row = mysqli_fetch_assoc($reviewer_query)) {

            $ranking += 1;

            echo '
                        <tr> 
                            <td> ' . $row['babysitter'] . '</td>
                            <td> ' . $row['parent'] . '</td>
                            <td> ' . $row['review_ratings'] . '</td>
                            <td> ' . $row['review_date'] . '</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }
    // JOB APPLICATION REPORT

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $count_query = "SELECT COUNT(*) AS total_count FROM `application` WHERE YEAR(apply_date) = $filter_year AND MONTH(apply_date) = $filter_month;";
    } else if (strlen($filter_year) > 0) {
        $count_query = "SELECT COUNT(*) AS total_count FROM `application` WHERE YEAR(apply_date) = $filter_year;";
    } else {
        $count_query = "SELECT COUNT(*) as total_count from `application`";
    }

    $count_result = mysqli_query($connect, $count_query);

    if ($count_result->num_rows > 0) {
        echo '
                                <tr id="sub-header" class=" text-center text-white">
                                    <th colspan="4">Job Application Report</th>
                                </tr>
                                ';

        while ($row = $count_result->fetch_assoc()) {
            $total_post = $row['total_count'];
            echo '
                            <tr> 
                                <td colspan="2">Total Job Post</td>
                                <td colspan="2"> ' . $total_post . '</td>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                            <tr id="table-header" class=" text-white">
                                <th>Application Date</th>
                                <th>Count</th>
                                <th colspan="2">Percentage</th>
                            </tr>
                            ';
        }
    }

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $application_query = "select count(apply_date) as apply_count , month(apply_date) as date from application WHERE YEAR(apply_date) = $filter_year AND MONTH(apply_date) = $filter_month group by date asc";
    } else if (strlen($filter_year) > 0) {
        $application_query = "select count(apply_date) as apply_count , month(apply_date) as date from application WHERE YEAR(apply_date) = $filter_year group by date asc";
    } else {
        $application_query = "select count(apply_date) as apply_count , month(apply_date) as date from application group by date asc";
    }

    $application_result = mysqli_query($connect, $application_query);

    if (mysqli_num_rows($application_result) > 0) {
        while ($row = mysqli_fetch_assoc($application_result)) {

            $monthNum = $row['date'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

            $application_percent = round((($row['apply_count'] / $total_post) * 100), 2);
            echo '
                            <tr> 
                                <td> ' . $monthName . '</td>
                                <td> ' . $row['apply_count'] . '</td>
                                <td colspan="2"> ' . $application_percent . ' %</td>
                            </tr>';
        }

        echo '<tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>';
    }

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $status_query = "select apply_status, count(apply_status) as apply_count from application WHERE YEAR(apply_date) = $filter_year AND MONTH(apply_date) = $filter_month group by apply_status desc";
    } else if (strlen($filter_year) > 0) {
        $status_query = "select apply_status, count(apply_status) as apply_count from application WHERE YEAR(apply_date) = $filter_year group by apply_status desc";
    } else {
        $status_query = "select apply_status, count(apply_status) as apply_count from application group by apply_status desc";
    }

    $status_result = mysqli_query($connect, $status_query);

    if (mysqli_num_rows($status_result) > 0) {

        echo '<tr id="table-header" class=" text-white">
                            <th>Application Status</th>
                            <th>Count</th>
                            <th colspan="2">Percentage</th>
                        </tr>
                            ';

        while ($row = mysqli_fetch_assoc($status_result)) {

            echo '
                            <tr> 
                                <td> ' . $row['apply_status'] . '</td>
                                <td> ' . $row['apply_count'] . '</td>
                                <td colspan="2"> ' . round((($row['apply_count'] / $total_post) * 100), 2) . ' %</td>
                               
                            </tr>';
        }

        echo '      <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                    </table>';
    }
    echo "</div>";

    // SUBSCRIPTION -------------------------------------------------------
    echo "  <div class='w-20 px-3'>";

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $count_query = "SELECT 
                        COUNT(*) as total_count,
                        (SELECT SUM(amount) as partial from subscription where status != 'pending' AND YEAR(date_start) = 2023 AND MONTH(date_start) = 5) as partial,
                        (SELECT SUM(amount) as revenue from subscription where status = 'pending' AND YEAR(date_start) = 2023 AND MONTH(date_start) = 5) as revenue
                        from `subscription`
                        WHERE YEAR(date_start) = $filter_year
                        AND MONTH(date_start) = $filter_month";
    } else if (strlen($filter_year) > 0) {
        $count_query = "SELECT 
                            COUNT(*) as total_count,
                            (SELECT SUM(amount) as partial from subscription where status != 'pending' AND YEAR(date_start) = $filter_year) as partial,
                            (SELECT SUM(amount) as revenue from subscription where status = 'pending' AND YEAR(date_start) = $filter_year) as revenue
                        from `subscription`
                        WHERE YEAR(date_start) = $filter_year";
    } else {
        $count_query = "SELECT 
                            COUNT(*) as total_count,
                            (SELECT SUM(amount) as partial from subscription where status != 'pending') as partial,
                            (SELECT SUM(amount) as revenue from subscription where status = 'pending') as revenue
                        from `subscription`";
    }

    $count_result = mysqli_query($connect, $count_query);

    if ($count_result->num_rows > 0) {
        echo '
                        <table>
                            <tr id="table-header" class=" text-center text-white">
                                <th colspan="4" id="sub-header">Subscription Report</th>
                            </tr>
                            ';

        while ($row = $count_result->fetch_assoc()) {
            $total_post = $row['total_count'];
            $total_amount = $row['partial'] + $row['revenue'];
            echo '
                        <tr> 
                            <td colspan="2">Total Subscriptions</td>
                            <td colspan="2"> ' . $total_post . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Partial Earnings</td>
                            <td colspan="2"> &#8369;' . $row['partial'] . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Deferred Revenue</td>
                            <td colspan="2"> &#8369;' . $row['revenue'] . '</td>
                        </tr>
                        <tr> 
                            <td colspan="2">Total</td>
                            <td colspan="2"> &#8369;' . $total_amount . '</td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        
                        ';
        }
    }

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $date_sql = "SELECT 
                    MONTH(date_start) as `month`,
                    count(date_start) as count,
                    SUM(amount) AS total_amount 
                FROM subscription 
                WHERE YEAR(date_start) = $filter_year
                AND MONTH(date_start) = $filter_month
                GROUP BY `month`
                order by `month` asc";
    } else if (strlen($filter_year) > 0) {
        $date_sql = "SELECT 
                    MONTH(date_start) as month,
                    count(date_start) as count,
                    SUM(amount) AS total_amount 
                FROM subscription 
                WHERE YEAR(date_start) = $filter_year
                GROUP BY `month`
                order by `month` asc";
    } else {
        $date_sql = "SELECT 
                    MONTH(date_start) as month,
                    count(date_start) as count,
                    SUM(amount) AS total_amount 
                FROM subscription 
                GROUP BY month;";
    }

    $date_query = mysqli_query($connect, $date_sql);
    $counts = null;
    $t_earn = null;
    $t_per = null;

    if (mysqli_num_rows($date_query) > 0) {

        echo '
                    <tr>
                        <th colspan="4" id="sub-header">Subscription Started</th>
                    </tr>
                    <tr id="table-header" class=" text-white">
                        <th>Month</th>
                        <th>Count</th>
                        <th>Earnings</th>
                        <th>Percentage</th>
                    </tr>
                        ';

        while ($row = mysqli_fetch_assoc($date_query)) {

            $monthNum = $row['month'];
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
            $counts += $row['count'];

            $t_earn += $row['total_amount'];
            $t_per +=  (($row['count'] / $total_post) * 100);
            $total = array();
            $total = ["<b>Total</b>", $counts, "&#8369;" . $t_earn . ".00", $t_per . " %"];

            echo '
                        <tr> 
                            <td> ' . $monthName . '</td>
                            <td> ' . $row['count'] . '</td>
                            <td> &#8369;' . $row['total_amount'] . '</td>
                            <td> ' . round((($row['count'] / $total_post) * 100), 2) . ' %</td>
                        </tr>';
        }
        echo '<tr>';
        foreach ($total as $result) {
            echo '<td>' . $result . '</td>';
        }
        echo '</tr>';

        mysqli_free_result($date_query);
        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }

    // EXPIRED SUBSCRIPTION

    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {

        $date_sql = "SELECT 
                        MONTH(date_ended) as `month`,
                        count(date_ended) as count
                    FROM subscription 
                    WHERE YEAR(date_start) = $filter_year
                    AND MONTH(date_start) = $filter_month
                    GROUP BY month";

    } else if (strlen($filter_year) > 0) {
        $date_sql = "SELECT 
                        MONTH(date_ended) as `month`,
                        count(date_ended) as count
                    FROM subscription 
                    WHERE YEAR(date_start) = $filter_year
                    GROUP BY month";
    } else {
        $date_sql = "SELECT 
                        MONTH(date_ended) as `month`,
                        count(date_ended) as count
                    FROM subscription 
                    GROUP BY month";
    }

    $date_query = mysqli_query($connect, $date_sql);

    if (mysqli_num_rows($date_query) > 0) {

        echo '
                    <tr>
                        <th colspan="4" id="sub-header">Subscription Endings</th>
                    </tr>
                    <tr id="table-header" class=" text-white">
                        <th>Month</th>
                        <th>Count</th>
                        <th colspan="2">Percentage</th>
                    </tr>
                    ';

        while ($row = mysqli_fetch_assoc($date_query)) {

            $monthNum1 = $row['month'];
            $monthName1 = date("F", mktime(0, 0, 0, $monthNum1, 10));

            echo '
                        <tr> 
                            <td> ' . $monthName1 . '</td>
                            <td> ' . $row['count'] . '</td>
                            <td colspan="2"> ' . round((($row['count'] / $total_post) * 100), 2) . ' %</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    ';
    }


    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {
        $subs_query = "select status, count(status) as status_count from subscription WHERE YEAR(date_start) = $filter_year AND MONTH(date_start) = $filter_month group by status desc";
    } else if (strlen($filter_year) > 0) {
        $subs_query = "select status, count(status) as status_count from subscription WHERE YEAR(date_start) = $filter_year group by status desc";
    } else {
        $subs_query = "select status, count(status) as status_count from subscription group by status desc";
    }

    $subs_result = mysqli_query($connect, $subs_query);

    if (mysqli_num_rows($subs_result) > 0) {

        echo '
                        <tr id="table-header" class=" text-white">
                            <th>Status</th>
                            <th>Count</th>
                            <th colspan="2">Percentage</th>
                        </tr>
        ';

        while ($row = mysqli_fetch_assoc($subs_result)) {

            $subs_percent = round((($row['status_count'] / $total_post) * 100), 2);
            echo '
                        <tr> 
                            <td> ' . $row['status'] . '</td>
                            <td> ' . $row['status_count'] . '</td>
                            <td colspan="2"> ' . $subs_percent . ' %</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }


    if (strlen($filter_month) > 0  && strlen($filter_year) > 0) {

        $user_sub = "SELECT DISTINCT 
                        CONCAT(users.firstname, ' ', users.lastname) AS name,
                        date_start,
                        amount,
                        subscription.status
                    FROM 
                        users
                    INNER JOIN 
                        subscription ON subscription.user_id = users.user_id
                    WHERE 
                        YEAR(date_start) = $filter_year 
                    AND 
                        MONTH(date_start) = $filter_month";
    } else if (strlen($filter_year) > 0) {

        $user_sub = "SELECT DISTINCT 
                        CONCAT(users.firstname, ' ', users.lastname) AS name,
                        date_start,
                        amount,
                        subscription.status
                    FROM 
                        users
                    INNER JOIN 
                        subscription ON subscription.user_id = users.user_id
                    WHERE 
                        YEAR(date_start) = $filter_year;";
    } else {
        $user_sub = "SELECT DISTINCT 
                    CONCAT(users.firstname,' ',users.lastname) as name,
                    date_start,
                    amount,
                    subscription.status
                FROM 
                    users
                INNER JOIN subscription ON subscription.user_id = users.user_id";
    }




    $user_sub_query = mysqli_query($connect, $user_sub);

    if (mysqli_num_rows($user_sub_query) > 0) {

        echo '
                        <tr>
                            <th colspan="4" id="sub-header">Subscriber List</th>
                        </tr>
                        <tr id="table-header" class=" text-white">
                            <th>Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
        ';

        while ($row = mysqli_fetch_assoc($user_sub_query)) {

            echo '
                        <tr> 
                            <td> ' . $row['name'] . ' </td>
                            <td> ' . $row['date_start'] . '</td>
                            <td> &#8369;' . $row['amount'] . '</td>
                            <td> ' . $row['status'] . '</td>
                        </tr>';
        }

        echo '<tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>';
    }
    echo "</table></div>";

    // babysitter hired percentage -------------------------------------------
    echo "  <div class='w-20 px-3'>";

    
        $top_user_query = "SELECT
                                  CONCAT(users.lastname,' ',users.firstname) as `name`,
                                  round(AVG(reviews.review_ratings),1) AS rating
                              FROM users
                              INNER JOIN reviews ON reviews.babysitter_id = users.user_id
                              GROUP BY users.lastname,users.firstname
                              ORDER BY rating DESC
                              LIMIT 10";
    

    $top_user = mysqli_query($connect, $top_user_query);
    if (mysqli_num_rows($top_user) > 0) {
        $ranking = 0;

        echo '      <table>
                            <tr id="table-header" class=" text-center text-white">
                                <th colspan="4" id="sub-header">Top Babysitters</th>
                            </tr>
                          <tr id="table-header" class=" text-white">
                              <th>Babysitters Rank</th>
                              <th>Name</th>
                              <th colspan="2">Ratings</th>
                          </tr>
                          ';

        while ($row = mysqli_fetch_assoc($top_user)) {

            $ranking += 1;

            echo '
                              <tr> 
                                  <td> ' . $ranking . '</td>
                                  <td> ' . $row['name'] . '</td>
                                  <td colspan="2"><b>' . $row['rating'] . '</b> / 5</td>
                              </tr>';
        }
    }

    echo "</table></div>";


    echo "
          <div class='w-80 px-3'>
            <table></table>
          </div>";
    echo "</div>";
}
