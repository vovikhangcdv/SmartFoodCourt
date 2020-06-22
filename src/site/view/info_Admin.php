<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
              <h1>Info</h1>
              <p class="text-muted">Info <?= htmlspecialchars($info['fullname'], ENT_QUOTES, 'UTF-8'); ?></p>
              <form class="form-horizontal" action="" method="post">
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="disabled-input">Username</label>
                <div class="col-md-9">
                <input class="form-control" id="disabled-input" value='<?= $info['username']; ?>' type="text"  placeholder="Disabled" disabled="">
                </div>
                </div>
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Full name</label>
                <div class="col-md-9">
                <input class="form-control" value='<?= htmlspecialchars($info['fullname'], ENT_QUOTES, 'UTF-8'); ?>' required id="text-input" disabled="" name="fullname" type="text" placeholder="New Username">
                </div>
                </div>
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email-input">Email</label>
                <div class="col-md-9">
                <input class="form-control" disabled="" required value='<?= htmlspecialchars($info['email'], ENT_QUOTES, 'UTF-8'); ?>' id="email-input" type="email" name="email" placeholder="Enter Email" autocomplete="email">
                </div>
                </div>
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="sdt-input">Phone number</label>
                <div class="col-md-9">
                <input class="form-control" disabled="" required value='<?= $info['sdt']; ?>' id="sdt-input" name="sdt" placeholder="Enter phone number">
                </div>
                </div>
                <div class="form-group row">
                <label class="col-md-3 col-form-label" >Role</label>
                <div class="col-md-9">
                <input class="form-control" disabled="" required value='<?= htmlspecialchars($info['role_name'], ENT_QUOTES, 'UTF-8'); ?>'>
                </div>
                </div>
                </form>
                <?php if ($current_user['id'] !== $info['id']): ?>
                <a class="btn btn-block btn-success" type="submit" href='../index.php?c=message&id=<?= $info['id']?>'>Inbox</a>
                <?php endif;?>
                <div style='display:<?=(isset($message) and $message != NULL) ? "block" : "none" ?>'>
                    <br>
                    <div class=<?=$return ? "'alert alert-success'" : "'alert alert-danger'" ?> role="alert"><?=(isset($message) and $message != NULL) ? $message : "" ?></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>