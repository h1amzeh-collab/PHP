<?php
session_start();
if (!empty($_SESSION["counter"])) {
    $_SESSION["counter"] = 0;

} else {
    $_SESSION["counter"] += 1;
    echo $_SESSION["counter"];
}
?>