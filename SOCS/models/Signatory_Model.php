<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Signatory_Model
 *
 * @author ronversa09
 */
class Signatory_Model extends Model{
    private $query;
    private $itemsPerPage = 10;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function filter_ID($Tdescription, $Tpage){
        $filter = array();
        $this->query = mysql_query("select Signatory_ID from signatories
                                    where Signatory_Name like '%$Tdescription%' order by Signatory_Name 
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['Signatory_ID']);
        }
        
        return $filter;
    }
    
    public function filter_SignName($Tsign_name, $Tpage){
        $filter = array();
        $this->query = mysql_query("select Signatory_Name from signatories
                                    where Signatory_Name like '%$Tsign_name%' order by Signatory_Name 
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage );
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['Signatory_Name']);
        }
        
        return $filter;
    }
    
    public function getQueryPageSize($searchName) {
        $this->query = mysql_query("select Signatory_Name from signatories 
                        where Signatory_Name like '%$searchName%'");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
    public function deleteSignatory($key){
        mysql_query("delete from signatories where Signatory_ID = '$key'");
    }
    
    public function insert($sign_name, $description){
        mysql_query("INSERT INTO `socs`.`signatories` (`Signatory_ID`, `Signatory_Name`, `Description`) 
                    VALUES (NULL, '$sign_name', '$description')");
    }
}

?>
