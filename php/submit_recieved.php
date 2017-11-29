<section>

  <?php
  $conn = mysqli_connect("localhost", "root", "*****");
  mysqli_select_db($conn, "inSource_local");
  $sql = "INSERT INTO submit_response (submission, created) VALUES('".$_POST["submission"]."', now())";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    die("Couldn't enter data: ".$conn->error);
  }
  $conn->close();
  ?>
</section>
