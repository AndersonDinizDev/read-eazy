<?php

try {
  $database = new PDO("mysql:host=db;dbname=readeazy", "admin", "admin");
  $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $database;
} catch (PDOException $e) {
  $this->error = $e->getMessage();
}
