{*
<script>
    function view_ForgotPass(){
        
        
        $(document).ready(function(){ 
        
        
            $("#forgotPass").toggle();
            $("#forgotOk").toggle();
        }); 
    }
</script>
*}

<div class="row">
    <div class="span3">
        <img src="{$host}/public/img/title.png" />
    </div>
    <div class="span5">
        <form action="index.php?action=login" method="post" class="form-horizontal">
            <legend>Login</legend>
            <div class="control-group">
                <label class="control-label">Username: </label>
                <div class="controls">
                    <input type="text" placeholder="Enter Your Username" name = "username" autofocus required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Password: </label>
                <div class="controls">
                    <input type="password" placeholder="Enter Your Password" name = "password" required>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" type="submit">
                        <i class="icon-signin icon-white"></i>  Login
                    </button>
                    <a href="#forgot_pass" class="btn btn-link" data-toggle="modal">Forgot Password?</a>
                </div>
            </div>    
        </form>
        
        {*
        <form class="form-horizontal" method="post" action="index.php?action=ForgotPass">
            <div class="control-group">
                <div class="controls">
                    <input type="button" href="" class="btn btn-link" onclick="view_ForgotPass()" value="Forgot your password?">
                </div>
            </div>
            <div class="control-group" id="forgotPass" hidden>
                <label class="control-label">Username: </label>
                <div class="controls">
                    <input type="text" placeholder="Enter Your Username" name="ForgotPass">
                </div>
            </div>
            <div class="control-group" id="forgotOk" hidden>
                <label class="control-label"></label>
                <div class="controls">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                </div>
            </div>
        </form>
        *}
    </div>
</div>

