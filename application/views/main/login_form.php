<div class="smallpadding">
<h1 class="text-center blacktext">Double Y Online Shopping</h1>
<h3 class="text-center blacktext">Login</h3>
</div>
<?=form_open("site/login",'')?>
    <section class="row">
            <div class="col-md-4">

            </div>
       <div class="col-md-4 login-bg">
        <div class="col-md-12">
          
        </div>
             <div class="col-md-12">
            <div class="form-group">
              <label>Username</label>
            <input name="username" type="text" class="form-control" placeholder="Username" required></input>
            </div>
          </div>
          <div class="col-md-12">
            <label>Password</label>
            <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Password" required></input>
            </div>
          </div>
          <?php if ($error=='true'):?>
  <div class="col-md-12 smallpadding smallbottommargin text-center login-error">
   * Username or password is wrong
  </div>
<?php elseif($error=='logout'):?>
<div class="col-md-12 smallpadding smallbottommargin text-center login-error">
   * Logout Completed
  </div>
    <?php endif;?>
          <div class="col-md-12 text-center ">             
              <div class="form-group">
              <input type="submit" name="save" class="btn" value="Login me in" ></input>
              </div>
          </div>

      </div>


        <div class="col-md-4">
        </div>

   </section>
<?=form_close();?>
