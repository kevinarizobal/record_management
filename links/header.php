<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-lg">
    <div class="container-fluid">
        <div class=" text-lg-start">
            <!-- Logo and title in a single row with alignment -->
            <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                <img src="img/smc.png" style="height: 60px; width: auto;" alt="">
                <div class="ms-2">
                    <h1 class="mb-0" style="font-size: 1.5rem;">SAINT MICHAEL'S COLLEGE</h1>
                    <p class="mb-0" style="font-size: 0.875rem;">Rizal Street 8317 Cantilan, Philippines</p>
                </div>
            </div>
        </div>

        <!-- Toggler button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation links positioned to the right -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav text-dark" style="font-size: 1.25rem;">
                <a class="nav-link me-5" href="#">HOME</a>
                <a class="nav-link me-5" href="#about">ABOUT</a>
                <a class="nav-link me-5" href="#contact">CONTACT US</a>
                <a class="nav-link" href="#loginModal" data-bs-toggle="modal">ADMIN</a>
            </div>
        </div>
    </div>
</nav>

<!-- admin login -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="login-form">
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-circle fs-3 me-2"></i> ADMIN LOGIN
            </h5>
            <button type="reset" class="btn-close shadow=none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label"><i class="bi bi-person-lines-fill"></i> USERNAME</label>
              <input type="text" name="user" required class="form-control shadow-none">
            </div>
            <div class="mb-4">
              <label class="form-label"><i class="bi bi-shield-lock"></i> PASSWORD</label>
              <input type="password" name="pass" required class="form-control shadow-none">
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <button type="submit" class="btn btn-success shadow-none">LOGIN</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
