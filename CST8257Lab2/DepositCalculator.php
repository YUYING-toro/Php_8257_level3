<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php 
            $name = $_POST["name"];
            $amount =$_POST["amount"];
            $rate = $_POST["rate"];  //???????????/必填入數字
            $year = $_POST["year"];

            $code=$_POST["code"];
            $phone=$_POST["phone"];
            $email=$_POST["email"];
            $contact=$_POST["contact"]; //radio
            $time = $_POST["time"];		//checkbox
            $showTable = true;
            
            function OutputTableRow( $years, $total, $rates ) 
            {
                $total = sprintf('%.2f', $total);
                $rates =sprintf('%.2f', $total*$rates/100);
            print "<tr><td >$years</td><td>$total</td><td>$rates</td></tr>";
                $total = sprintf('%.2f', $total+$rates);
            }
           
        ?>
        <meta charset="UTF-8">
        <title>title</title>
        <style>
            body{

                line-height: 1.5rem;
                background-image: linear-gradient(#00C2C0, #FFE145);
                min-height: 940px;
            }
        </style>
    </head>
    <body >
        
        <h1> Thank you <?php print_r($name);?>,for using our deposit caculator! </h1>
        <?php 

//            if(!isset($name) || !isset($amount)||!isset($rate) || !isset($year)||!isset($code)||!isset($phone)||!isset($email)||!isset($contact)||!isset($time))
//            {
//                echo '<p> However we can not process your request because of the following input errors:</p>';
//            } else {
//                echo '<p> Our customer service department will call you tomorrow agteernonn or evening at 513-599-0901.</p>'
//                        . '<p>The following is the result of the calculation:</p>';
//                $showTable = true;
//            }
        ?>
           
            
        <?php
        // put your code here
        echo "<span id='error'></span>";
	echo '<ul>';
        //$numTime = count($time);  //?????????????????????????? count(): Parameter must be an array or an object
        
        //判斷為數字 與大小
        
        //$cheAmount = is_numeric($amount);  //1 is number; 無 則文字
        //print( "this is" .$cheAmount. "tjids"); // 無法列印 非 tf
        if(!is_numeric($amount) ||$amount < 0 )  //不是數
        {
            echo '<li>The principal amount must be numberic and greater than 0</li>';
            $showTable =false;
        }// 不是正
        if(!is_numeric($rate) ||$rate < 0 )  //不是數
        {
            echo '<li>The rate must be numberic and greater than 0</li>';
            $showTable =false;
        }// 不是正
        if($name == "")
        {
            echo '<li>Name can not be bank</li>';
            $showTable =false;
        }
        if($code == "")
        {
            echo '<li>Postal code can not be bank</li>';
            $showTable =false;
        }
        if($phone == "")
        {
            echo '<li>Phone number can not be blank</li>';
            $showTable =false;
        }   
        if($email == "")   //true 有值  選電話又沒值
        {
            echo '<li> Email can not be blank</li>';
            $showTable =false;
        }
        if($code == "")
        {
            echo '<li> Please slesct one contact method</li>';
            $showTable =false;
        }   

        //echo "<h3>You speak ". $numTime. " language(s). </h3>"; 

        
        if(  $contact == ""|| $contact == "callphone" && !isset($time))   //true 有值  選電話又沒值
        {
            echo '<li> Please one contact method. When prefered contact method is phone, you have to slesct one or more contact times</li>';
            $showTable =false;
        }

        
        echo '</ul>';
        //done
        if($showTable == true)
        {
            if($contact == "callphone"){
                 echo'<p> Our customer service department will call you tomorrow '. implode(" or ", $time).','.' at'.' '.$phone.'.</p>';
                    
            }
            if($contact == "callemail"){
                 echo'<p> Our customer service department will contact you '. $email.' tomorrow</p>';
                    
            }
            echo '<p>The following is the result of the calculation:</p>';
            echo '<table border="1"; style="width: 100%"> <tr> <th>Year</th><th>Principal at Year Start</th><th>Interest for the Year</th></tr>';
            for ($i=1;$i <= $year; $i++)
            {
                OutputTableRow($i, $amount, $rate);
                $amount += $amount*$rate/100;
            }
            echo '</table> ';
        } else {
            echo "<script>document.getElementById('error').innerText='However we can not process your request because of the following input errors:';</script>";
            
        }
        
        
        
        
        
       ?>
        
    </body>
</html>
