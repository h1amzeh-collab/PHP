<?php
if(isset($_POST["url"])){
    header("Location:". $_POST["url"]);
}else
echo "sorry url is not found";
?>