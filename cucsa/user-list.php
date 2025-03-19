<?php
    include("actions.php");
    include("views/header.php");

    // ดึงข้อมูลสมาชิกจากตาราง user
    $query_admin = "SELECT nickname FROM user WHERE role = 1";
    $result_admin = mysqli_query($link, $query_admin);

    $query_member = "SELECT nickname FROM user WHERE role = 2";
    $result_member = mysqli_query($link, $query_member);
?>

<div class="container main-container">

    <!-- ส่วนของ admin -->
    <h2 class="my-4">Mentor List</h2>
    <ul class="list-group">
        <?php while($row_admin = mysqli_fetch_assoc($result_admin)): ?>
            <li class="list-group-item"><?php echo $row_admin['nickname']; ?></li>
        <?php endwhile; ?>
    </ul>

    <!-- ส่วนของ member -->
    <h2 class="my-4">Member List</h2>
    <ul class="list-group">
        <?php while($row_member = mysqli_fetch_assoc($result_member)): ?>
            <li class="list-group-item"><?php echo $row_member['nickname']; ?></li>
        <?php endwhile; ?>
    </ul>

</div>

<?php
    include("views/footer.php");
?>
