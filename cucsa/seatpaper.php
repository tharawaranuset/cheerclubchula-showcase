<?php
	
    include("actions.php");

    include("views/header.php");


    $query_size = "SELECT * FROM dimension WHERE id = '1'";

    $result_size = mysqli_query($link, $query_size);

    $row_size = mysqli_fetch_assoc($result_size);

    $stand_w2 = $row_size['s-width'];
    $stand_h2 = $row_size['s-height'];

    $row_char = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ');
    
    $row_char_baka = array("BAKA","BOWBOW","CHEERKA","CHOCHO","BABOW","CHEERCHO","Who are we?","Chulalongkorn","Can you see?","LA!!");
    
    $option = '';

    for($y = 0; $y < $stand_h2; $y++){
        
        $option .= '<option value="'.$y.'">'.$row_char[$y].'</option>';
        
    }
    
    session_start();

	$query1 = "SELECT * FROM user WHERE id = '". $_COOKIE['id'] ."' LIMIT 1";

        $result1 = mysqli_query($link, $query1);

        $row1 = mysqli_fetch_assoc($result1);

    if($row1['role']!=1){
      echo '<meta http-equiv="refresh" content="0;url=index.php">';
    }
	
    if($_GET['action']=='request-seat'){
        
        $_SESSION['row'] = $_GET['row'];
            
        $_SESSION['column'] = $_GET['column'];
            
        echo '<meta http-equiv="refresh" content="0;url=by-seat.php">';
        
    }
    elseif($_GET['action']=='request-row'){
        
        $_SESSION['row'] = $_GET['row'];
            
        echo '<meta http-equiv="refresh" content="0;url=by-row.php">';
        
    }

?>


<div class="container main-container">
  

    <form class="my-4 mx-2" method="get" name="by-seat">
        
        <p class="h4">MOBILE VIEW</p>
        
        <input type="hidden" name="action" value="request-seat">
        
        <div class="form-row">

            <div class="form-group col">

                <label for="row">แถวที่ (ROW)</label>

                <select class="form-control" id="row" name="row" required>
                    <option value="">Please Select</option>
                    <?php echo $option; ?>    

                </select>

              <small class="form-text text-muted">จากบนลงล่าง: A, B, C, ..., AA, AB, AC, ... // From upper to lower zone: A, B, C, ..., AA, AB, AC, ...</small>

            </div>

        </div>

        <div class="form-row">

            <div class="form-group col">
              <label for="column">คนที่ (COLUMN)</label>
              <input type="number" min="1" max = "<?php echo ($stand_w2); ?>" class="form-control" id="column" name="column" required>
              <small class="form-text text-muted">จากซ้ายไปขวา (มองจากพิธีกร): 1, 2, 3, ... // From left to right (MC view): 1, 2, 3, ...</small>

            </div>

        </div>

        <button type="submit" class="btn btn-primary">View</button>
        
    </form>
    

    <form class="my-4 mx-2" method="get" name="by-row">
        
        <p class="h4">PRINT VIEW</p>
        
        <input type="hidden" name="action" value="request-row">
        
        <div class="form-row">

            <div class="form-group col">

                <label for="row">แถวที่ (ROW)</label>

                <select class="form-control" id="row" name="row" required>
                    <option value="-1">ALL ROWS</option>
                    <?php echo $option; ?>    

                </select>

              <small class="form-text text-muted">จากบนลงล่าง: A, B, C, ..., AA, AB, AC, ... // From upper to lower zone: A, B, C, ..., AA, AB, AC, ...</small>

            </div>

        </div>


        <button type="submit" class="btn btn-primary">View</button>
        
    </form>

</div>



<?php

    include("views/footer.php");

?>

