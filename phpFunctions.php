<?php
 /** 
 *  Accepts a string and determines string length, removes trailing and leading white space, lowers the case of each character, and determines is DMACC is in the provided string
 * @param $string is the user entered value 
 * @return $stringArray whose indicies each contain a maniputalted version of the string
 */
     function stringFormatter($string) {
        $length = strlen($string);
       $trim = trim($string);
     $lowerCase = strtolower($string);
    if (!(stripos($string, 'DMACC')===false )) {
            $value = "Match";
            
        } else {
             $value = "No Match";
             
        }   
         $stringArray = array($length, $trim, $lowerCase, $value);
         return $stringArray;
    } 
/** 
 *  Accepts a string formats it to m/d/y format
 * @param $string is the user entered value 
 * @return $formattedDate is the new formatted date 
 */    
     function dateFormatter($string) {
         //Checking if valid Timestamp was entered
            if(strtotime($string) === false ){
                
                $formattedDate = "Invalid Entry";
            }
            else {
               $dateobject = strtotime($string);
                $formattedDate = date("m/d/Y", $dateobject);
            }  
           
            return $formattedDate;
     }
/** 
 *  Accepts a string formats it to y/m/d format
 * @param $string is the user entered value 
 * @return $formattedDate is the new international formatted date 
 */    
     function internationalDateFormatter($string) {
         //Checking if valid Timestamp was entered
         if(strtotime($string) === false) {
             $formattedDate = "Invalid Entry";
         }
         else {
            $dateobject = strtotime($string);
            $formattedDate = date("Y-m-d", $dateobject);
         }
        
        return $formattedDate;
 }
 /** 
 *  Accepts a number and formats it to inlcude commas and deicmals that adhere to decimal system weighted values
 * @param $string is the user entered value 
 * @return $formattedNumber is the new formatted number 
 */   
    function numberFormatter($string) {
        $formattedNumber = number_format($string,2);
        return $formattedNumber;
    }
/** 
 *  Accepts a number and formats it to US curreny 
 * @param $string is the user entered value 
 * @return $formattedNumber is the new formatted number 
 */   
    function usNumberFormatter($string) {
        //this function is creating a numberFormaater object and assigning to $fmt
        $fmt = numfmt_create('en_US', NumberFormatter::CURRENCY);
        $formattedNumber = numfmt_format_currency($fmt, $string, "USD");
        return $formattedNumber;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="This webpage will use php to format dates, times and string inputs">
  <meta name="keywords" content="PHP, Date Formatter">
  <meta name="author" content="Joshua Allen">
  <link rel="stylesheet" href="phpFunctions.css">
  <title>Document</title>
            <!-- 
                Joshua Allen
                Unit-3 Assignment
                September 22, 2021
             -->
             
</head>
<body>
<div class="container">
        <h1>PhP Functions</h1>
            <main>
                <form id="form1" method="post"action="phpFunctions.php">
                    <label for="text1">1. Create a function that will accept a date input and format it into mm/dd/yyyy format.</label><input type="text" name="text1" id="text1"><input type="submit" value="Submit"><?php if (isset($_POST["text1"])){$dateString = $_POST["text1"]; echo "The formatted date is : " . dateFormatter($dateString);} ?> 
                </form>
                <form id="form2" method="post"action="phpFunctions.php">
                    <label for="text2">2. Create a function that will accept a date input and format it into dd/mm/yyyy format to use when working with international dates.</label><input type="text" name="text2" id="text2"><input type="submit" value="Submit"><?php if(isset($_POST["text2"])) {$internationalDateString = $_POST["text2"]; echo "The formatted international date is : " . internationalDateFormatter($internationalDateString);}?> 
                </form>
                <form id="form3" method="post"action="phpFunctions.php">
                    <label for="text3">3. Create a function that will accept a string input.  It will do the following things to the string:</label> <input type="text" name="text3" id="text3"><input type="submit" value="Submit">
                    <ul>
                        <li>Display the number of characters in the string</li><?php if(isset($_POST["text3"])) {$string = $_POST["text3"]; echo stringFormatter($string)[0];} ?>
                        <li>Trim any leading or trailing whitespace</li><?php if(isset($_POST["text3"])) {$string = $_POST["text3"]; echo stringFormatter($string)[1];} ?>
                        <li>Display the string as all lowercase characters</li><?php if(isset($_POST["text3"])) {$string = $_POST["text3"]; echo stringFormatter($string)[2];} ?>
                        <li>Will display whether or not the string contains "DMACC" either upper or lowercase</li><?php if(isset($_POST["text3"])) {$string = $_POST["text3"]; echo stringFormatter($string)[3];} ?>
                    </ul>
                </form>
                <form id="form4" method="post"action="phpFunctions.php">
                    <label for="text4">4. Create a function that will accept a number and display it as a formatted number. Use 1234567890 for your testing.</label><input type="text" name="text4" id="text4"><input type="submit" value="Submit"><?php if(isset($_POST["text4"])) {$numString = $_POST["text4"]; echo "The formatted number is : " . numberFormatter($numString);} ?> 
                </form>
                <form id="form5" method="post"action="phpFunctions.php">
                    <label for="text5">5. Create a function that will accept a number and display it as US currency. Use 123456 for your testing.</label><input type="text" name="text5" id="text5"><input type="submit" value="Submit"><?php  if(isset($_POST["text5"])) {$usNumString = $_POST["text5"]; echo "The US Dollar value is: " . usNumberFormatter($usNumString);} ?>
                </form>
            </main> 
    </div><!--end of container-->
</body>
</html>