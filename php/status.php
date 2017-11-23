<?php
  $status = 'Completed';

  if ($status == 'Completed' )
    $whatscolor = 'color: green';
  else if ($status == 'Ongoing' )
    $whatscolor = 'color: blue';
?>
<p class="situation" style="<?php echo $whatscolor; ?>"><i class="fa fa-circle" aria-hidden="true"></i>Completed (Not Implemented)</p>
<p class="desc"><b>Topic:</b> How might we improve the current scheduling system?<br><br><b>Solution:</b> 3 possible solutions were discussed during the workshop but none were implemented due to...</p>
