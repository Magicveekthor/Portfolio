<?php 
session_start();

include "admin/includes/db.php";
include "includes/functions.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | LAURA AMAH</title>
    <link rel="shortcut icon" href="admin/images/soulwhite.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Federo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Federo', sans-serif;
        }

        .btn {
            outline: none;
            border: none;
            background-color: #222222;
            color: #fff;
            cursor: pointer;
            padding: 10px 60px;
            transition: all 0.3s ease 0s;
            font-size: 22px;
            font-weight: 500;
            border-radius: 30px;
        }

        .btn:hover {
            background: #dd2a2a;
        }

        .success {
            width: 400px;
            background: #eeeeee;
            border-radius: 6px;
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%,-50%);
            text-align: center;
            padding: 0 30px 30px;
            color: #333;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.4);
        }

        .success img {
            width: 100px;
            margin-top: -50px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .success h2 {
            font-size: 38px;
            font-weight: 500;
            margin: 30px 0 10px;
        }

        .success button {
            margin-top: 50px;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 4px 5px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 480px) {
            .success {
                width: 350px;
            }
        }
    </style>
</head>
<body>

    <?php include 'includes/header.php';?>

    <div class="container">
        <!-- <button type="submit" class="btn">Submit</button> -->

        <div class="success">
            <img src="images/tick.png">
            <h2>Thank You!</h2>
            <p>Your payment was successful and your order will be processed shortly.</p>
            <a href="shop.php"><button type="submit" class="btn" href="../shop.php">Ok</button></a>
        </div>
    </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/main.js"></script>
</body>
</html>