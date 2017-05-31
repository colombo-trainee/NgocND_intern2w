<?php
class database{
    var $_dbh = '';
    var $_sql = '';
    var $_cursor = NULL;        
    
    public function database() 
 {
        try
  {
   $this->_dbh = new PDO('mysql:host=localhost; dbname=restaurant','root','');
   $this->_dbh->query('set names "utf8"');
   $this->_dbh->query("date_default_timezone_set('Asia/Ho_Chi_Minh');");
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
   die('lỗi'); 
  }
    }
    
    public function setQuery($sql) {
        $this->_sql = $sql;
    }
    
    //Function execute the query 
    public function execute($options=array()) 
    {
        $this->_cursor = $this->_dbh->prepare($this->_sql);
        if($options) {  //If have $options then system will be tranmission parameters
            for($i=0;$i<count($options);$i++) {
                $this->_cursor->bindParam($i+1,$options[$i]);
            }
        }
        $this->_cursor->execute();
        return $this->_cursor;

    }
    
    //Funtion load datas on table
    public function loadAllRows($options=array()) {
        if(!$options) {
            if(!$result = $this->execute())
                return false;
        }
        else {
            if(!$result = $this->execute($options))
                return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    // Function load data with assoc
    public function loadASSOC($options=array()) {
        if(!$options) {
            if(!$result = $this->execute())
                return false;
        }
        else {
            if(!$result = $this->execute($options))
                return false;
        }
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

        
    //Funtion load 1 data on the table
    public function loadRow($option=array()) {
        if(!$option) {
            if(!$result = $this->execute())
                return false;
        }
        else {
            if(!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_OBJ);
    }
    
    //Function count the record on the table
    public function loadRecord($option=array()) {
        if(!$option) {
            if(!$result = $this->execute())
                return false;
        }
        else {
            if(!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_COLUMN);
    }
    
    public function getLastId() {
        return $this->_dbh->lastInsertId();
    }
    
    public function disconnect() {
        $this->_dbh = NULL;
    }
}
?>  