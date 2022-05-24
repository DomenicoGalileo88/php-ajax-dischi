<?php

include __DIR__ . '/db.php';

header('Content-Type: application/json');

header('Access-Control-Allow-Origin: *');
echo json_encode($discs);
