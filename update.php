<?php

include("connect.php");

$user_id = $_GET['user_id'];
$status = $_GET['status'];
$page = $_GET['page'];

// Babysitter Update table
if ($page == "babysitter") {
	if ($status == "Active") {
		$sql = "update users set status = 'Banned', deleted = '1' where user_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: babysitter.php?banned");
		} else {
			header("Location: babysitter.php?failed");
		}
	} else {
		$sql = "update users set status = 'Active', deleted = '0' where user_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: babysitter.php?active");
		} else {
			header("Location: babysitter.php?failed");
		}
	}
}

// Parent Update table
if ($page == "parent") {
	if ($status == "Active") {
		$sql = "update users set status = 'Banned', deleted = '1' where user_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: parent.php?banned");
		} else {
			header("Location: parent.php?failed");
		}
	} else {
		$sql = "update users set status = 'Active', deleted = '0' where user_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: parent.php?active");
		} else {
			header("Location: parent.php?failed");
		}
	}
}

// JOB POST Update table
if ($page == "job") {
	if ($status == "Active" || $status == "Hired") {
		$sql = "update post set jobpost_status = 'Banned', deleted = '1' where jobpost_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: job.php?banned");
		} else {
			header("Location: job.php?failed");
		}
	} else {
		$sql = "update post set jobpost_status = 'Active', deleted = '0' where jobpost_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: job.php?active");
		} else {
			header("Location: job.php?failed");
		}
	}
}

// BLOG POST Update table
if ($page == "blog") {
	if ($status == "Active") {
		$sql = "update blog set blog_deleted = 'Banned' where blog_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: blog.php?banned");
		} else {
			header("Location: blog.php?failed");
		}
	} else {
		$sql = "update blog set blog_deleted = 'Active' where blog_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: blog.php?active");
		} else {
			header("Location: blog.php?failed");
		}
	}
}

// REVIEWS Update table
if ($page == "review") {
	if ($status == "0") {
		$sql = "update reviews set review_deleted = '1' where review_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: review.php?deleted");
		} else {
			header("Location: review.php?failed");
		}
	} else {
		$sql = "update reviews set review_deleted = '0' where review_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: review.php?activate");
		} else {
			header("Location: review.php?failed");
		}
	}
}

// job application Update table
if ($page == "application") {

	$action = $_GET['action'];

	if ($action == "hire") {
		$sql = "update application set apply_status = 'Hired' where apply_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: application.php?hired");
		} else {
			header("Location: application.php?failed");
		}
	} 

	if ($action == "reject") {
		$sql = "update application set apply_status = 'Rejected' where apply_id='$user_id'";
		$query = mysqli_query($connect, $sql);
		if ($query) {
			header("Location: application.php?rejected");
		} else {
			header("Location: application.php?failed");
		}
	} 
}

// subscription Update table
if ($page == "subscription") {

	if ($status == "Active") {
		$sql = "update subscription set status = 'Hold' where subscription_id='$user_id'";
		$query = mysqli_query($connect, $sql);

		if ($query) {
			header("Location: subscription.php?hold");
		} else {
			header("Location: subscription.php?failed");
		}

	} else {

		$sql = "update subscription set status = 'Active' where subscription_id='$user_id'";
		$query = mysqli_query($connect, $sql);

		if ($query) {
			header("Location: subscription.php?active");
		} else {
			header("Location: subscription.php?failed");
		}
	}
}

