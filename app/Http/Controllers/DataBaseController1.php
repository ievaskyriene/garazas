<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class DataBaseController1 extends Controller
{
 public function create(){
 $user = 'root';
 $pass = '';
 $dsn = "mysql:host=localhost;dbname=garazas1;charset=utf8mb4";
 $options = [
 \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
 \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
 \PDO::ATTR_EMULATE_PREPARES => false,
 ];
 try {
 $pdo = new \PDO($dsn, $user, $pass, $options);
 } catch (\PDOException $e) {
 throw new \PDOException($e->getMessage(), (int)$e->getCode());
 }

 try {
  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS users (
      id bigint(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
      name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      email varchar(255) COLLATE utf8mb4_unicode_ci  UNIQUE KEY NOT NULL,
      email_verified_at timestamp NULL DEFAULT NULL,
      password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
      created_at timestamp NULL DEFAULT NULL,
      updated_at timestamp NULL DEFAULT NULL
    )
  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

$pdo->exec($sql);
} catch(PDOException $e) {
echo $sql . '<br>' . $e->getMessage();
}

 try {
// sql to create table
 $sql = "CREATE TABLE IF NOT EXISTS mechanics (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(64) NOT NULL,
 surname VARCHAR(64) NOT NULL,
 portret VARCHAR(64),
 created_at TIMESTAMP,
 updated_at TIMESTAMP
 )";
 // use exec() because no results are returned
 $pdo->exec($sql);
 // echo “Table MyGuests created successfully“;
 } catch(PDOException $e) {
 echo $sql . "<br>" . $e->getMessage();
 }

 try {
  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS images (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  alt TEXT,
  nr INT(11),
  mechanic_id INT(11) UNSIGNED,
  image_name VARCHAR(64),
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (mechanic_id) REFERENCES mechanics(id)
  )";
  // use exec() because no results are returned
  $pdo->exec($sql);
      echo "Table images created successfully";
  } catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  }

 try {
 // sql to create table
 $sql = "CREATE TABLE IF NOT EXISTS trucks (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 maker VARCHAR(255) NOT NULL,
 plate VARCHAR(20) NOT NULL,
 make_year VARCHAR(11),
 mechanic_notices TEXT,
 mechanic_id INT(11) UNSIGNED NOT NULL,
 created_at TIMESTAMP,
 updated_at TIMESTAMP,
 FOREIGN KEY (mechanic_id) REFERENCES mechanics(id)
 )";
 // use exec() because no results are returned
 $pdo->exec($sql);
 // echo “Table MyGuests created successfully“;
 } catch(PDOException $e) {
 echo $sql . "<br>" . $e->getMessage();
 }
 }
}