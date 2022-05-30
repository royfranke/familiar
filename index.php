<?php

//include a config file that allows for path names
declare(strict_types = 1);
include 'includes/autoloader.inc.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="style.v1.0.0.css">
</head>

<body>
<?php

$template = new Template();

if (!$_SESSION['logged_in']) {
	$template->render('login');
}
else {
	$template->render('app');
}


?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="resources/libraries/html2canvas.min.js"></script>
<script src="resources/libraries/jspdf.min.js"></script>
<script>
  var user_id = '<?php echo $_SESSION['user_id']; ?>';
</script>
<script src="resources/libraries/famv1.0.0.js"></script>
</body>

</html>
