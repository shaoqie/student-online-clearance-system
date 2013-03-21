<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bulletin
 *
 * @author ronversa09
 */
require_once '../config/config.php';

class UploadSignature extends Controller {

    private $template;
    private $user_model;
    private $schoolYearSem_model;
    private $signatorialList_model;
    private $signatory_model;
    private $bulletin_model;
    private $signatoryID;

    public function __construct() {
        parent::__construct();
        if (Session::user_exist() && Session::get_Account_type() == "Signatory") {
            $this->template = new Template();
            $this->user_model = new User_Model();
            $this->schoolYearSem_model = new SchoolYearSem_Model();
            $this->signatorialList_model = new SignatorialList_Model();
            $this->signatory_model = new Signatory_Model();
            $this->bulletin_model = new Bulletin_Model();

            $listOfSchoolYear = $this->schoolYearSem_model->getSchool_Year();
            $currentSemester = $this->schoolYearSem_model->getCurSemester();
            $currentSchool_Year = $this->schoolYearSem_model->getCurSchool_Year();

            $this->template->setPageName('Bulletin Page');

            $this->template->set_username(Session::get_user());
            $this->template->set_surname(Session::get_Surname());
            $this->template->set_firstname(Session::get_Firstname());
            $this->template->set_middlename(Session::get_Middlename());
            $this->template->set_account_type(Session::get_Account_type() . " in Charge -");
            $this->template->set_photo(Session::get_photo());
            
            $this->template->setContent('UploadSignaturePage.tpl');
            $this->template->setCalendar('Calendar.tpl');
            $this->template->setSchool_YearSemContent('SchoolYear_Sem.tpl');
            $this->template->assign('assign_sign', ", " . Session::get_AssignSignatory());
            $this->template->assign('mySchool_Year', $listOfSchoolYear);
            $this->template->assign('currentSemester', $currentSemester);
            $this->template->assign('currentSchool_Year', $currentSchool_Year);
            
            $this->signatoryID = $this->user_model->getAssignSignatory_SigIDOnly(Session::get_user());
            
            $sigIm = $this->signatory_model->getSignature($this->signatoryID);
            if(is_null($sigIm)){
                $this->template->assign('signatureImage', HOST . "/photos/default_signature.jpg");
                $this->template->assign('hasImageSet', '0');
            }else{
                $this->template->assign('signatureImage', $sigIm);
                $this->template->assign('hasImageSet', '1');
            }
            
            
        } else {
            header('Location: /SOCS/');
        }
    }

    public function display() {
        $this->template->display('bootstrap.tpl');
    }
    
    public function uploadSignature(){
//        if(!isset($_POST['upload'])){
//            return; 
//        }
//        var_dump($_POST['upload']);
        $imagefile = $_FILES["signatureimage"];
        
        //var_dump($imagefile);
        //if($imagefile['name'] == ""){$this->template->setAlert('Choose photo of signature first...', Template::ALERT_ERROR);}
        
        
        
        if (Validator::is_valid_signature_image($imagefile)) {
            

            $local_dir = PATH . "photos/signatures/";
            do{
                $img_filename = rand(1000000, 9999999) . rand(1000000, 9999999);
            }while(file_exists($img_filename));
            
            
            $image_upload = new upload($imagefile);

            if ($image_upload->uploaded) {
                
                $image_upload->image_convert        = "jpg";
                $image_upload->file_overwrite       = true;
                $image_upload->file_new_name_body   = $img_filename;
                $image_upload->image_resize         = true;
                $image_upload->image_y              = 35;
                $image_upload->image_x              = 200;
                
                $image_upload->process($local_dir);

                if ($image_upload->processed) {
                    $imagepath = HOST . "/photos/signatures/" . $img_filename . "." . "jpg";
                    $this->signatory_model->updateSignature($this->signatoryID, $imagepath);
                    
                    $this->template->assign('signatureImage', $imagepath);
                    $this->template->assign('hasImageSet', '1');
                    
                    $this->template->setAlert('Signature image has been successfully uploaded.', Template::ALERT_SUCCESS);
                } else {
                    $this->template->setAlert('An error occured while uploading the image.' . $image_upload->error, Template::ALERT_INFO);
                }
            } else {
                $this->template->setAlert('An error occured while uploading the image.', Template::ALERT_INFO);
            }

            
        } else {
            $this->template->setAlert('Invalid image! The image must be of valid file type (jpg, png, or gif), has exactly 200x35 size, and is less than 1 MB.', Template::ALERT_ERROR, 'alert');
            //return;
        }
    }
    
    public function reset(){
        $sigIm = $this->signatory_model->getSignature($this->signatoryID);
        $sigIm = parse_url($sigIm, PHP_URL_PATH);
        $sigIm = substr($sigIm, strrpos($sigIm, "/")+1);
        $sigIm = PATH . "photos/signatures/" . $sigIm;
        
        unlink($sigIm);
        $this->signatory_model->resetSignature($this->signatoryID);
        
        $this->template->assign('signatureImage', HOST . "/photos/default_signature.jpg");
        $this->template->assign('hasImageSet', '0');
        
        $this->template->setAlert('Signature image has been removed.', Template::ALERT_SUCCESS);
        
    }


}

$controller = new UploadSignature();
$controller->perform_actions();
$controller->display();
?>
