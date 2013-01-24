
{*Search Bar*}

{function name=search}
<form class="form-inline">
    <input type="hidden" value="filter" name="action">
    <input id="search" class="span5" type="text" placeholder="Search..." value="{$filter}" name="filterName">
    <button class="btn btn-primary" type="submit">
        <i class="icon-search icon-white"></i>
    </button>

    <!-- Delete this portion
    <input class="btn pull-right" type="button" value="Add User Account" onclick="window.location.href='index.php?action=display_add_edit_account'">
    -->

</form>
{/function}