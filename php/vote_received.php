<section>

  <?php
  if(isset($_POST['votes'])) {
    $votings=$_POST['voting'];

    if(empty($votings)) {
            echo("<p>You didn't select any topic.</p>\n");
        } else {
           $N = count($votings);
            echo("<h2>SUBMISSIONS</h2><br><br><h4>Recieved submission</h4><br><p>You selected $N vote(s): ");
            for($i=0; $i < $N; $i++) {
                $var1=$votings[$i];
                $conn = mysqli_connect("localhost", "root", "*****");
                mysqli_select_db($conn, "inSource_local");

                $sql = "INSERT INTO vote_response (voting, created) VALUES('$var1', now())";
                $success = mysqli_query($conn, $sql);

                if (!$success) {
                  die("Couldn't enter data: ".$conn->error);
                }
                  echo $var1;
                  $conn->close();
            }
            // echo "successfully uploaded!..";
    }
  } else {
      echo "error please check your code";
  }

  // header('Location: http://localhost:8080/inSource/index.php');
  ?>

</section>
