<?php

class CRUD extends PDO {

public function __construct(){
    parent::__construct(
        'mysql:host=mysql8003.site4now.net;dbname=db_acf380_drecpsidequest;port=3306;charset=utf8',
        'acf380_drecpsidequest',
        'Hostcu1.'
    );
}

  public function select(string $table, $field = "id", $order = "ASC"): array {
    $sql = "SELECT * FROM $table ORDER BY $field $order";
    $stmt = $this->query($sql);
    return $stmt->fetchAll();
  }

  public function selectId(string $table, int|string $value, $field = 'id'): bool|array {
    $sql = "SELECT * FROM $table WHERE $field = :$field";
    $stmt = $this->prepare($sql);
    $stmt->bindValue(":$field", $value);
    $stmt->execute();
    $count = $stmt->rowCount();

    if($count == 1){
      return $stmt->fetch();
    }else{
      return false;
    }
  }
  

  public function insert(string $table, array $data): bool|int {
    $fieldName = implode(', ', array_keys($data));
    $fieldBindValue = ":".implode(', :', array_keys($data));
    $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldBindValue);";
    $stmt = $this->prepare($sql);

    foreach($data as $key => $value){
      $stmt->bindValue(":$key", $value);
    }

    if($stmt->execute()){
      return $this->lastInsertId();
    }else{
      return false;
    }
  }

  public function update(string $table, array $data, $field = 'id'): bool {
    $sql = "UPDATE $table SET ";
    
    foreach($data as $key => $value){
      if($key != $field){
        $sql .= "$key = :$key, ";
      }
    }

    $sql = rtrim($sql, ', ');
    $sql .= " WHERE $field = :$field";

    $stmt = $this->prepare($sql);

    foreach($data as $key => $value){
      $stmt->bindValue(":$key", $value);
    }

    return $stmt->execute();
  }

  public function delete(string $table, int|string $value, $field = 'id'): bool {
    $sql = "DELETE FROM $table WHERE $field = :$field";
    $stmt = $this->prepare($sql);
    $stmt->bindValue(":$field", $value);

    if($stmt->execute()){
      return true;
    }else{
      return false;
    }
  }
  public function deleteGamePlatform($gameId, $platformId, $copyType): bool {
    $sql = "DELETE FROM game_platform 
            WHERE game_id = :game_id 
            AND platform_id = :platform_id 
            AND copy_type = :copy_type";

    $stmt = $this->prepare($sql);

    $stmt->bindValue(':game_id', $gameId);
    $stmt->bindValue(':platform_id', $platformId);
    $stmt->bindValue(':copy_type', $copyType);

    return $stmt->execute();
  }
}