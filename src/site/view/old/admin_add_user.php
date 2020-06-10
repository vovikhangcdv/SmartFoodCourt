<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
              <h1>Add User</h1>
              <p class="text-muted">Add new user</p>
              <form novalidate="novalidate" class="form-group" action="../index.php?c=signup" method="POST">
              <div class="input-group form-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg></span></div>
                <input class="form-control" required aria-describedby="username-error" type="text" name="username" aria-invalid="true" placeholder="Username">
              </div>
              <div class="input-group form-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg></span></div>
                <input class="form-control" required  type="text" name="fullname"  placeholder="Full name">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                    </svg></span></div>
                <input class="form-control" name="email" type="text" placeholder="Email">
              </div>
              <div class="input-group form-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg></span>
                </div>
                <input class="form-control" name="sdt" type="sdt" placeholder="Phone number">
              </div>
              <div class="input-group form-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg></span>
                </div>
                <input class="form-control" name="password" type="password" placeholder="Password">
              </div>
              <div class="input-group form-group mb-4">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg></span></div>
                <input class="form-control" name="repeat_password" type="password" placeholder="Repeat password">
              </div>
<div class="form-group row ">
<div class="col col-form-label d-flex justify-content-center">
<span class="form-check form-check-inline mr-1">
<input class="form-check-input" id="inline-radio1" type="radio" value="2" checked name="role">
<label class="form-check-label" for="inline-radio1">Student</label>
</span>
<span class="form-check form-check-inline mr-1">
<input class="form-check-input" id="inline-radio2" type="radio" value="1" name="role">
<label class="form-check-label" for="inline-radio2">Teacher</label>
</span>
</span>
<span class="form-check form-check-inline mr-1">
<input class="form-check-input" id="inline-radio2" type="radio" value="0" name="role">
<label class="form-check-label" for="inline-radio2">Admin</label>
</span>
</div>
</div>
              <button class="btn btn-block btn-success" type="submit">Create Account</button>
              <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
              </form>
              <div style='display:<?=(isset($message) and $message != NULL) ? "block" : "none" ?>'>
                  <br>
                  <div class=<?=$return ? "'alert alert-success'" : "'alert alert-danger'" ?> role="alert"><?=(isset($message) and $message != NULL) ? $message : "" ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
            </div>