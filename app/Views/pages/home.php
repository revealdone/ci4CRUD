<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- <div class="container">
    <div class="row">
        <div class="col">

            <h1>Hola</h1>
        </div>
    </div>
</div> -->
<header>

        <h2 class="logo">Logo</h2>
        <nav class="navigation">
        <a class="" href="/">Home</a>
        <a class="" href="/pages/about">About</a>
        <a class="" href="/pages/contact">Contact</a>
        <a class="" href="/pages/komik">Komik</a>
        <button class="btnLogin-popup">Login</button>
        </nav>
        </header>
        
        <div class="wrapper">
            <span class="icon-close">
            <ion-icon name="close"></ion-icon>
            </span>
          <div class="form-box login">
            <h2>Login</h2>
            <form action="#">
              <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" required>
                <label>Email</label>
              </div>
              <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" required>
                <label>Password</label>
              </div>
              <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Password?</a>
              </div>
              
              <button type="submit" class="btnLogin-po">Login</button>
              <div class="login-register">
                <p>Dont't have an account? <a href="#" class="register-link">
                  Register
                </a></p>
              </div>
            </form>
          </div>

          <div class="form-box register">
            <h2>Registration</h2>
            <form action="#">
            <div class="input-box">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="text" required>
                <label>Username</label>
              </div>
              <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" required>
                <label>Email</label>
              </div>
              <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" required>
                <label>Password</label>
              </div>
              <div class="remember-forgot">
                <label><input type="checkbox">I agree to the
            terms & conditions
            </label>
                
              </div>
              
              <button type="submit" class="btnLogin-po">Register</button>
              <div class="login-register">
                <p>Already have an account? <a href="#" class="login-link">
                  Login
                </a></p>
              </div>
            </form>
          </div>

        </div>
        <!-- localhost url -->
        <!-- /?= base_url('pages/about'); ?> -->
        <!--  -->
      
      


<?= $this->endSection(); ?>