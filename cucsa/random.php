<?php
    //there are bug if have multiple file including 1-1seq MP BAKA 
    include("actions.php");

	$query1 = "SELECT * FROM user WHERE id = '". $_COOKIE['id'] ."' LIMIT 1";

        $result1 = mysqli_query($link, $query1);

        $row1 = mysqli_fetch_assoc($result1);

    if($row1['role']!=1){
      header("Location: index.php");
    }

    include("views/header.php");
	
	// รับค่าจากฟอร์ม

    $category = isset($_GET['category']) ? $_GET['category'] : '';
    $type = isset($_GET['type']) ? $_GET['type'] : '';
	
	// แปลงค่าของ type เป็นตัวเลข
    $type_mapping = [
        "1:1" => 1,
        "1:1_sequence" => 2,
        "1:25" => 3
    ]; 
	
	$type_value = isset($type_mapping[$type]) ? $type_mapping[$type] : '';

    // สร้างเงื่อนไข SQL สำหรับการสุ่ม
    $where_conditions = [];

    // ถ้ามีการเลือก category, ให้เพิ่มเงื่อนไข
    if ($category != '') {
        $where_conditions[] = "category = $category";
    }

    // ถ้ามีการเลือก type, ให้เพิ่มเงื่อนไข
    if ($type_value != '') {
        $where_conditions[] = "type = $type_value";
    }

    // เพิ่มเงื่อนไข status = 0
    $where_conditions[] = "status = 0";  // เพิ่มเงื่อนไข status = 0

    // สร้างคำสั่ง SQL
    $query_code = "SELECT * FROM code"; 

    // ถ้ามีเงื่อนไขการเลือก category หรือ type, เพิ่มเงื่อนไข WHERE
    if (!empty($where_conditions)) {
        $query_code .= " WHERE " . implode(" AND ", $where_conditions);
    }

    // การสุ่มข้อมูลจากฐานข้อมูล
    $query_code .= " ORDER BY RAND() LIMIT 1"; // จำกัดผลลัพธ์ที่ 1 แถว
  
    // ดำเนินการ query
    $result_code = mysqli_query($link, $query_code);

    // ตรวจสอบผลลัพธ์
    if ($result_code && mysqli_num_rows($result_code) > 0) {
        $row_code = mysqli_fetch_assoc($result_code);
        $title = $row_code['title']; // ดึง title จากผลลัพธ์
        $filename = $row_code['filename']; // ดึง filename จากฐานข้อมูล
        $type_id = $row_code['type']; // ดึง type จากฐานข้อมูล
    } else {
        $title = "No results found"; // ถ้าไม่มีผลลัพธ์
        $filename = "";
    }

    // กำหนดโฟลเดอร์ตาม type
    $folder_mapping = [
        1 => "1-1",
        2 => "1-1_sequence",
        3 => "1-25"
    ];

    // ตรวจสอบว่า type ของเรามีใน array หรือไม่
    $folder = isset($folder_mapping[$type_id]) ? $folder_mapping[$type_id] : "";

    // สร้างเส้นทางของไฟล์รูปภาพ
    $image_path = !empty($folder) && !empty($filename) ? "code/$folder/$filename.bmp" : "";

//ดึงข้อมูลสำหรับ select

	// คำสั่ง SQL เพื่อดึงข้อมูล category
	$query_category = "SELECT id, name FROM category"; // เปลี่ยนเป็นตารางและคอลัมน์จริงของคุณ
	$result_category = mysqli_query($link, $query_category);

	// ตรวจสอบว่ามีข้อมูลหรือไม่
	if ($result_category->num_rows > 0) {
    // สร้างตัวแปรเพื่อเก็บตัวเลือก category
    $category_options = "";
    while ($row = mysqli_fetch_assoc($result_category)) {
        $category_options .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
} else {
    $category_options = "<option value=''>No categories found</option>";
}
	// ดึงชื่อ category ที่เลือก
    $category_name = '';
    if ($category != '') {
        $query_category_name = "SELECT name FROM category WHERE id = $category";
        $result_category_name = mysqli_query($link, $query_category_name);
        if ($result_category_name && mysqli_num_rows($result_category_name) > 0) {
            $row_category_name = mysqli_fetch_assoc($result_category_name);
            $category_name = $row_category_name['name']; // เก็บชื่อ category
        }
    }
?>
<div class="container main-container">
  
    <!-- Category and Type Form -->
    <form class="my-4 mx-2" method="get" name="by-category-type">
        
        <p class="h4">Randomizer &nbsp;&nbsp;&nbsp; <small style="color: red;"><small><h5>There are only 1:1 and 1:25</h5></small></small></p>
        
        <input type="hidden" name="action" value="request-category-type">
        
        <div class="form-row">

            <!-- Category Selection -->
            <div class="form-group col">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                    <option value="">Please Select</option>
                    <?php echo $category_options; ?>
                </select>
                <small class="form-text text-muted">Choose category i.e. attack flirt ball.</small>
            </div>

        </div>

        <div class="form-row">

            <!-- Type Selection -->
            <div class="form-group col">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type">
                    <option value="">Please Select</option>
                    <option value="1:1">1:1</option>
                    <!-- <option value="1:1_sequence">1:1 Sequence</option> -->
                    <option value="1:25">1:25</option>
                </select>
                <small class="form-text text-muted">Choose type (1:1 ,1:1 Sequence and 1:25 ).</small>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">View</button>
        
    </form>
  
</div>
<div class="container main-container">
    <!-- แสดงข้อมูล category และ type ที่เลือก -->
    <h5 style="display: inline;">Category: <t></t></h5>&nbsp;&nbsp;&nbsp;&nbsp;
	<h6 style="display: inline;color: #007bff;"><?php echo $category_name ? $category_name : "Not selected"; ?></h6>

	<br> <!-- ใช้ line break เพื่อแยกไปยังบรรทัดถัดไป -->

	<h5 style="display: inline;">Type: </h5>&nbsp;&nbsp;&nbsp;&nbsp;
	<h6 style="display: inline;color: #007bff;"><?php echo $type ? $type : "Not selected"; ?></h6>



    <?php if (!empty($image_path) && file_exists($image_path)) : ?>
        <div class="col-sm-4 col-xs-4 col-4 col-xl-2 col-lg-2 col-md-3 mx-0 px-1 my-1 py-0">
            <span><?php echo str_pad(1, 3, "0", STR_PAD_LEFT); ?> (ID: <?php echo $row_code['id']; ?>)</span>
            <form method="post" action="/cucsa/editor.php">
                <input type="hidden" name="action" value="edit-code">
                <input type="hidden" name="id" value="<?php echo $row_code['id']; ?>">
                <input class="my-0 py-0" type="image" name="submit" border="0" alt="Submit" src="<?php echo $image_path; ?>" style="image-rendering: pixelated; width: 100%;">
                <small class="form-text text-muted my-0 py-0"><?php echo $title; ?></small>
            </form>
        </div>
    <?php else: ?>
        <p>No image found.</p>
    <?php endif; ?>
</div>






<?php

    include("views/footer.php");

?>

