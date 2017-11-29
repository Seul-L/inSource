
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="inSource is a solution for bridging the communication gap between front-line workers and management by providing a platform to gather workplace issues and a tested Sprint process for rapidly developing solutions.">
  <meta name="author" content="Seul, Jessica, Dhara, Jeff, Seyitan">
  <title>inSource</title>

  <!-- css -->
  <link rel="stylesheet" href="/css/subpages.css">
  <link rel="stylesheet" href="/css/dbrd_style.css">
  <link rel="stylesheet" href="/css/master.css">

  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

  <!-- font awesome -->
  <script src="https://use.fontawesome.com/e5bc08cd73.js"></script>

  <!-- jqery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.2.3/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

</head>

<body>
  <div class="main">
    <div class="progress">
      <h1>PROGRESS BAR</h1>
      <div class="prg-notice">
        <?php
        echo file_get_contents('notice.txt');
         ?>
      </div>

      <a class="show" target="1" href="javascript:toggle();"><div class="btn">Submit</div></a>

      <div class="progress-bar">
        <div class="prg-percent" role="progressbar" style="width: 25%;">
        </div>
      </div>

      <div class="indicator-section">
        <span>
          <div class="indicator"><a class="show" target="1"  id="submitIndicate" href="javascript:toggle();">Submit</a></div>
        </span>

        <span>
          <div class="indicator"><a class="show" target="2" id="voteIndicate" href="javascript:toggle();">Vote</a></div>
        </span>

        <span>
          <div class="indicator"><a class="show" target="3" id="sprintIndicate" href="javascript:toggle();">Sprint</a></div>
        </span>

        <span>
          <div class="indicator"><a class="show" target="4" id="summaryIndicate"   href="javascript:toggle();">Summary</a></div>
         </span>
      </div>
    </div>

    <div class="subpage">
      <div id="div1" class="targetDiv">
        <section>
          <?php require("submission.php"); ?>
        </section>
      </div>
      <div id="div2" class="targetDiv">
        <section>
          <?php require("vote.php"); ?>
        </section>
      </div>
      <div id="div3" class="targetDiv">
        <section>Sprint Open</section>
      </div>
      <div id="div4" class="targetDiv">
        <section>Summary Open</section>
      </div>
    </div>

    <div class="notice-brd">
      <h1>NOTICE BOARD</h1>
      <div id="tbody">
        <table>
          <tr>
            <td class="align-top" style="border-top:0px;">2017/11/05</td>
            <td style="border-top:0px;">
              <h4>Q3 Suggestion submission open</h4>
              <p>Submission closes on November 20th, 2017 11:59PM (EST)</p>
            </td>
          </tr>
          <tr>
            <td class="align-top">2017/09/20</td>
            <td>
              <h4>Q2 Sprint Result</h4>
              <p>Topic: Technology<br>Solution: Undefinded<br>Reason: Chosen solution is not feasible at this time.</p>
            </td>
          </tr>
          <tr>
            <td class="align-top">2017/09/15</td>
            <td>
              <h4>Q2 Voting Closed</h4>
              <p>Voting for Q2 has closed.<br>Q2 meeting results can be found under the Results section.</p>
            </td>
          </tr>
          <tr>
            <td class="align-top">2017/07/18</td>
            <td>
              <h4>Q1 Follow-up Updates</h4>
              <p>We are on Implementation stage.</p>
            </td>
          </tr>
          <tr>
            <td class="align-top">2017/04/10</td>
            <td>
              <h4>Q1 Sprint date is set to April 16th, 2017 9:00AM (EST)</h4>
            </td>
          </tr>
          <tr>
            <td class="align-top">2017/04/06</td>
            <td>
              <h4>Q1 Voting Closed</h4>
              <p>Voting for Q1 has closed.</p>
            </td>
          </tr>
          <tr>
            <td class="align-top">2017/03/20</td>
            <td>
              <h4>Q1 Suggestion submission Closed</h4>
              <p>Voting for Q1 opens on March 25th, 2017 9:00AM (EST)</p>
            </td>
          </tr>
          <tr>
            <td class="align-top">2017/03/15</td>
            <td>
              <h4>Q1 Suggestion submission open</h4>
              <p>Submission closes on March 20th, 2017 11:59PM (EST)</p>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div id="results">
      <h1>RESULTS</h1>
      <div class="slideshow-container">
        <div class="mySlides">
          <div class="slide-content">
            <a href="/html/Q3result.html">
              <div class="card">
                <div class="container">
                  <img class="image" src="/assets/stickynotes.jpg" alt="results_1">
                  <div class="card-title">
                    <h4>Q2 2017 Result</h4>
                    <p class="update-date">Last Updated: 2017/07/20</p>
                  </div>
                  <div class="result-desc">
                    <p class="situation" style="color:#417505"><i class="fa fa-circle" aria-hidden="true"></i>Completed (Not Implemented)</p>
                    <p class="desc"><b>Topic:</b> How might we improve the current scheduling system?<br><br><b>Solution:</b> 3 possible solutions were discussed during the workshop but none were implemented due to...</p>
                    <div class="line-top">
                      <div class="right"><a href="#">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </a>

            <a href="/html/Q2result.html">
              <div class="card">
                <div class="container">
                  <img class="image" src="/assets/stickynotes.jpg" alt="results_1">
                  <div class="card-title">
                    <h4>Q1 2017 Result</h4>
                    <p class="update-date">Last Updated: 06/15/2017</p>
                  </div>
                  <div class="result-desc">
                    <p class="situation" style="color: #4A90E2;"><i class="fa fa-circle" aria-hidden="true"></i>Ongoing (Research)</p>
                    <p class="desc"><b>Topic:</b> How might we improve the driver feedback process?<br><br><b>Solution:</b> To implement performance reviews once a year to that include positive and improvement points...</p>
                    <div class="line-top">
                      <div class="right"><a href="#">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </a>

            <a href="/html/Q1result.html">
              <div class="card">
                <div class="container">
                  <img class="image" src="/assets/stickynotes.jpg" alt="results_1">
                  <div class="card-title">
                    <h4>Q4 2016 Result</h4>
                    <p class="update-date">Last Updated: 12/15/2017</p>
                  </div>
                  <div class="result-desc">
                    <p class="situation" style="color: #417505;"><i class="fa fa-circle" aria-hidden="true"></i>Completed (Not Implemented)</p>
                    <p class="desc"><b>Topic:</b> How might we improve being notified of detour updates?<br><br><b>Solution:</b> A new online detour system is now available for drivers that will allow them to check updates from their...</p>
                    <div class="line-top">
                      <div class="right"><a href="#">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="mySlides">
          <div class="slide-content">
            <a href="#">
              <div class="card">
                <div class="container">
                  <img class="image" src="/assets/stickynotes.jpg" alt="results_1">
                  <div class="card-title">
                    <h4>Q3 2016 Result</h4>
                    <p class="update-date">Last Updated: 2016/08/10</p>
                  </div>
                  <div class="result-desc">
                    <p class="situation" style="color: #4A90E2;"><i class="fa fa-circle" aria-hidden="true"></i>Completed (Implemented)</p>
                    <p class="desc"><b>Topic:</b> How might we improve the current cleaning system?<br><br><b>Solution:</b> Out of 3 possible solutions discussed during the workshop, we decided to increase frequence of cleaning service...</p>
                    <div class="line-top">
                      <div class="right"><a href="#">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </a>

            <a href="#">
              <div class="card">
                <div class="container">
                  <img class="image" src="/assets/stickynotes.jpg" alt="results_1">
                  <div class="card-title">
                    <h4>Q2 2016 Result</h4>
                    <p class="update-date">Last Updated: 2017/07/20</p>
                  </div>
                  <div class="result-desc">
                    <p class="situation" style="color: #4A90E2;"><i class="fa fa-circle" aria-hidden="true"></i>Completed (Not Implemented)</p>
                    <p class="desc"><b>Topic:</b> How might we improve the current scheduling system?<br><br><b>Solution:</b> 3 possible solutions were discussed during the workshop but none were implemented due to...</p>
                    <div class="line-top">
                      <div class="right"><a href="#">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </a>

            <a href="#">
              <div class="card">
                <div class="container">
                  <img class="image" src="/assets/stickynotes.jpg" alt="results_1">
                  <div class="card-title">
                    <h4>Q1 2016 Result</h4>
                    <p class="update-date">Last Updated: 2017/07/20</p>
                  </div>
                  <div class="result-desc">
                    <p class="situation" style="color: #4A90E2;"><i class="fa fa-circle" aria-hidden="true"></i>Completed (Not Implemented)</p>
                    <p class="desc"><b>Topic:</b> How might we improve the current scheduling system?<br><br><b>Solution:</b> 3 possible solutions were discussed during the workshop but none were implemented due to...</p>
                    <div class="line-top">
                      <div class="right"><a href="#">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        <a class="next" onclick="plusSlides(1)"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
      </div>
    </div>
</div>
      <script>
        // progress bar


        // toggle hidden divs
        $('.targetDiv').hide();
        $('.show').click(function() {
          $('#div' + $(this).attr('target')).slideToggle('').siblings('.targetDiv').hide('');
        });

        // slide results
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {
            slideIndex = 1
          }
          if (n < 1) {
            slideIndex = slides.length
          }
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slides[slideIndex - 1].style.display = "block";
        }
      </script>
</body>

</html>
