<?php

    include("functions.php");

	session_start();

	error_reporting(E_ALL & ~E_WARNING); // ปิด Warning
	ini_set('display_errors', 0); // ปิดการแสดง error

	$query1 = "SELECT * FROM user WHERE id = '". $_COOKIE['id'] ."' LIMIT 1";

    $result1 = mysqli_query($link, $query1);

    $row1 = mysqli_fetch_assoc($result1);

    if($row1['role']!=1){
      header("Location: index.php");
    }

    $row_char = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ');
    
    $row_char_baka = array("BAKA","BOWBOW","CHEERKA","CHOCHO","BABOW","CHEERCHO","Who are we?","Chulalongkorn","Can you see?","LA!!");

    $query1 = "SELECT * FROM code WHERE type = '1' AND status = '0' ORDER BY category, sequence";

    $result1 = mysqli_query($link, $query1);

    $row1 = mysqli_fetch_all($result1);

    $code11 = '<table style="width: 100%;">';

	$currentCategory = ''; // เก็บ category ปัจจุบัน

    for($i = 0; $i < mysqli_num_rows($result1); $i++){
        
        $query_cat = "SELECT * FROM category WHERE id = ".$row1[$i][6];

        $result_cat = mysqli_query($link, $query_cat);

        $row_cat = mysqli_fetch_assoc($result_cat);
            
		// ตรวจสอบว่า category เปลี่ยนแปลงหรือไม่
        if ($currentCategory !== $row_cat['name']) {
                
              for($n = 0;($n< (5 - $i%5)) &&($i%5!=0); $n++) $code11 .= '<td style="border: 0.5px solid rgba(0, 0, 0, 0.5); padding: 2.5px;"></td>';
                
              //if($i!=0) $code11.='<tr><td style="padding: 5px;"></td></tr></tr>';

              // ตั้งค่า category ใหม่ และเริ่มต้น row ใหม่
              $currentCategory = $row_cat['name'];

              $code11 .= '<tr><td style="padding-top: 8px;"><small class="my-0 py-0" style="font-size: 10px;">' . $currentCategory . '</small></td></tr><tr>';
                
              for($n = 0; $n < $i%5 ;$n++) $code11 .= '<td style="border: 0.5px solid rgba(0, 0, 0, 0.5); padding: 2.5px;"></td>';
         }
            
        if($i%5 ==0 && $i!=0) $code11 .= '<tr><td></td></tr>';

        $code11 .= '
       
          	<td style="border: 1px solid rgba(0, 0, 0, 0.5); padding: 1px; margin: 0px;">
          	
            	<small class="text-muted" style="font-size: 10px; padding: 0px; margin: 0px;">'.str_pad($i+1, 3, "0", STR_PAD_LEFT).'</small>
          
            	<img src="code/1-1/'.$row1[$i][8].'.bmp" style="image-rendering: pixelated; width: 100%; padding: 0px; margin: 0px;">
			</td>


        ';
        
    }
	//for($n = 0;($n< (5 - $i%5)) && ($i!=0); $n++) $code11 .= '<td style="border: 0.5px solid rgba(0, 0, 0, 0.5); padding: 2.5px;"></td>';	
    
	$code11 .= '</tr></table>'; //ปิดแท็ก
    // 1-1-sequence
    $query2 = "SELECT * FROM code WHERE type = '2' AND status = '0' ORDER BY sequence";

    $result2 = mysqli_query($link, $query2);

    $row2 = mysqli_fetch_all($result2);

    $code11seq = '<table style="width:100%;">';

    for($i = 0; $i < mysqli_num_rows($result2); $i++){
        //$row2[$i][8] file name for path in code 1-1-seq folder
        //$row2[$i][5] file title
        $file_11seq = explode(",",$row2[$i][8]);
            
        $code11seq .= '<tr><td style="padding-top: 8px;"><small class="my-0 py-0" style="font-size: 10px;">Sequence : '.$row_char[$i].'</small></td></tr><tr>';
            
        for($j = 0; $j < sizeof($file_11seq); $j++){
                
			if($j%5 ==0 && $j!=0) $code11seq .= '<tr><td></td></tr>';
                
            $code11seq .= '

			<td style="border: 1px solid rgba(0, 0, 0, 0.5); padding: 1px; margin: 0px;">

                <small class="text-muted my-0 py-0" style="width: 100%;">'.str_pad($j+1, 2, "0", STR_PAD_LEFT).'</small>

                <img src="code/1-1-sequence/'.$file_11seq[$j].'.bmp" style="image-rendering: pixelated; width:100%">

			</td>

            ';
            
        }
            
        for($n = 0; ($n < (5 - $j%5)) && ($j%5!=0); $n++) $code11seq .= '<td style="border: 0.5px solid rgba(0, 0, 0, 0.5); padding: 2.5px;"></td>';
        
        $code11seq .= '</tr>';
        
    }
	$code11seq .= '</table>'; // ปิดแท็ก
    // 1-25
    $query3 = "SELECT * FROM code WHERE type = '3' AND status = '0' ORDER BY sequence";

    $result3 = mysqli_query($link, $query3);

    $row3 = mysqli_fetch_all($result3);

    $code125 = '<table style="width:100%;"><td style="padding-top: 8px; border: 0%"></td>';

    for($i = 0; $i < mysqli_num_rows($result3); $i++){
        

        $code125 .= '
  			<tr style="padding-top: 8px;"><td style="padding-top: 8px; border: 0.5px solid rgba(0, 0, 0, 0.5); padding: 2.5px;">
            <small class="text-muted my-0 py-0" style="width: 100%;">'.str_pad($i+1, 2, "0", STR_PAD_LEFT).'</small>
            <img src="code/1-25/'.$row3[$i][8].'.bmp" style="image-rendering: pixelated; width: 100%;">
			</td></tr>
        ';
            
        if($row3[$i][10]!=''){
            
                $code125 .= '
                    <tr style="padding-top: 8px;"><td style="padding-top: 8px; border: 0.5px solid rgba(0, 0, 0, 0.5); padding: 2.5px;">
                    <small class="text-muted my-0 py-0" style="width: 100%;">OP '.str_pad($i+1, 2, "0", STR_PAD_LEFT).'</small>
                    <img src="code/1-25/op/'.$row3[$i][10].'.bmp" style="image-rendering: pixelated; width: 100%;">
                    </td></tr>
                ';
        }
        
    }
    
	$code125 .= '</table>';
	
	// MP
    $query4 = "SELECT * FROM code WHERE type = '4' AND status = '0' ORDER BY sequence";

    $result4 = mysqli_query($link, $query4);

    $row4 = mysqli_fetch_all($result4);

    $codeMP = '<table style="width:100%;">';

    for($i = 0; $i < mysqli_num_rows($result4); $i++){
        //$row4[$i][8] file name for path in code BAKA folder
        //$row4[$i][5] file title
        $file_MP= explode(",",$row4[$i][8]);
            
        $codeMP .= '<tr><td style="padding-top: 8px;"><small class="my-0 py-0" style="font-size: 10px;">MP : '.$row_char[$i].' ( '.$row4[$i][5].' )</small></td></tr><tr>';
            
        for($j = 0; $j < sizeof($file_MP); $j++){
                
			if($j%5 ==0 && $j!=0) $codeMP .= '<tr><td></td></tr>';
                
            $codeMP .= '

			<td style="border: 1px solid rgba(0, 0, 0, 0.5); padding: 1px; margin: 0px; width: 20%;">

                <small class="text-muted my-0 py-0" style="width: 100%;">'.str_pad($j+1, 2, "0", STR_PAD_LEFT).'</small>

                <img src="code/MP/'.$file_MP[$j].'.bmp" style="image-rendering: pixelated; width:100%">

			</td>

            ';
            
        }
            
        for($n = 0; ($n < (5 - $j%5)) && ($j%5!=0); $n++) $codeMP .= '<td style="border: 0.5px solid rgba(0, 0, 0, 0.5); padding: 2.5px;"></td>';
        
        $codeMP .= '</tr>';
        
    }
	$codeMP .= '</table>'; // ปิดแท็ก
	
	// BAKA
    $query5 = "SELECT * FROM code WHERE type = '5' AND status = '0' ORDER BY sequence";

    $result5 = mysqli_query($link, $query5);

    $row5 = mysqli_fetch_all($result5);

    $codeBAKA = '<table style="width:100%;">';

    for($i = 0; $i < mysqli_num_rows($result5); $i++){

        $file_BAKA= explode(",",$row5[$i][8]);
            
        $codeBAKA .= '<tr><td style="padding-top: 8px;"><small class="my-0 py-0" style="font-size: 10px;">BAKA : </small></td></tr><tr>';
            
        for($j = 0; $j < sizeof($file_BAKA); $j++){
                
			if($j%5 ==0 && $j!=0) $codeBAKA .= '<tr><td></td></tr>';
                
            $codeBAKA .= '

			<td style="border: 1px solid rgba(0, 0, 0, 0.5); padding: 1px; margin: 0px; width: 20%;">

                <small class="text-muted my-0 py-0" style="width: 100%;">'.$row_char_baka[$j].'</small>

                <img src="code/BAKA/'.$file_BAKA[$j].'.bmp" style="image-rendering: pixelated; width:100%">

			</td>

            ';
            
        }
            
        for($n = 0; ($n < (5 - $j%5)) && ($j%5!=0); $n++) $codeBAKA .= '<td style="border: 0.5px solid rgba(0, 0, 0, 0.5); padding: 2.5px;"></td>';
        
        $codeBAKA .= '</tr>';
        
    }
	$codeBAKA .= '</table>'; // ปิดแท็ก

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

	<link rel="stylesheet" href="styles.css">
      
    <link rel="icon" href="favicon.png">
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>PRINT SUMMARY</title>
        
    </head>
	
    <body>

    <?php echo $code11; ?>

    <?php echo $code11seq; ?>
                
    <?php echo $code125; ?>
    
    <?php echo $codeMP;?>
    
    <?php echo $codeBAKA;?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

  </body>
</html>