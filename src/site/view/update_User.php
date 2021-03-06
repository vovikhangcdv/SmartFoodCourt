<style>
    .center {
        margin: auto;
        width: 60%;
    }
</style>
<section id="mu-about-us">
    <div class="container">
        <div class="row center">
            <div class="col-md-12">
                <div class="mu-about-us-area">
                    <div class="mu-title">
                        <span class="mu-subtitle">Update info</span>
                        <h2> <?= htmlspecialchars($info['fullname'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card mx-4">
                                    <div class="card-body p-4">
                                        <form class="form-horizontal" action="" method="post">
                                            <?php if ($_SESSION['role'] === 0) : ?>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="disabled-input">Username</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="disabled-input" value='<?= htmlspecialchars($info['username'], ENT_QUOTES, "UTF-8"); ?>' type="text" name="username" placeholder="Disabled">
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="disabled-input">Username</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="disabled-input" value='<?= htmlspecialchars($info['username'], ENT_QUOTES, "UTF-8"); ?>' type="text" placeholder="Disabled" disabled="">
                                                        <input class="form-control" style="display:none" id="disabled-input" value='<?= $info['username']; ?>' type="text" name="username" placeholder="Disabled">
                                                    </div>
                                                </div>
                                            <?php endif; ?>


                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="text-input">Full name</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" value='<?= htmlspecialchars($info['fullname'], ENT_QUOTES, "UTF-8"); ?>' required id="text-input" name="fullname" type="text" placeholder="New Username">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="email-input">Email</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" required value='<?= $info['email']; ?>' id="email-input" type="email" name="email" placeholder="Enter Email" autocomplete="email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="sdt-input">Phone number</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" required value='<?= $info['sdt']; ?>' id="sdt-input" name="sdt" placeholder="Enter phone number">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="password-input">Password</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="password-input" type="password" name="password" placeholder="Password"><span class="help-block">Ignore this to keep old password</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="password-input">Repeat Password</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="password-input" type="password" name="repeat_password" placeholder="Repeat password" autocomplete="new-password">
                                                </div>
                                            </div>
                                            <button class="btn btn-block btn-success" style="background-color:#c1a35f;border:#c1a35f" type="submit">Update</button>
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
            </div>
        </div>

    </div>
</section>