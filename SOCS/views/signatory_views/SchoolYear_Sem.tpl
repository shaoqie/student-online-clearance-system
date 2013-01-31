<form class="form-inline" method="post">
    <label >School Year:  </label>
    <select id="school_year" name="school_year" class="input-medium">
        {foreach from = $mySchool_Year key = k item = i}
            {if $currentSchool_Year eq $i}
                <option selected>{$i}</option>
            {else}
                <option>{$i}</option>
            {/if}
        {/foreach}
    </select>

    <label>Semester: </label>
    <select id="semester" name="semester" class="input-medium">
        {if $currentSemester eq 'First'}
            <option selected>First</option>
            <option>Second</option>
            <option>Summer</option>
        {elseif $currentSemester eq 'Second'}
            <option>First</option>
            <option selected>Second</option>
            <option>Summer</option>
        {else}
            <option>First</option>
            <option>Second</option>
            <option selected>Summer</option>
        {/if}           
    </select>
    <input class="btn btn-primary" type="submit" value="GO" name="GO">

</form>
