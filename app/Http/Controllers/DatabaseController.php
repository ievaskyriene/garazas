<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class DataBaseController extends Controller
{
 public function create1(){
     dd("labas");
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
 $sql = "CREATE TABLE IF NOT EXISTS mechanics (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(64) NOT NULL,
 surname VARCHAR(64) NOT NULL,
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
 $sql = "CREATE TABLE IF NOT EXISTS trucks (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 maker VARCHAR(255) NOT NULL,
 plate VARCHAR(20) NOT NULL,
 make_year TINYINT(4) UNSIGNED,
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