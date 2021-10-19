<?php
class RTSLabs {
    public function aboveBelow($the_list, $comp_value){
        $above = 0;
        $below = 0;
        # loop through the_list and compare the values
        foreach ($the_list as &$value) {
            if($value > $comp_value){
                $above++;
            }
            elseif($value < $comp_value){
                $below++;
            }
        }
        # create an array of the final results
        $output = array('above' => $above, 'below' => $below);
        # output results
        echo "<div style='background-color: #ddd; padding: 4px;'><strong>aboveBelow results</strong><br />";
        print_r($output);
        echo "</div>";
    }
    public function stringRotation($string, $rot){
        # not empty
        if($string and $rot){
            # not negative
            if($rot > 0){
                $movers = substr($string, -$rot);
                $new_string = str_replace($movers, "", $string);
                # output results
                echo "<div style='background-color: #ddd; padding: 4px;'><strong>stringRotation results</strong><br />";
                echo $movers.$new_string;
                echo "</div>";
            }
        }
    }
}
# aboveBelow submit
if(isset($_POST['sub1'])){
    if($_POST['the_list'] and $_POST['compare']){
        $array = explode(",",$_POST['the_list']);
        $number = $_POST['compare'];
        RTSLabs::aboveBelow($array, $number);
    }
}
# stringRotation submit
if(isset($_POST['sub2'])){
    if($_POST['original'] and $_POST['rotate']){
        $poofarts = "hello world";
        $fartspoo = 1;
        RTSLabs::stringRotation($_POST['original'], $_POST['rotate']);
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTSLabs First Test</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<form action="index.php" method="post" name="abovebelowfunc">
<div style="margin: 20px;">
    <strong style="font-size: 20px;">aboveBelow</strong><br />
    create the list (csv)<br />
    <input type="text" id="the_list" name="the_list" value="<?php if($_POST['the_list']){ echo $_POST['the_list']; } ?>" />
</div>
<div style="margin: 20px;">
    number to compare<br />
    <input type="text" id="compare" name="compare" value="<?php if($_POST['compare']){ echo $_POST['compare']; } ?>" />
</div>
<div style="margin: 30px 0 0 20px;">
    <input type="submit" value="Submit" id="sub1" name="sub1" />
</div>
</form>
<hr style="margin: 40px 0 40px 0;" />
<form action="index.php" method="post" name="stringrotationfunc">
<div style="margin: 20px;">
    <strong style="font-size: 20px;">stringRotation</strong><br />
    enter a string<br />
    <input type="text" id="original" name="original" value="<?php if($_POST['original']){ echo $_POST['original']; } ?>" />
</div>
<div style="margin: 20px;">
    rotation amount<br />
    <input type="text" id="rotate" name="rotate" value="<?php if($_POST['rotate']){ echo $_POST['rotate']; } ?>" />
</div>
<div style="margin: 30px 0 0 20px;">
    <input type="submit" value="Submit" id="sub2" name="sub2" />
</div>
</form>
</body>
</html>