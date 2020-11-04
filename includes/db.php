<?php
require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=reg2',
    'root', '' );
session_start();