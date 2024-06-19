<?php

session_start();
session_destroy();

$_SESSION['stay-signed-in'] = False;

header('Location:index.php');