<?php
    session_start();
?>

<!-- vote phase -->
<section class="vote">
  <h2>VOTING NOW OPEN</h2>
  <h3 class="red">2 days left to vote for a topic for Q3</h3>
  <h3 class="red">Voting open till November 30th 2017 11:59 PM (EST)</h3>
<div id="vote_success">
  <p>Topics have been formed around the issues submitted during the submission period. Members are invited to vote on the particular issues they want addressed at the upcoming Sprint Workshop.</p>
</div>
  <form action="/php/vote_received.php" method="post" target="" id="vote-submit">

    <input type="hidden" name="recieved-date" id="todayDate" />

    <input type="hidden" name="user-occup" id="user-occup" value="<?php $_SESSION['occupation']; ?>" />

    <input type="checkbox" name="voting[]" value="How might we improve driver facilities such as lunch rooms or break rooms?" id="voting_1">
    <label for="voting_1">How might we improve driver facilities such as lunch rooms or break rooms?</label>

    <input type="checkbox" name="voting[]" value="How might be increase driver security at night time?" id="voting_2">
    <label for="voting_2">How might be increase driver security at night time?</label>

    <input type="checkbox" name="voting[]" value="How might we change the on-call communication with management?" id="voting_3">
    <label for="voting_3">How might we change the on-call communication with management?</label>

    <input type="checkbox" name="voting[]" value="How might we enhance the passenger conflict management system?" id="voting_4">
    <label for="voting_4">How might we enhance the passenger conflict management system?</label>

    <br><br>
    <input type="submit" name="submit" value="Submit" class="btn align-right">

  </form>

  <script type="text/javascript">
    function getDate() {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = yyyy + "/" + mm + "/" + dd;

      document.getElementById("todayDate").value = today;
    }

    //call getDate() when loading the page
    getDate();

    $("#vote-submit").submit(function(event) {
      /* stop form from submitting normally */
      event.preventDefault();

      /* get some values from elements on the page: */
      var $form = $(this),
      $messages = $("input[name='voting[]']"),
      $occup = $form.find('input[name="user-occup"]'),
      $submit = $form.find('button[type="submit"]'),
      message_value = [],
      url = $form.attr('action');
      $.each($messages, function(idx, val){
          message_value.push($(val).val());
      });

      var posting = $.post(url, { submission : message_value});

      posting.done(function(data) {
        /* Put the results in a div */
        $("#vote_success").html('<h2>THANK YOU!</h2><p>Thank you for your voting. Meeting invitations will be send out on December 7th, 2017.');
        /* Hide form */
        $form.hide();
      });
    });
  </script>
</section>
