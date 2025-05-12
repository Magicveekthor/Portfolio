<?php

#connection file
include "includes/db.php";

setcookie('id', '' , time() - 1, '/');
header('Location: index.php');

