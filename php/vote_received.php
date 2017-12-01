<section>

  <?php



  session_start();

  if(isset($_POST['vote-submit'])) {
    $voteArray=$_POST['voting'];
    $conn = mysqli_connect($servername, $username, $password, $database);

    if(is_null($voteArray)) {
        echo("<p>You didn't select any topic.</p>\n");
        } else {
           $N = count($voteArray);

            for($i=0; $i < $N; $i++) {
                $var1 = $voteArray[$i];
                $jobTitle = $_SESSION['occupation'];

                $sql = "INSERT INTO vote_response (occupation, voting, created) VALUES('$jobTitle', '$var1', now())";

                $success = mysqli_query($conn, $sql);

                if (!$success) {
                  die("Couldn't enter data: ".$conn->error);
                }
                  echo $var1;
                  $conn->close();
            }
    }
  }
  ?>

</section>
