<div class="row">
    <div class="span3">

        <!-- Header-->
        <h4 class="well center-text well-small">Departments</h4>

        <!-- Navigations and Controls-->
        {call name=nav_departments index=1}
        
    </div>
    <div class="span9">

        <div class="row">
            <div class="span9">

                {*
                <!-- Add Department Button-->
                <input class="btn" type="button" value="Add Department" onclick="window.location.href = 'department_list_manager.php?action=addDepartment'">
                *}

                <!-- Header-->
                <h4 class="well center-text well-small">List of Departments</h4>

                <!-- Search Bar-->
                <span class="pull-right">
                    {call name=search}
                </span>
            </div>
        </div>

        <div class="row">
            <div class="span9">
                <!-- Department Table-->
                <table class="table table-bordered table-hover">   
                    <tr>
                        <th>
                            <input type="checkbox" onclick="isCheck({$rowCount_dept});" id="check"> Departments
                        </th>
                        <th>Description</th>
                        <th>Controls</th>
                    </tr>
                    {foreach from = $myName_dept key = k item = i}
                        <tr>
                            <td>
                                <label class="checkbox">
                                    <input class="Checkbox" type="checkbox" id = '{$k}' value = {$myKey_dept[$k]} >
                                    <div id="hover_link" onclick="window.location.href = 'department_list_manager.php?action=displayCourse&deptName={$i}';" >{$i}</div>
                                </label>        
                            </td>
                            <td>{$desc_dept[$k]}</td>
                            <td>
                                <a href="department_list_manager.php?action=editDepartment&seleted={$myKey_dept[$k]}">
                                    <i class="icon-pencil"></i> Edit
                                </a> &nbsp; <br class="hidden-desktop">
                                <a href="department_list_manager.php?action=displayCourse&deptName={$i}">
                                    <i class="icon-eye-open"></i> View
                                </a>
                            </td>
                        </tr>
                    {/foreach}
                </table>

                <!-- Delete Control-->
                <a style="cursor:pointer;" onclick="findCheck('{$rowCount_dept}', 'department')" >
                    <i class="icon-remove"></i> Delete Selected
                </a>

                <!-- Pagination-->
                <div class="pull-right">
                    Jump to: <select id="jump" class="input-mini" onchange="jumpToPage()">
                        <option>--</option>
                        {for $start = 1 to $dept_length}
                            <option>{$start}</option>
                        {/for}
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>