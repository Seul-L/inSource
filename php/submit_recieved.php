<section>

  <?php
  $conn = mysqli_connect("localhost", "root", "*****");
  mysqli_select_db($conn, "inSource_local");
  $sql = "INSERT INTO submit_response (submission, created) VALUES('".$_POST["submission"]."', now())";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    die("Couldn't enter data: ".$conn->error);
  }
  // header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
  // die;
  header('Location: http://localhost:8080/inSource/index.php');
  $conn->close();
  ?>

  <h2>SUBMISSIONS</h2>

  <h4>Recieved submission</h4>
  <?php
    echo $_POST["recieved-date"], ' : ', $_POST["submission"];
  ?>
</section>
