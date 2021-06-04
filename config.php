<?php

return [
  'db' => [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'expensas_db',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];