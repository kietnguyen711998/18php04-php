<?php
echo "Bài tập 1: tính tổng 2 số có tham số truyền vào";
$number1 = 3;
$number2 = 100;
$sum = $number1 + $number2; // $sum thây đổi theo và lưu lại theo từng hàm với lq khác nhau.
function FunctionSum ($number1, $number2)
{   
    
    echo $sum = $number1 + $number2;
    if ($sum % 2 == 0)
    {
        echo "<br> là số chẵn.";
    }
    else
    {
        echo "<br> là số lẻ.";
    } 
}
echo "<br> Kết quả = ", FunctionSum($number1, $number2);
echo "<br> <br>Bài tập 2:";
function FunctionBaiTap2($sum)
{
    if ($sum % 3 == 0)
    {
        echo "<br> có chia hết cho 3.";
    }
    else
    {
        echo "<br> không chia hết cho 3";
    }
}
echo FunctionBaiTap2($sum);
// =============== bài tập 3 ================
echo "<br>";
function FunctionMonth () 
{
    echo "<br>Bài tập 3:<br>";
    $month = 6;
    if ($month >= 1 && $month <=12)
    {
        echo "Tháng nhập vào là: ", $month, "<br>";
        switch ($month)
        {   
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                echo "Tháng này có 31 ngày";
                break;
            
            case 2:
                echo "tháng này có 29 ngày, năm nhuận thì có 28 ngày.";
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                echo "tháng này có 30 ngày.";
                break;
        }
    }
}
echo FunctionMonth ();
// =================== bài tập 4
function FunctionBaiTap4($sum)
{
    echo "<br> <br> Bài tập 4: <br>";
    echo "Kết quả của bài 1 là: ", $sum, "<br>";
    if ($sum <= 1000)
    {
        $sum = $sum % 10;  
        echo "Hàng đơn vị là: " , $sum, "<br>";
        if ($sum % 3 == 0)
        {
            echo "hàng đơn vị chia hết cho 3 = ", $sum / 3;
        }
        else
        {
            echo "hàng đơn vị không chia hết cho 3";
        }
    }
    else
    {
        echo "Tổng lớn hơn 1000 nên không làm việc.";
    }
}
FunctionBaiTap4($sum);
?>