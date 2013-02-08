<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SchoolYearSem
 *
 * @author ronversa09
 */
class ClearanceStatus extends Model{
    private $query;
    
    public function __construct() {        
        parent::__construct();
        
        $this->query = "";
    }
    
    public function getClearanceStatus($reqNum, $clearedNum){
        $this->query = mysql_query("select if('$reqNum' = '$clearedNum', 'Cleared', 'Not Cleared') as status");
        $row = mysql_fetch_array($this->query);
        
        return $row['status'];       
    }
    
    public function getStudent_NumberOfRequirements($student_username, $sign_id, $sy_id){
        $this->query = mysql_query("select count(student) as Count from clearancestatus
                                    inner join requirements on requirements.requirement_id = clearancestatus.requirement_id
                                    inner join schoolyearsem on schoolyearsem.sy_sem_id =  requirements.sy_sem_id
                                    inner join signatories on signatories.signatory_id = requirements.signatory_id
                                    where student = '$student_username' and signatories.signatory_id = '$sign_id' and schoolyearsem.sy_sem_id = '$sy_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Count']; 
    }
    
    public function getStudent_NumberOfClearedPerRequirements($student_username, $sign_id, $sy_id){
        $this->query = mysql_query("select count(student) as Count from clearancestatus
                                    inner join requirements on requirements.requirement_id = clearancestatus.requirement_id
                                    inner join schoolyearsem on schoolyearsem.sy_sem_id =  requirements.sy_sem_id
                                    inner join signatories on signatories.signatory_id = requirements.signatory_id
                                    where student = '$student_username' and cleared = 'cleared' and signatories.signatory_id = '$sign_id' and schoolyearsem.sy_sem_id = '$sy_id'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Count']; 
    }
    
    public function getRequirementList($studentID, $signatoryID, $sysemID){
        
        $stud_model = new Student_Model();
        $stud_model->queryStudent_Info($studentID);
        
        $t_deptID = $stud_model->getStud_DeptID();
        $t_courseID = $stud_model->getStud_CourseID();
        $t_yl = $stud_model->getStud_Yearlevel();
        $t_program = $stud_model->getStud_Program();
        
        $arrayTemp = array();
        
        $this->query = mysql_query("select Requirement_ID, Title, Description, Requirement_Type, Prerequisite_Signatory from requirements 
                                    where Signatory_ID='$signatoryID' and SY_SEM_ID='$sysemID' and 
                                    (Visibility='All' or Department_ID='$t_deptID' or Course_ID='$t_courseID' or Year_Level='$t_yl' or Program='$t_program')");
        
        /*
        var_dump("select Requirement_ID, Title, Description from requirements 
                                    where Signatory_ID='$signatoryID' and SY_SEM_ID='$sysemID' and 
                                    (Visibility='All' or Department_ID='$t_deptID' or Course_ID='$t_courseID' or Year_Level='$t_yl' or Program='$t_program')");
        */
        while($row = mysql_fetch_array($this->query)){
            if ($row['Requirement_Type'] == 'Textual')
                $status = $this->getRequirementClearanceStatus($studentID, $row['Requirement_ID']);
            else{
                $sigID = $row['Prerequisite_Signatory'];
                
                if ($this->isStudentUnderSpecifiedSignatory($studentID,$sigID)){
                    $status = $this->getOverallSignatoryClearanceStatus($studentID, $sigID, $sysemID);
                    if($status == "No Requirements")
                        $status = "Cleared";
                }
            }
            array_push($arrayTemp, array($row['Requirement_ID'], $row['Title'], $row['Description'], $status, $row['Requirement_Type']));
        }
        return $arrayTemp;
    }
    
    public function getOverallSignatoryClearanceStatus($studentID, $signatoryID, $sysemID){
        $status_data = $this->getRequirementList($studentID, $signatoryID, $sysemID);
        if (count($status_data)==0){
            return "No Requirements";
        }
        
        foreach($status_data as $eachRequirement)
            if($eachRequirement[3]=='Not Cleared')
                return 'Not Cleared';
        
        return "Cleared";
    }
    
    private function getRequirementClearanceStatus($studentID, $requirementID){
        $subquery = mysql_query("select Cleared from clearancestatus where student='$studentID' and requirement_id='$requirementID' limit 0,1");
        $count = mysql_num_rows($subquery);
        if ($count==0){
            return 'Not Cleared';
        }else{
            $row = mysql_fetch_array($subquery);
            return $row[0];
        }
    }
    
    public function setRequirementClearanceStatus($studentID, $requirementID, $status){
        if($this->requirementClearanceStatusExists($studentID, $requirementID)){
            //var_dump("UPDATE `socs`.`clearancestatus` SET `Cleared` = '$status' WHERE `clearancestatus`.`Requirement_ID` = '$requirementID' AND `clearancestatus`.`Student` = '$studentID'");
            mysql_query("UPDATE `socs`.`clearancestatus` SET `Cleared` = '$status' WHERE `clearancestatus`.`Requirement_ID` = '$requirementID' AND `clearancestatus`.`Student` = '$studentID'");
        }else{
            //var_dump("INSERT INTO `socs`.`clearancestatus` (`Requirement_ID`, `Student`, `Cleared`) VALUES ('$requirementID', '$studentID', '$status')");
            mysql_query("INSERT INTO `socs`.`clearancestatus` (`Requirement_ID`, `Student`, `Cleared`) VALUES ('$requirementID', '$studentID', '$status')");
        }
        
        //var_dump(mysql_ );
    }
    
    private function requirementClearanceStatusExists($studentID, $requirementID){
        $subquery = mysql_query("select * from clearancestatus where requirement_id='$requirementID' and  student='$studentID'");
        $count = mysql_num_rows($subquery);
        return $count > 0 ? TRUE:FALSE;
    }
    
    public function isStudentUnderSpecifiedSignatory($username, $sigID){
        $this->query = mysql_query("select * from students
            inner join courses on (students.course_id = courses.course_id)
            inner join departments on (courses.department_id = departments.department_id)
            inner join signatoriallist on (departments.department_id = signatoriallist.department_id)
            where username='$username' and signatoriallist.signatory_id='$sigID'");
        
        $count = mysql_num_rows($this->query );
        return $count > 0 ? TRUE:FALSE;
    }
}

?>
