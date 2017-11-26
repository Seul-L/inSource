<!-- Submit phase -->

<section class="submission">
  <h2>SUBMISSIONS NOW OPEN</h2>
  <h3 class="red">5 days left to submit your topic for Q3</h3>
  <h3 class="red">Submissions open till November 20th 2017 11:59 PM (EST)</h3>

  <div id="form_success">
    <p>During the submission period Members will have the opportunity to submit issues or topics that are important to them. You are permitted to submit up to 5 different topics or issues. After the submission period all submissions will be aggregated to
      form like topics.</p>

    <p><b>Rules</b><br> 1. All submission are anonymous and private.<br> 2. Please do not mention specific people in your submission.<br> 3. Please keep your submissions clear and concise.<br> 4. If you wish to provide audio/video/image files please submit
      them using the attach button below.<br>
    </p>

  </div>

  <div id="form_wrapper">
    <form id="txt-submits" action="php/submit_recieved.php" method="post" target="">
      <input type="hidden" name="recieved-date" id="todayDate" />
      <input type="hidden" name="user-occup" id="user-occup" value="occup" />
      <textarea type="text" name="submission" maxlength="600" placeholder="Please write here..." class="form-submission" required></textarea>
      <br><br>
      <input type="submit" value="Submit" class="btn align-right" id="submitbtn-disable">
    </form>
  </div>

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

    $("#txt-submits").submit(function(event) {
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
        $("#form_success").html('<h2>THANK YOU!</h2><p>Thank you for your submission. Voting will start on Novemeber 23rd, 2017.');
        /* Hide form */
        $form.hide();
      });
    });

  </script>

</section>
