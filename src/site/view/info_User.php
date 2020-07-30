<style>
    .center {
        margin: auto;
        width: 60%;
    }
</style>
<section id="mu-about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-about-us-area">
                    <div class="mu-title">
                        <span class="mu-subtitle">Info</span>
                        <h2> <?= htmlspecialchars($info['fullname'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>

                    <div class="container">
                        <div class="row center justify-content-center" style="margin: auto;">
                            <div class="col-md">
                                <div class="card mx-4">
                                    <div class="card-body p-4">
                                        <form class="form-horizontal" action="" method="post">
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="disabled-input">Username</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="disabled-input" value='<?= $info['username']; ?>' type="text" placeholder="Disabled" disabled="">
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
                                                <label class="col-md-3 col-form-label">Role</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" disabled="" required value='<?= htmlspecialchars($info['role_name'], ENT_QUOTES, 'UTF-8'); ?>'>
                                                </div>
                                            </div>
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