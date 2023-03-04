<?php 
    date_default_timezone_set('Asia/Dhaka');
    if(!(function_exists("p"))){
        function p($data){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }
    }
?>