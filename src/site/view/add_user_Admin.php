<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mx-4">
        <div class="card-body p-4">
          <h1>Add User</h1>
          <p class="text-muted">Add new user</p>
          <form novalidate="novalidate" class="form-group" action="<?= PATH_INDEX ?>?c=signup" method="POST">
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
              <input class="form-control" required type="text" name="fullname" placeholder="Full name">
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
            <div class="form-group row">
              <label class="col-md-3 col-form-label" for="disabled-input">Role</label>
              <div class="col-md-9">
                <select onchange="admSelectCheck(this);" class="form-control custom-select"  name="role" required="" >
                  <option value="4">Customer</option>
                  <option id="admOption1" value="3">Cook</option>
                  <option id="admOption2" value="2">Vendor Owner</option>
                  <option value="1">Manager</option>
                  <option value="0">It Staff</option>
                </select>
              </div>
            </div>
            <div  id="admDivCheck" style="display:none;" >
            <div class="form-group row">
              <label class="col-md-3 col-form-label" for="disabled-input">Vendor</label>
              <div class="col-md-9">
              <select class="form-control custom-select" name="vendor_id" required="" >
                <?php foreach ($list_vendor as $stt => $vendor) : ?>
                  <option value="<?= $vendor['id'] ?>"><?= htmlentities($vendor['name'], ENT_QUOTES, "UTF-8"); ?></option>
                <?php endforeach; ?>
                </select>
              </div>
            </div>
            </div>


            <button class="btn btn-block btn-success" type="submit">Create Account</button>
            <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
          </form>
          <div style='display:<?= (isset($message) and $message != NULL) ? "block" : "none" ?>'>
            <br>
            <div class=<?= $return ? "'alert alert-success'" : "'alert alert-danger'" ?> role="alert"><?= (isset($message) and $message != NULL) ? $message : "" ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  function admSelectCheck(nameSelect) {
    console.log(nameSelect);
    if (nameSelect) {
      admOptionValue1 = document.getElementById("admOption1").value;
      admOptionValue2 = document.getElementById("admOption2").value;
      if ((admOptionValue1 == nameSelect.value) || (admOptionValue2 == nameSelect.value)) {
        document.getElementById("admDivCheck").style.display = "block";
      } else {
        document.getElementById("admDivCheck").style.display = "none";
      }
    } else {
      document.getElementById("admDivCheck").style.display = "none";
    }
  }
</script>