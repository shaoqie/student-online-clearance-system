{*Search Bar*}

{function name=search}
{if isset($filter)}
    <form class="form-inline">
        <input type="hidden" value="filter" name="action">
        <input id="search" class="span5" type="text" placeholder="Search..." value="{$filter}" name="filterName">

        <div class="btn-group">
            <button class="btn btn-primary" type="submit">
                <i class="icon-search icon-white"></i>
            </button>
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">
                        <i class="icon-search"></i> Advance Search
                    </a>
                </li>
            </ul>
        </div>

        <!-- Delete this portion
        <input class="btn pull-right" type="button" value="Add User Account" onclick="window.location.href='index.php?action=display_add_edit_account'">
        -->

    </form>
{/if}
{/function}