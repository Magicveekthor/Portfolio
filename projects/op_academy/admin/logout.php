<?php

#connection file
include "includes/db.php";

setcookie('tutor_id', '' , time() - 1, '/');
header('Location: index.php');

