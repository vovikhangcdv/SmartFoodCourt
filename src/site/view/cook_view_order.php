<section id="mu-about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-about-us-area">
                    <div class="mu-title">
                        <span class="mu-subtitle">Cook</span>
                        <h2>VIEW ORDER</h2>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>
                    <aside style="padding-left: 180px;">
                        <table style="width:80%; font-size:large;" class="j2store-cart-table table table-bordered">
                            <thead style="background-color:#c1a35f">
                                <tr>
                                    <th style="text-align:center; width:15%;">Order ID</th>
                                    <th style="text-align:center; width:25%;">Product</th>
                                    <th style="text-align:center; width:10%;">Quantity</th>
                                    <th style="text-align:left; width:30%; padding-left:6.5%;">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_bill as $order_id => $bill) : ?>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">
                                            <span class="cart-thumb-image">
                                                <?= $order_id ?>
                                            </span>
                                        </td>
                                        <td style="text-align:center">
                                            <?php foreach ($bill['orders'] as $stt => $order) : ?>
                                                <?php if ($stt !== count($bill['orders']) - 1) : ?>
                                                    <div class="row-md-6" style="border-bottom:dotted black 1px">
                                                    <?php else : ?>
                                                        <div class="row-md-6">
                                                        <?php endif; ?>
                                                        <span><?= htmlentities($order['product']['product_name'], ENT_QUOTES, "UTF-8") ?></span>
                                                        </div>
                                                    <?php endforeach; ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?php foreach ($bill['orders'] as $stt => $order) : ?>
                                                <?php if ($stt !== count($bill['orders']) - 1) : ?>
                                                    <div class="row-md-6" style="border-bottom:dotted black 1px">
                                                    <?php else : ?>
                                                        <div class="row-md-6">
                                                        <?php endif; ?>
                                                        <span><?= $order['quantity'] ?></span>
                                                        </div>
                                                    <?php endforeach; ?>
                                        </td>
                                        <td style="vertical-align:middle; text-align:center;">
                                            <div class="col-md-6" style="padding:2%">
                                                <?= date("F j, Y, g:i a", $bill['timestamp_order']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div type="button" onclick="submit_form('set_ready','order_id','<?= $order_id ?>')" class="btn mu-readmore-btn" style="padding:8%" tabindex="0">Set ready</div>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <form action="<?= PATH_INDEX ?>?c=bill&a=set_ready" id="set_ready" method="POST">
        <input type="text" id="order_id" name="order_id" value="a" style="display:none">
        <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
    </form>
</section>
