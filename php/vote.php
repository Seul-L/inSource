<!-- vote phase -->
<section class="vote">
  <h2>VOTING NOW OPEN</h2>
  <h3 class="red">2 days left to vote for a topic for Q3</h3>
  <h3 class="red">Voting open till November 30th 2017 11:59 PM (EST)</h3>

  <p>Topics have been formed around the issues submitted during the submission period. Members are invited to vote on the particular issues they want addressed at the upcoming Sprint Workshop.</p>

  <form action="php/vote_received.php" method="post" target="" id="vote-submit">
    <!-- <fieldset> -->
    <input type="hidden" name="recieved-date" id="todayDate" />

    <input type="hidden" name="user-occup" id="user-occup" value="occup" />

    <input type="checkbox" name="voting[]" value="How might we improve driver facilities such as lunch rooms or break rooms?" id="voting_1">
    <label for="voting_1">How might we improve driver facilities such as lunch rooms or break rooms?</label>

    <input type="checkbox" name="voting[]" value="How might be increase driver security at night time?" id="voting_2">
    <label for="voting_2">How might be increase driver security at night time?</label>

    <input type="checkbox" name="voting[]" value="How might we change the on-call communication with management?" id="voting_3">
    <label for="voting_3">How might we change the on-call communication with management?</label>

    <input type="checkbox" name="voting[]" value="How might we enhance the passenger conflict management system?" id="voting_4">
    <label for="voting_4">How might we enhance the passenger conflict management system?</label>
    <!-- </fieldset> -->
    <br><br>
    <input type="submit" name="votes" value="Submit" class="btn align-right">

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
        $submit = $form.find('button[type="submit"]'),
        message_value = $form.find('textarea[name="submission"]').val(),
        url = $form.attr('action');

      var posting = $.post(url, { submission : message_value});

      posting.done(function(data) {
        /* Put the results in a div */
        $("#form_success").html('<h2>THANK YOU!</h2><p>Thank you for your voting. Meeting invitations will be send out on December 7th, 2017. <br> You selected $N vote(s): <br> <?php echo $var1; ?>');
        /* Hide form */
        $form.hide();
      });
    });
  </script>
</section>
