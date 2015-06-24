
<?php
//require 'form_auth.php';

readfile('navigation.tmpl.html');
?>

<?php
// the update expects a rower ID with the post command
// a bit of php code checks ID is digits, and is a valid ID
// redirect in this case
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
	$id = $_GET['id'];
} else {
	header('Location: form_select.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>BHRA Leaf Raking</title>
</head>
<body>
	<p><?php

	$username = '';
	$myPassword = '';
	$first = '';
	$last = '';
	$cox = '';
	$novice_varsity = '';
	$gender = '';
	$school = '';
	$grade = '';
	$email1 = '';
	$email2 = '';
	$cell = '';
	$home = '';

// post
	if (isset($_POST['submit'])) {
		$fail = "";

		if (!isset($_POST['username']) || $_POST['username'] === '') {
			$fail .= " bad_username";
		} else {
			$username = $_POST['username'];
		}

		if (!isset($_POST['myPassword']) || $_POST['myPassword'] === '') {
			$fail .= " bad_password";
		} else {
			$myPassword = $_POST['myPassword'];
		}

		if (!isset($_POST['first']) || $_POST['first'] === '') {
			$fail .= " bad_firstname";
		} else {
			$first = $_POST['first'];
		}

		if (!isset($_POST['last']) || $_POST['last'] === '') {
			$fail .= " bad_lastname";
		} else {
			$last = $_POST['last'];
		}

		if (!isset($_POST['cox']) /* || $_POST['cox'] === ''*/) {
			$fail .= " bad_cox";
		} else {
			$cox = $_POST['cox'];
		}

		if (!isset($_POST['novice_varsity']) || $_POST['novice_varsity'] === '') {
			$fail .= " bad_novice_varsity";
		} else {
			$novice_varsity = $_POST['novice_varsity'];
		}

		if (!isset($_POST['gender']) || $_POST['gender'] === '') {
			$fail .= " bad_gender";
		} else {
			$gender = $_POST['gender'];
		}

		if (!isset($_POST['school']) || $_POST['school'] === '') {
			$fail .= " bad_school";
		} else {
			$school = $_POST['school'];
		}

		if (!isset($_POST['grade']) || $_POST['grade'] === '') {
			$fail .= " bad_grade";
		} else {
			$grade = $_POST['grade'];
		}

		if (!isset($_POST['email1']) || $_POST['email1'] === '') {
			$fail .= " bad_email1";
		} else {
			$email1 = $_POST['email1'];
		}

			//$_POST['email2'])
		if (!isset($_POST['email2']) || $_POST['email2'] === '') {
// empty input is OK
		} else {
			$email2 = $_POST['email2'];
		}

			//$_POST['cell'])
		if (!isset($_POST['cell']) || $_POST['cell'] === '') {
			$fail .= " bad_cell";
		} else {
			$cell = $_POST['cell'];
		}
			//$_POST['home'])
		if (!isset($_POST['home']) || $_POST['home'] === '') {
			$fail .= " bad_home_phone";
		} else {
			$home = $_POST['home'];
		}


		if ($fail!="") {
			printf('bad input: %s',$fail);
		} else {
			
		// post to database

			$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
			$sql = sprintf("UPDATE rakers SET 
				username='%s',
				password='%s',
				firstname='%s',
				lastname='%s',
				cox='%s',
				novice_varsity='%s',
				gender='%s',
				school='%s',
				grade='%s',
				email1='%s',
				email2='%s',
				cellphone='%s',
				homephone='%s'
				WHERE id='%s';",
				mysqli_real_escape_string($db, $username),
				mysqli_real_escape_string($db, $myPassword),
				mysqli_real_escape_string($db, $first),
				mysqli_real_escape_string($db, $last),
				mysqli_real_escape_string($db, $cox),
				mysqli_real_escape_string($db, $novice_varsity),
				mysqli_real_escape_string($db, $gender),
				mysqli_real_escape_string($db, $school),
				mysqli_real_escape_string($db, $grade),
				mysqli_real_escape_string($db, $email1),
				mysqli_real_escape_string($db, $email2),
				mysqli_real_escape_string($db, $cell),
				mysqli_real_escape_string($db, $home),
				$id);

			mysqli_query($db, $sql);
			mysqli_close($db);
			echo '<p>User updated</p>';
			printf("<br>$sql");
		}

	} else {
// GET
// if not post then prefill the fields
// using current values from database
		$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
		$sql = sprintf('SELECT * FROM rakers WHERE id=%s', $id);
		$result = mysqli_query($db, $sql);
		foreach ($result as $row) {
			$username = $row['username'];
			$myPassword = $row['password'];
			$first = $row['firstname'];
			$last = $row['lastname'];
			$cox = $row['cox'];
			$novice_varsity = $row['novice_varsity'];
			$gender = $row['gender'];
			$school = $row['school'];
			$grade = $row['grade'];
			$email1 = $row['email1'];
			$email2 = $row['email2'];
			$cell = $row['cellphone'];
			$home = $row['homephone'];
		}
		mysqli_close($db);
	}
	?>


</p>
<form method="post" actions="">

	username: <input type="text" name="username" value="<?php
	echo htmlspecialchars($username);
	?>"><br>

	Password:
	<input type="password" name="myPassword"><br>

	first: <input type="text" name="first" value="<?php
	echo htmlspecialchars($first);
	?>"><br>

	last: <input type="text" name="last" value="<?php
	echo htmlspecialchars($last);
	?>"><br>

	cox:
	<input type="radio" name="cox" value="coxswain"<?php
	if ($cox === 'coxswain') {
		echo " checked";
	}
	?>>yes
	<input type="radio" name="cox" value=""<?php
	if ($cox === '') {
		echo " checked";
	}
	?>>no<br>

	novice_varsity:
	<input type="radio" name="novice_varsity" value="Novice"<?php
	if ($novice_varsity === 'Novice') {
		echo " checked";
	}
	?>>novice
	<input type="radio" name="novice_varsity" value="Varsity"<?php
	if ($novice_varsity === 'Varsity') {
		echo " checked";
	}
	?>>varsity<br>

	gender:
	<input type="radio" name="gender" value="Male"<?php
	if ($gender === 'Male') {
		echo " checked";
	}
	?>>male
	<input type="radio" name="gender" value="Female"<?php
	if ($gender === 'Female') {
		echo " checked";
	}
	?>>female<br>

	school:
	<select name="school">
		<option value="">Please select</option>
		<option value="Bromfield"<?php
		if ($school === 'Bromfield') {
			echo " selected";
		}
		?>>Bromfield</option>
		<option value="Acton-Boxborough"<?php
		if ($school === 'Acton-Boxborough') {
			echo " selected";
		}
		?>>Acton-Boxborough</option>
	</select><br>

	grade: <input type="number" name="grade" value="<?php
	echo htmlspecialchars($grade);
	?>"><br>

	email1: <input type="text" name="email1" value="<?php
	echo htmlspecialchars($email1);
	?>"><br>

	email2: <input type="text" name="email2" value="<?php
	echo htmlspecialchars($email2);
	?>"><br>

	cellphone: <input type="text" name="cell" value="<?php
	echo htmlspecialchars($cell);
	?>"><br>

	homephone: <input type="text" name="home" value="<?php
	echo htmlspecialchars($home);
	?>"><br>

	<input type="submit" name="submit" value="Submit">
</form>
</body>

</html>