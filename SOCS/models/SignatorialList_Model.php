<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SignatorialList_Model
 *
 * @author ronversa09
 */
class SignatorialList_Model extends Model{
    private $query;
    private $itemsPerPage = 10;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function filter_ID($Tdept_name, $Tsign_name, $Tpage){
        $filter = array();
        $this->query = mysql_query("select signatories.signatory_id from signatorialList
                                    inner join signatories 
                                    on signatorialList.signatory_id = signatories.signatory_id
                                    inner join departments
                                    on signatorialList.department_id = departments.department_id
                                    where departments.Department_Name like '%$Tdept_name%' and signatories.signatory_name like '%$Tsign_name%'
                                    order by signatories.signatory_name
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['signatory_id']);
        }
        
        return $filter;
    }
    
    public function filter_SignName($Tdept_name, $Tsign_name, $Tpage){
        $filter = array();
        $this->query = mysql_query("select signatories.signatory_name from signatorialList
                                    inner join signatories 
                                    on signatorialList.signatory_id = signatories.signatory_id
                                    inner join departments
                                    on signatorialList.department_id = departments.department_id
                                    where departments.Department_Name like '%$Tdept_name%' and signatories.signatory_name like '%$Tsign_name%'
                                    order by signatories.signatory_name
                                    LIMIT " . (($Tpage - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        while($row = mysql_fetch_array($this->query)){
            array_push($filter, $row['signatory_name']);
        }
        
        return $filter;
    }
    
    public function getQueryPageSize($Tdept_name, $searchName) {
        $this->query = mysql_query("select signatories.signatory_name from signatorialList
                                    inner join signatories 
                                    on signatorialList.signatory_id = signatories.signatory_id
                                    inner join departments
                                    on signatorialList.department_id = departments.department_id
                                    where departments.Department_Name like '%$Tdept_name%' and signatories.signatory_name like '%$searchName%'");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
}

?>
