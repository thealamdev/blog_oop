<?php
ob_start();
include_once '../lib/Session.php';
Session::start();


include_once('components/header.php');
include_once('components/sidebar.php');

?>

<!-- dashboard content start -->
<?php
include_once('components/dashboard.php');
?>
<!-- dashboard content end -->

<?php
include_once('components/footer.php');
?>