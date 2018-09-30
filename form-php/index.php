<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    span{
        color: red;
    }

    #succeed {
        color: #00ff00;
    }
    </style>
</head>
<body>
<?php
$erroname = "";
$erroemail = "";
$erropass = "";
$erroagainpass = "";
$erropeople = "";
$errosex = "";
$check = 0;
$errocontry = ""; 

// save value
$savename = "";
$saveemail = "";
$savepass = "";
$saveagainpass = "" ;
$savesexmale = $savesexfmale = $savesexother = "";
$saveinformation = "";
$checkhn = $checkdn = $checkhcm = "";
    if (isset($_POST["submit"])) {
        if ($_POST["name"] == "")
        {
            $erroname = "Input Name";
        }
        else
        {
            $savename = $_POST["name"];
            $check ++;
        }

        if ($_POST["email"] == "") {
            $erroemail = "Input Email";
        }
        else
        {
            $saveemail = $_POST["email"];
            $check ++;
        }

        if ($_POST["pass"] == "")
        {
            $erropass = "Input Password";
        }
        else
        {
            $savepass = $_POST["pass"];
            $check ++;
        }

        if ($_POST["againpass"] == "" || $_POST["pass"] != $_POST["againpass"]) {
            $erroagainpass = "Không khớp";
        }
        else
        {
            $saveagainpass = $_POST["againpass"];
            $check ++;
        }

        //======================KIỂM TRA GIỚI TÍNH ==================
        if ($_POST["sex"] == false)
        {
            $errosex = "Select Sex";
        }
        else
        {
            $check ++;
            if ($_POST["sex"] == "Male")
            {
                $savesexmale = "checked";
            }
            if ($_POST["sex"] == "Fmale")
            {
                $savesexfmale = "checked";
            }
            if ($_POST["sex"] == "Other")
            {
                $savesexother = "checked";
            }
        }

        // =================== KIỂM TRA TEXT AREA
        if ($_POST["people"]== "") {
            $erropeople = "Input Information";
        }
        else
        {
            $check ++;
            
        }

        // ========================== KIỂM TRA CONTRY=======================
        if ($_POST["contry"] == ""){
            $errocontry = "select contry";
        }
        else{
            $check ++;
            if($_POST["contry"] == "hanoi")
            {
                $checkhn = 'selected';
            }
            if($_POST["contry"] == "danang")
            {
                $checkdn = 'selected';
            }
            if($_POST["contry"] == "hcm")
            {
                $checkhcm = 'selected';
            }
        }


        //=============== KIỂM TRA IMAGE=========================
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Bước 1: Tạo thư mục lưu file
            $error = array();
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
            // Kiểm tra kiểu file hợp lệ
            $type_file = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
            $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $error['fileUpload'] = "File bạn vừa chọn hệ thống không hỗ trợ";
            }
            //Kiểm tra kích thước file
            $size_file = $_FILES['fileUpload']['size'];
            if ($size_file > 5242880) {
                $error['fileUpload'] = "File bạn chọn không được quá 5MB";
            }
            if (empty($error)) {
                if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                    $flag = true;
                    $check ++;
                }
            }
        }

        if ($check == 8) {
            $_POST["succeed"] = "bạn đã đăng ký thành công";
        }
        else
        {
            alert($check);
        }
    }
?>

<form method = "POST" enctype="multipart/form-data">
    <p>Họ và tên</p>
    <input type = "text" name = "name" value = "<?php echo $savename ?>">
    <span name = "erroname"><?php echo $erroname ?></span>
    <p>Email</p>
    <input type = "email" name = "email" value = "<?php echo $saveemail ?>">
    <span name = "erroemail"><?php echo $erroemail ?></span>
    <p>Mật khẩu</p>
    <input type = "password" name = "pass" value = "<?php echo $saveagainpass ?>">
    <span name = "erropass"><?php echo $erropass ?></span>
    <p>Nhập lại mật khẩu</p>
    <input type = "password" name = "againpass" value = "<?php echo $saveagainpass ?>">
    <span name = "erroagainpass"><?php echo $erroagainpass ?></span>
    <p>Giới tính</p>
    <input type = "radio" name = "sex" value = "Male" <?php echo $savesexmale ?>> Male
    <input type = "radio" name = "sex" value = "Fmale" <?php echo $savesexfmale ?>> Fmale
    <input type = "radio" name = "sex" value = "Other" <?php echo $savesexother ?>> Other
    <span name = "errosex"><?php echo $errosex ?></span>
    <p>Quê quán</p>
    <select name = "contry" value = "<?php echo $savecontry ?>">
        <option value = "">
        ---select---
        </option>
        <option value = "hanoi" name = "hanoi" <?php echo $checkhn ?>>
        Hà Nội
        </option>
        <option value = "danang" name = "danang" <?php echo $checkdn ?>>
        Đà Nẵng
        </option>
        <option value = "hcm" name = "hcm" <?php echo $checkhcm ?>>
        HCM
        </option>
    </select>
        <span name = "errocontry"><?php echo $errocontry ?></span>
        <p>Mô tả bản thân</p>
        <textarea name = "people" row = "5" cols = "20" required="required" placeholder="Đây là vùng nhập"></textarea>
        <span name = "erropeople"><?php echo $erropeople ?></span>
        <p>Avatar</p>
        <input type="file" name="fileUpload"  id="fileUpload" >
        <input type = "submit" name = "submit">
</form>

<img src="<?php echo $target_file; ?>">
<p id = "succeed"></p>
</body>
</html>