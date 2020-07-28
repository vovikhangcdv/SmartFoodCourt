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

                    <div class="container" >
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card mx-4">
                                    <div class="card-body p-4" style="text-align:center">
                                            <img class="img-noti-success" style="width:560px;hight:600px" src="assets/img/success.png" alt="">
                                            <h3 style="text-align:center">Payment success!</h3>
                                            <a href="<?= PATH_INDEX ?>?c=bill&a=getBillCustomer" class="btn btn-block btn-success" style="background-color:#c1a35f;border:#c1a35f" type="submit">Check it</a>
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