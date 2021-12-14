<?php
include 'header.php';
Session::destroy();
header("location: login.php");