<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('BASE', 'controlestoque');

$conn = new mysqli(HOST, USER, PASSWORD, BASE);



$result = $conn->query($sql);
