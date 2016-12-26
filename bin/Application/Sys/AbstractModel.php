<?php

namespace Beagle\Application\Sys;

use Beagle\Application\DB\MySQLi;

/**
 * Description of AbstractModel
 *
 * @author rodrigo
 */
class AbstractModel {
    //put your code here
    private $con;

    /**
     * 
     */
    public function __construct() { 
        $this->con = new MySQLi(__host, __username, __password, __database);
    }

    /**
     * 
     * @param type $table
     * @param array $collection
     */
    protected function insertBuilder($table , array $collection){
        
        $row = array();
        $data = array();
        foreach($collection as $key => $values){
            array_push($row, $key);
            array_push($data, $this->escape($values));
        }
          
        $sql  = sprintf("insert into `{$table}` ( %s ) VALUES ( '%s' );" , implode(",", $row) , implode("','", $data))   ;
 
        return $this->query($sql);
        
    }
    
   /**
    * 
    * @param type $table
    * @param array $collection array('row' => 'data')
    * @param array $where array('row' => '{condition} data ')
    * @return boolean 
    */
    protected function updateBuilder($table , array $collection , array $where ){
        
        $row = array();
        $data = array();
        foreach($collection as $key => $values){ 
            array_push($data, "{$key} = {$this->escape($values)}");
        }
        
        foreach($where as $key => $values){ 
            array_push($data,"{$key} {$this->escape($values)}");
        }
         
        $sql  = sprintf("update {$table} set %s where 0=0 %s" , implode(",", $row , implode(" and ", $values)))   ;
        return $this->query($sql);
        
    }
    
    
    protected function query($sql) {
        return $this->con->query($sql);
    }

    protected function escape($value) {
        return $this->con->escape($value);
    }

    protected function countAffected() {
        return $this->con->countAffected();
    }

    protected function getLastId() {
        return $this->con->getLastId();
    }

}
