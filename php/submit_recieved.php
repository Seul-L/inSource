<section>

  <?php



  $conn = mysqli_connect($servername, $username, $password, $database);
  $submission = $_POST['submission'];
  $sql = "INSERT INTO submit_response (submission, created) VALUES('$submission', now())";

  $result = mysqli_query($conn, $sql);
  if (!$result) {
    die("Couldn't enter data: ".$conn->error);
  }
  $conn->close();
  ?>
</section>
