<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab">
	<link rel="stylesheet" href="<?php echo URL; ?>css/reset.css">
	<link rel="stylesheet" href="<?php echo URL; ?>css/style.css">
</head>
<body>
    <div class="container">
        <div class="row row-padding">
            <h1><a href="<?php echo URL; ?>">MVC</a></h1>
        </div>
        <div class="row">
                <div class="button button-outline button-margin-10"><a href="<?php echo URL; ?>products">Products</a></div>
                <div class="button button-outline button-margin-10"><a href="<?php echo URL; ?>pages">Pages</a></div>
                <div class="button button-outline button-margin-10"><a href="<?php echo URL; ?>users">Users</a></div>
                <?php if (!isset($_SESSION['user_id'])) { ?>
                <div class="button button-outline button-margin-10"><a href="<?php echo URL; ?>users/add">Register</a></div>
                <div class="button button-green button-margin-10"><a href="<?php echo URL; ?>users/login">Log In</a></div>
                <?php } else {  ?>
                <div class="button button-outline button-margin-10"><a href="<?php echo URL; ?>users/profile">Profile</a></div>
                <div class="button button-black button-margin-10"><a href="<?php echo URL; ?>users/logout">Log Out</a></div>
                <?php } ?>
        </div>