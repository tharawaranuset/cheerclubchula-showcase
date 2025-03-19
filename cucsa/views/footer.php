<?php

    $query_reviewed1 = "SELECT * FROM code WHERE id_owner = ".$_COOKIE['id']." ORDER BY timestamp ASC";

    $result_reviewed1 = mysqli_query($link, $query_reviewed1);

    $row_reviewed1 = mysqli_fetch_all($result_reviewed1);

    for($x11 = mysqli_num_rows($result_reviewed1)-1 ; $x11 >=0 ; $x11--){
        
        $query_reviewed2 = "SELECT * FROM draft WHERE id_code = ".$row_reviewed1[$x11][0]." ORDER BY last_comment ASC";

        $result_reviewed2 = mysqli_query($link, $query_reviewed2);

        $row_reviewed2 = mysqli_fetch_all($result_reviewed2);
        
        for($x12 = mysqli_num_rows($result_reviewed2)-1 ; $x12 >=0 ; $x12--){
            
            $query_reviewed3 = "SELECT * FROM comment WHERE id_draft = ".$row_reviewed2[$x12][0] ." ORDER BY timestamp ASC";

            $result_reviewed3 = mysqli_query($link, $query_reviewed3);

            $row_reviewed3 = mysqli_fetch_all($result_reviewed3);
            
            for($x13 = mysqli_num_rows($result_reviewed3)-1 ; $x13 >=0 ; $x13--){
                
                $query_mentor = "SELECT * FROM `user` WHERE id = ".$row_reviewed3[$x13][3].' LIMIT 1';

                $result_mentor = mysqli_query($link, $query_mentor);

                $row_mentor = mysqli_fetch_assoc($result_mentor);

                $now = new DateTime();

                $feed_rows .= 

                    '
                    <form method="post" action="/cucsa/editor.php">
                        <input type="hidden" name="action" value="edit-code">
                        <tr><td>
                        <strong>'
                        .$row_mentor['nickname']
                        .'</strong> commented on your <strong>Code #'
                        .$row_reviewed1[$x11][0]
                        .': '
                        .$row_reviewed1[$x11][5]
                        .'</strong>  >> "'
                        .substr($row_reviewed3[$x13][4], 0,100)
                        .'..."<br><small class="text-muted font-italic">'
                        .date_format(date_modify(date_create_from_format("Y-m-d H:i:s",$row_reviewed3[$x13][2]),"+ 7 hours"),"D, d M h:i a")
                        .'
                        <button type="submit" name="id" value="'.$row_reviewed1[$x11][0].'" class="btn btn-secondary btn-sm mx-auto float-right py-0" id="edit-button">
                            View
                        </button>
                        
                        </small>
                    </form>
                    </td></tr>';
                
            }
            
        }
        
    }

#.date_diff(date_create_from_format("Y-m-d H:i:s",$row_reviewed3[$x13][2]),$now)->format('%d days %h hours %m mins ago')

    $feed_table = '
    
        <div class="table-responsive" style="max-height:50vh">

            <table class="table table-striped my-0 table-hover table-sm">

              <tbody>

                '.$feed_rows.'

              </tbody>
            </table>

        </div>
    
    ';

?>

<footer class="footer">
    
    <?php echo $_SESSION['footer']; ?>

    <div style="position:fixed; bottom:50px; right:15px;">
        <a href="#" role="button" class="badge badge-pill badge-danger text-white" data-toggle="modal" data-target="#noti">
            <i class="material-icons" style="font-size:24px" data-toggle="tooltip" data-placement="top" title="Review">notification_important</i>
        </a>
    </div>

    <div class="modal fade" id="noti" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Notifications (past week)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo $feed_table; ?>
          </div>
          <div class="modal-footer">

              <!--<a href="feed.php" role="button" class="btn btn-info">See All</a>-->

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

          </div>
        </div>
      </div>
    </div>

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>



  </body>
</html>
