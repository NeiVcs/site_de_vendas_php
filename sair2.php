<?php

include('funcoes2.php');

session_destroy();
header('Location: login.php');
exit();

