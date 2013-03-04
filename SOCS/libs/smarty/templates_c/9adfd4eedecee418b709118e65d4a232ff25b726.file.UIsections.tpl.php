<?php /* Smarty version Smarty-3.1.12, created on 2013-03-04 17:54:49
         compiled from "C:\wamp\www\SOCS\views\main_views\UIsections.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29535134dfe91f3686-52191096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9adfd4eedecee418b709118e65d4a232ff25b726' => 
    array (
      0 => 'C:\\wamp\\www\\SOCS\\views\\main_views\\UIsections.tpl',
      1 => 1362418952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29535134dfe91f3686-52191096',
  'function' => 
  array (
    'welcome_navigations' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'nav_admin' => 
    array (
      'parameter' => 
      array (
        'index' => 0,
      ),
      'compiled' => '',
    ),
    'search_input' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'schoolyear_sem_inputs' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'search' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'archiveSearch' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'nav_user_accounts' => 
    array (
      'parameter' => 
      array (
        'index' => 0,
      ),
      'compiled' => '',
    ),
    'nav_signatories' => 
    array (
      'parameter' => 
      array (
        'index' => 0,
      ),
      'compiled' => '',
    ),
    'nav_departments' => 
    array (
      'parameter' => 
      array (
        'flag' => 0,
        'index' => 0,
      ),
      'compiled' => '',
    ),
    'nav_signatory' => 
    array (
      'parameter' => 
      array (
        'index' => 0,
      ),
      'compiled' => '',
    ),
    'upload_excel' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'index' => 0,
    'host' => 0,
    'filter' => 0,
    'user_type' => 0,
    'mySchool_Year' => 0,
    'year' => 0,
    'currentSchool_Year' => 0,
    'currentSemester' => 0,
    'flag' => 0,
    'Dept_name' => 0,
    'excel_file' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5134dfe950b9b5_67980880',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5134dfe950b9b5_67980880')) {function content_5134dfe950b9b5_67980880($_smarty_tpl) {?><!-- Welcome Navigations-->
<?php if (!function_exists('smarty_template_function_welcome_navigations')) {
    function smarty_template_function_welcome_navigations($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['welcome_navigations']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <ul class="nav">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="index.php?action=student_registrationForm">Register</a>
        </li>
    </ul>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<!-- Admin Navigations-->
<?php if (!function_exists('smarty_template_function_nav_admin')) {
    function smarty_template_function_nav_admin($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['nav_admin']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <ul class="nav nav-tabs nav-stacked">
        <li class="<?php if ($_smarty_tpl->tpl_vars['index']->value==1){?>active<?php }?>">
            <a href='<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/index.php?user_type=Student'>
                <i class="icon-user"></i> User Accounts
            </a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==2){?>class="active"<?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/signatory_list_manager.php">
                <i class="icon-edit"></i> Signatories
            </a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==3){?>class="active"<?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/department_list_manager.php">
                <i class="icon-building"></i> Departments
            </a>
        </li>
    </ul>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<?php if (!function_exists('smarty_template_function_search_input')) {
    function smarty_template_function_search_input($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['search_input']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if (isset($_smarty_tpl->tpl_vars['filter']->value)){?>
        <input type="hidden" value="filter" name="action">
        <input id="search" class="span3" type="search" placeholder="Search..." value="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" name="filterName">
        <?php if (isset($_smarty_tpl->tpl_vars['user_type']->value)){?>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
" name="user_type">
        <?php }?>
    <?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<?php if (!function_exists('smarty_template_function_schoolyear_sem_inputs')) {
    function smarty_template_function_schoolyear_sem_inputs($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['schoolyear_sem_inputs']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

    <select id="school_year" class="select2 input-medium" name="school_year">
        <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['year']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mySchool_Year']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
$_smarty_tpl->tpl_vars['year']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['year']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->tpl_vars['currentSchool_Year']->value){?>
                <option selected><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
            <?php }else{ ?>
                <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
            <?php }?>
        <?php } ?>
    </select>

    <select id="semester" class="select2 input-medium" name="semester">
        <?php if ($_smarty_tpl->tpl_vars['currentSemester']->value=='First'){?>
            <option selected>First</option>
            <option>Second</option>
            <option>Summer</option>
        <?php }elseif($_smarty_tpl->tpl_vars['currentSemester']->value=='Second'){?>
            <option>First</option>
            <option selected>Second</option>
            <option>Summer</option>
        <?php }else{ ?>
            <option>First</option>
            <option>Second</option>
            <option selected>Summer</option>
        <?php }?>           
    </select>

<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<!-- Search Bar-->
<?php if (!function_exists('smarty_template_function_search')) {
    function smarty_template_function_search($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['search']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if (isset($_smarty_tpl->tpl_vars['filter']->value)){?>

        <form class="navbar-form pull-right">
            <input type="hidden" value="filter" name="action">
            <input id="search" class="span3" type="search" placeholder="Search..." value="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" name="filterName">
            <?php if (isset($_smarty_tpl->tpl_vars['user_type']->value)){?>
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
" name="user_type">
            <?php }?>

            

            <button class="btn btn-success" type="submit">
                <i class="icon-search icon-white"></i>
            </button>
        </form>

    <?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<!-- Archive Search Bar-->
<?php if (!function_exists('smarty_template_function_archiveSearch')) {
    function smarty_template_function_archiveSearch($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['archiveSearch']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

    <form class="navbar-form pull-right" method="post">

        <select id="school_year" class="select2 input-large" name="school_year">
            <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['year']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mySchool_Year']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
$_smarty_tpl->tpl_vars['year']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['year']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->tpl_vars['currentSchool_Year']->value){?>
                    <option selected><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                <?php }else{ ?>
                    <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                <?php }?>
            <?php } ?>
        </select>

        <select class="select2 input-large" id="semester" name="semester">
            <?php if ($_smarty_tpl->tpl_vars['currentSemester']->value=='First'){?>
                <option selected>First</option>
                <option>Second</option>
                <option>Summer</option>
            <?php }elseif($_smarty_tpl->tpl_vars['currentSemester']->value=='Second'){?>
                <option>First</option>
                <option selected>Second</option>
                <option>Summer</option>
            <?php }else{ ?>
                <option>First</option>
                <option>Second</option>
                <option selected>Summer</option>
            <?php }?>           
        </select>

        <button class="btn btn-primary" type="submit" name="GO">
            <i class="icon-search"></i>
        </button>
    </form>


    
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<!-- Admin Functions-->

<!-- User Accounts Navigation-->
<?php if (!function_exists('smarty_template_function_nav_user_accounts')) {
    function smarty_template_function_nav_user_accounts($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['nav_user_accounts']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

    <ul class="nav">

        <li class="divider-vertical"></li>

        <?php if ($_smarty_tpl->tpl_vars['index']->value==4){?>
            <li>
                <a class="tips" href="#" title="Back">
                    <i class="icon-arrow-left"></i> 
                </a>
            </li>

            <li class="divider-vertical"></li>
            <?php }?>

        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==1){?>class="active"<?php }?>>
            <a class="tips" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/index.php?user_type=Student" title="List of Students">
                <i class="icon-user"></i>
            </a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==2){?>class="active"<?php }?>>
            <a class="tips" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/index.php?user_type=Signatory" title="List of Signatories-in-charge">
                <i class="icon-coffee"></i> 
            </a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==3){?>class="active"<?php }?>>
            <a class="tips" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/unconfirmed_signatory.php" title="List of Unconformed Signatories-in-charge">
                <i class="icon-warning-sign"></i>
            </a>
        </li>
        <li class="divider-vertical"></li>
        <li>
            <a class="tips" href="#upload_excel" data-toggle="modal" title="Upload Enrolled Students">
                <i class="icon-upload-alt"></i> 
            </a>
        </li>
        <li class="dropdown <?php if ($_smarty_tpl->tpl_vars['index']->value==4){?>active<?php }?>">
            <a class="tips" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/index.php?action=addSignatoryInCharge" title="Add Signatory-in-charge">
                <i class="icon-plus"></i>
            </a>
        </li>

        <?php if ($_smarty_tpl->tpl_vars['index']->value!=4){?>
            
        <?php }?>

        <li class="divider-vertical"></li>
    </ul>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<!-- Signatories Navigations-->
<?php if (!function_exists('smarty_template_function_nav_signatories')) {
    function smarty_template_function_nav_signatories($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['nav_signatories']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

    <ul class="nav">

        <li class="divider-vertical"></li>

        <?php if ($_smarty_tpl->tpl_vars['index']->value==2){?>
            <li>
                <a class="tips" href="#" title="Back">
                    <i class="icon-arrow-left"></i> 
                </a>
            </li>

            <li class="divider-vertical"></li>
            <?php }?>

        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==2){?>class="active"<?php }?>>
            <a class="tips" title="Add Signatory" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/signatory_list_manager.php?action=addSignatory">
                <i class="icon-plus"></i>
            </a>
        </li>

        <?php if ($_smarty_tpl->tpl_vars['index']->value!=2){?>
            
        <?php }?>

        <li class="divider-vertical"></li>
    </ul>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<!-- Departments Navigations-->
<?php if (!function_exists('smarty_template_function_nav_departments')) {
    function smarty_template_function_nav_departments($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['nav_departments']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

    <ul class="nav">
        <li class="divider-vertical"></li>

        <?php if ($_smarty_tpl->tpl_vars['flag']->value==1){?>

            <li>
                <a class="tips" data-toggle="tooltip" title="Add Department" href="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/department_list_manager.php?action=addDepartment">
                    <i class="icon-plus"></i>
                </a>
            </li>

        <?php }else{ ?>

            <li <?php if ($_smarty_tpl->tpl_vars['index']->value==1){?>class="active"<?php }?>>
                <a class="tips" data-toggle="tooltip" title="List of Course under <?php echo $_smarty_tpl->tpl_vars['Dept_name']->value;?>
" href='<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/course_list_byDepartment.php'>
                    <i class="icon-book"></i>
                </a>
            </li>
            <li <?php if ($_smarty_tpl->tpl_vars['index']->value==2){?>class="active"<?php }?>>
                <a class="tips" data-toggle="tooltip" title="List of Signatory under <?php echo $_smarty_tpl->tpl_vars['Dept_name']->value;?>
" href='<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/signatorialList.php'>
                    <i class="icon-pencil"></i>
                </a>
            </li>
            <li class="divider-vertical"></li>
            <li>
                <a class="tips" data-toggle="tooltip" title="Add Course" href='<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/course_list_byDepartment.php?action=addCourse'>
                    <i class="icon-plus"></i>
                </a>
            </li>

        <?php }?>

        

        <li class="divider-vertical"></li>
    </ul>

<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<!-- Signatory-in-charge Functions-->

<!-- Signatory Navigation-->
<?php if (!function_exists('smarty_template_function_nav_signatory')) {
    function smarty_template_function_nav_signatory($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['nav_signatory']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <ul class="nav nav-tabs nav-stacked">
        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==0){?>class="active"<?php }?>>
            <a href='../signatory/index.php'>
                <i class="icon-user"></i> Students
            </a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==1){?>class="active"<?php }?>>
            <a href='../signatory/bulletin.php'>
                <i class="icon-align-justify"></i> Bulletin
            </a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==2){?>class="active"<?php }?>>
            <a href='../signatory/requirements.php'>
                <i class="icon-check"></i> Requirements
            </a>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['index']->value==3){?>class="active"<?php }?>>
            <a href='../signatory/uploadsignature.php'>
                <i class="icon-arrow-up"></i> Upload Signature
            </a>
        </li>
    </ul>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<?php if (!function_exists('smarty_template_function_upload_excel')) {
    function smarty_template_function_upload_excel($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['upload_excel']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

    <div id="upload_excel" class="modal hide fade">
        <div class="modal-header">
            <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
            <h4>Upload List of Enrolled Students</h4>
        </div>
        <div class="modal-body">

            <div class="fileupload fileupload-new" data-provides="fileupload">

                <?php if (isset($_smarty_tpl->tpl_vars['excel_file']->value)){?>

                    <table class="table table-condensed table-bordered">
                        <tr>
                            <td>Current File: </td>
                            <td><i class="icon-ms-excel"></i> student_current_enroll.xls</td>
                        </tr>
                    </table>
                <?php }?>

                <form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
/administrator/index.php?action=upload_excel_file" method="post" enctype="multipart/form-data">
                    <label>
                        <b>Upload MS Excel File: </b>
                    </label>
                    <span class="btn btn-file">
                        Browse<input type="file" name="excel_file" />
                    </span>

                    <div class="form-actions fileupload-exists">
                        <i class="icon-file-alt icon-2x"></i> 
                        <span class="fileupload-preview"></span>
                        <div class="pull-right">
                            <button class="btn btn-success btn-primary" type="submit" name="save">Upload</button>
                            <button class="btn" data-dismiss="fileupload" type="button">Remove</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary pull-right" data-dismiss="modal">Cancel</button>
        </div>
    </div>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>
<?php }} ?>