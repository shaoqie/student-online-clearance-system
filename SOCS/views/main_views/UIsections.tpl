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

{function name=modal}
<!--
<div id="socs_confirm" class="modal fade hide" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="socs-modal-header"></div>
    </div>
    <div class="modal-body">
        <div class="socs-modal-body"></div>
    </div>
    <div class="modal-footer pull-right">
        <button class="btn btn-danger">No</button>
        <button class="btn btn-primary">Yes</button>
    </div>
</div>-->

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
        <p>One fine body…</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
    </div>
</div>

{/function}