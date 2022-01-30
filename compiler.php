<?php
    $language=$_POST["lang"];

    switch($language){
        case "c":
            include("Compile/c.php");
            break;
        case "cpp":
            include("Compile/cpp.php");
            break;
        case "js":
            include("Compile/javascript.php");
            break;
        case "java7":
            include("Compile/java.php");
            break;
        case "java8":
            include("Compile/java.php");
            break;
        case "python2":
            include("Compile/python.php");
            break;
        case "python3":
            include("Compile/python.php");
            break;
    }
?>