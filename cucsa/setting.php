<?php

    include("actions.php");

    include("views/header.php");

    $query1 = "SELECT * FROM dimension WHERE id = 1";
    
    $result1 = mysqli_query($link, $query1);

    $row1 = mysqli_fetch_assoc($result1);

    $name = $row1['name'];

    $plate_w = $row1['p-width'];
    $plate_h = $row1['p-height'];

    $stand_w = $row1['s-width'];
    $stand_h = $row1['s-height'];

    if($_POST['action']=='edit-dimension'){
        
        $query3 = "UPDATE `dimension` SET `name` = '".$_POST['name']."', `s-width` = '".$_POST['s-width']."' ,`s-height` = '".$_POST['s-height']."',`p-width` = '".$_POST['p-width']."' ,`p-height` = '".$_POST['p-height']."' WHERE id = 1";

        mysqli_query($link, $query3);
        
        header("Location: setting.php");
        
    }





    $query11 = "SELECT * FROM color WHERE type = '11'";

    $result11 = mysqli_query($link, $query11);

    $row11 = mysqli_fetch_all($result11);

    for( $i = 0 ; $i < mysqli_num_rows($result11) ; $i++ ){
                
        $tr11 .= '<td>'.$row11[$i][1].'</td>';
        
        $tr11 .= '<td>'.$row11[$i][2].'</td>';
        
        $tr11 .= '<td><svg width="22" height="22"><rect width="20" height="20" style="fill:rgb('.$row11[$i][3].','.$row11[$i][4].','.$row11[$i][5].');;stroke-width:1;stroke:rgb(0,0,0)" /></svg></td>';
        
        $tr11 .= '<td>'.$row11[$i][3].'</td>';
        
        $tr11 .= '<td>'.$row11[$i][4].'</td>';
        
        $tr11 .= '<td>'.$row11[$i][5].'</td>';

        $tr11 .= '</tr>';
        
    }

    $table11 = '
    
        <div class="table-responsive">
        
            <table class="table mt-2 mb-5 table-hover table-sm">

              <thead>
                <tr>
                
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Sample</th>
                  <th scope="col">R</th>
                  <th scope="col">G</th>
                  <th scope="col">B</th>


                </tr>
              </thead>

              <tbody>

                '.$tr11.'

              </tbody>
            </table>
            
        </div>
    
    ';

    $query125 = "SELECT * FROM color WHERE type = '125'";

    $result125 = mysqli_query($link, $query125);

    $row125 = mysqli_fetch_all($result125);

    for( $i = 0 ; $i < mysqli_num_rows($result125) ; $i++ ){
                
        $tr125 .= '<td>'.$row125[$i][1].'</td>';
        
        $tr125 .= '<td>'.$row125[$i][2].'</td>';
        
        $tr125 .= '<td><svg width="22" height="22"><rect width="20" height="20" style="fill:rgb('.$row125[$i][3].','.$row125[$i][4].','.$row125[$i][5].');;stroke-width:1;stroke:rgb(0,0,0)" /></svg></td>';
        
        $tr125 .= '<td>'.$row125[$i][3].'</td>';
        
        $tr125 .= '<td>'.$row125[$i][4].'</td>';
        
        $tr125 .= '<td>'.$row125[$i][5].'</td>';

        $tr125 .= '</tr>';
        
    }

    $table125 = '
    
        <div class="table-responsive">
        
            <table class="table mt-2 mb-5 table-hover table-sm">

              <thead>
                <tr>
                
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Sample</th>
                  <th scope="col">R</th>
                  <th scope="col">G</th>
                  <th scope="col">B</th>


                </tr>
              </thead>

              <tbody>

                '.$tr125.'

              </tbody>
            </table>
            
        </div>
    
    ';

    $queryop = "SELECT * FROM color WHERE type = 'op'";

    $resultop = mysqli_query($link, $queryop);

    $rowop = mysqli_fetch_all($resultop);

    for( $i = 0 ; $i < mysqli_num_rows($resultop) ; $i++ ){
                
        $trop .= '<td>'.$rowop[$i][1].'</td>';
        
        $trop .= '<td>'.$rowop[$i][2].'</td>';
        
        $trop .= '<td><svg width="22" height="22"><rect width="20" height="20" style="fill:rgb('.$rowop[$i][3].','.$rowop[$i][4].','.$rowop[$i][5].');;stroke-width:1;stroke:rgb(0,0,0)" /></svg></td>';
        
        $trop .= '<td>'.$rowop[$i][3].'</td>';
        
        $trop .= '<td>'.$rowop[$i][4].'</td>';
        
        $trop .= '<td>'.$rowop[$i][5].'</td>';

        $trop .= '</tr>';
        
    }

    $tableop = '
    
        <div class="table-responsive">
        
            <table class="table mt-2 mb-5 table-hover table-sm">

              <thead>
                <tr>
                
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Sample</th>
                  <th scope="col">R</th>
                  <th scope="col">G</th>
                  <th scope="col">B</th>


                </tr>
              </thead>

              <tbody>

                '.$trop.'

              </tbody>
            </table>
            
        </div>
    
    ';

?>
<div class="container main-container">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">

            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-dimension" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>

            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-index11" role="tab" aria-controls="nav-profile" aria-selected="false">1:1</a>
            
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-index125" role="tab" aria-controls="nav-profile" aria-selected="false">1:25</a>
            
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-indexop" role="tab" aria-controls="nav-profile" aria-selected="false">OP</a>

      </div>
    </nav>



    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-dimension" role="tabpanel" aria-labelledby="nav-home-tab">
            <form class="my-4 mx-2" method="post">
                <input type="hidden" name="action" value="edit-dimension">
                <p class="h4">Event Name</p>
              <div class="form-row">
                <div class="form-group col-6">
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" disabled>
                </div>
              </div>
                <p class="h4">Stand Size</p>
              <div class="form-row">
                <div class="form-group col-6">
                  <label for="s-width">Width</label>
                  <input type="number" min="1" class="form-control" id="s-width" name="s-width" value="<?php echo $stand_w; ?>" disabled>
                </div>
                <div class="form-group col-6">
                  <label for="s-height">Height</label>
                  <input type="number" min="1" class="form-control" id="s-height" name="s-height" value="<?php echo $stand_h; ?>" disabled>
                </div>
              </div>
                <p class="h4">Plate Size</p>
              <div class="form-row">
                
                <div class="form-group col-6">
                  <label for="p-width">Width</label>
                  <input type="number" min="1" class="form-control" id="p-width" name="p-width" value="<?php echo $plate_w; ?>" disabled>
                </div>
                <div class="form-group col-6">
                  <label for="height">Height</label>
                  <input type="number" min="1" class="form-control" id="p-height" name="p-height" value="<?php echo $plate_h; ?>" disabled>
                </div>
              </div>
              <div><br><br><br><p><b>🌟Contact ADMIN for changing setting🌟</b></p></div>
              <!-- <button type="submit" class="btn btn-primary">Save</button> -->
            </form>

        </div>
        
        <div class="tab-pane fade" id="nav-index11" role="tabpanel">
            <form class="my-4 mx-2" method="post">
                <p class="h4">1:1</p>
                
                <?php echo $table11 ?>

            </form>

        </div>
        
        <div class="tab-pane fade" id="nav-index125" role="tabpanel">
            <form class="my-4 mx-2" method="post">


                <p class="h4">1:25</p>
                
                <?php echo $table125 ?>
                

            </form>

        </div>
        
        <div class="tab-pane fade" id="nav-indexop" role="tabpanel">
            <form class="my-4 mx-2" method="post">
                
                <p class="h4">Open-shut</p>
                
                <?php echo $tableop ?>

            </form>

        </div>

    </div>
    

    
</div>
<?php

    include("views/footer.php");


?>
