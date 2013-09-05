<?php

require_once '../config/config.php';

use Rds\Wordcounter;

$wordCounter = new Wordcounter;

echo $wordCounter->countWords($_POST['input']);