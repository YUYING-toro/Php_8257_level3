<?php
$name = $_POST["name"];
$principalamount = $_POST["principalamount"];
$rate = $_POST["rate"];
$years = $_POST["years"];
$postalcode = $_POST["postalcode"];
$phonenumber = $_POST["phonenumber"];
$email = $_POST["email"];
$error = false;
$method = $_POST["method"];
$time = $_POST["time"];

//数字不能为空和大于零
function validateNumber($number,$obj){
    if(!is_numeric($number)||$number<0){
    echo "<li>$obj must be a number and non-negative</li>";
    $GLOBALS['error'] = true;
}}

//不能为空
function validateBlank($input,$obj){
    if(strlen($input)== 0 ){
        echo "<li>$obj can not be blank</li>";
        $GLOBALS['error'] = true;
    }
}
//当选择电话时必须选择时间
function validatemethod($meth,$time){
    //echo count($time);
    
    if($meth == "Phone" && !isset($time)){
        $GLOBALS['error'] = true;
        echo "<li>$obj When preferred contact method is phone, you have to select one or more contact times</li>";
    }
}
//echo $name;
?>
<h3>Thank you, <?php echo $name ?>,for using our deposit calculator!</h3>
<span id="info"></span>
<ul>
<?php

    //echo "thankyou";
    validateNumber($principalamount, "Principal");
    validateNumber($rate, "Rate");
    validateBlank($name,"Name");
    validateBlank($postalcode,"Postalcode");
    validateBlank($phonenumber,"Phone number");
    validateBlank($email,"Email");
    validatemethod($method,$time);
    
     //if($method == "Phone" && !isset($time)){
        //echo "test";
     //}
?>
</ul>

<?php
if(!$error){
    echo 'Our customer service department will call you tomorrow '.implode(" or ", $time).','.' at'.' '.$phonenumber.'.';
    //for($a = 1;$a<=(int)$years;$a++){
    //$principalamount = $principalamount + $interst;
    //$interst = $principalamount*$rate/100;
    
    print <<<Mark
            <p>Following is the result of the calculation:</p>
            <table border="1">
            <tr><th>Year</th><th>Principal at Year Start</th><th>Interest for the Year</th></tr>
    Mark;
        $runningPrincipal = $principalamount;
	for($i = 1; $i <= $years; ++$i)
	{
	$interst = $runningPrincipal * $rate * 0.01;
	printf ("<tr><td>%s</td><td>\$%.2f</td><td>\$%.2f</td></tr>", $i, $runningPrincipal, $interst);
	$runningPrincipal += $interst;
        }
echo "</table>";
    //echo $a." ";   
    //echo " ";
     //printf ('%.2f',$principalamount);  
    //echo "<br>";
    //printf ('%.2f',$interst);
//     print <<<EOD
//                <table>
//                <tr>
//                <td>
//                 $a    
//                </td>
//                <td>
//             EOD;
//                   printf ('%.2f',$principalamount);   
//     print <<<EOD
//                </td>
//                <td>
//            EOD;
//                printf ('%.2f',$interst);
//     print <<<EOD
//                </td>
//                </tr>
//                </table>   
//     EOD;
    
}
else{
    echo "<script>document.getElementById('info').innerText='However we can not process your request because of the following input erors:';</script>";
}
?>
 