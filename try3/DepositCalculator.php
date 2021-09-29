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
            $rate = $_POST["rate"]/100;
            $year = $_POST["year"];

            $code=$_POST["code"];
            $phone=$_POST["phone"];
            $email=$_POST["email"];
            $contact=$_POST["contact"]; //radio
            $time = $_POST["time"];		//checkbox
            $showTable = false;
            
            function OutputTableRow( $years, $total, $rates ) 
            {
                $total = sprintf('%.2f', $total);
                $rates =sprintf('%.2f', $total*$rates);
            print "<tr><td >$years</td><td>$total</td><td>$rates</td></tr>";
                $total = sprintf('%.2f', $total+$rates);
            }
        ?>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1> Thank you <?php print_r($name);?>,for using our deposit caculator! </h1>
        <?php 
            if(!isset($name) || !isset($amount)||!isset($rate) || !isset($year)||!isset($code)||!isset($phone)||!isset($email)||!isset($contact)||!isset($time))
            {
                echo '<p> However we can not process your request because of the following input errors:</p>';
            } else {
                echo '<p> Our customer service department will call you tomorrow agteernonn or evening at 513-599-0901.</p>'
                        . '<p>The following is the result of the calculation:</p>';
                $showTable = true;
            }
        ?>
           
            
        <?php
        // put your code here
	echo '<ul>';
        //$numTime = count($time);  //?????????????????????????? count(): Parameter must be an array or an object
        
        //判斷為數字 與大小
        
        $cheAmount = is_numeric($amount);  //1 is number; 無 則文字
        //print( "this is" .$cheAmount. "tjids"); // 無法列印 非 tf
        if($cheAmount != 1)  //不是數
        {
            echo '<li>The principal amount must be numberic and greater than 0</li>';

        }elseif ($amount < 0) 
        {
            echo '<li>The principal amount must be numberic and non-negative</li>';
        } // 不是正
        
        if($code == "")
        {
            echo '<li>Postal code can not be bank</li>';
        }
        if($phone == "")
        {
            echo '<li>Phone number can not be blank</li>';
        }       

        //echo "<h3>You speak ". $numTime. " language(s). </h3>"; 
        
        
        if(!isset($time))   //true 有值
        {
            echo '<li> When prefered contact nethod is phone, you have to slesct one or more contact times</li>';
        }
        echo '</ul>';
        //done
        if($showTable == true)
        {
            echo '<table border="1"; style="width: 100%"> <tr> <th>Year</th><th>Principal at Year Start</th><th>Interest for the Year</th></tr>';
            for ($i=1;$i <= $year; $i++)
            {
                OutputTableRow($i, $amount, $rate);
                $amount += $amount*$rate;
            }
            echo '</table> ';
        }
        
        
        
        
        
       ?>
        
    </body>
</html>
