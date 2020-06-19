<section id="mu-about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-about-us-area">
                    <div class="span6">
                        <div class="mu-title">
                            <h2>Cart</h2>
                            <i class="fa fa-spoon"></i>
                            <span class="mu-title-bar"></span>
                        </div>
                        <form id='edit_cart' action="<?= PATH_INDEX ?>?c=order&a=add" method="POST">
                        <aside style="padding-left: 250px;">
                            <table style="width:75%" class="j2store-cart-table table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:45%;">Item</th>
                                        <th style="text-align:center;width:10%;">Quantity</th>
                                        <th style="text-align:center;width:20%;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $stt=>$order): ?>
                                    <input type="hidden" name="list_products[<?= $stt?>][product_id]" value="<?= $order['product']['product_id']?>" >
                                    <tr>
                                        <td>
                                            <span class="cart-thumb-image">
                                                <img align="left" style="padding:3px" alt="Vegetable Soup" width="100" height="100" src="<?= $order['product']['photo'] ?>">
                                            </span>
                                            <div style="padding:2px">
                                                <span class="cart-product-name"><?= htmlentities($order['product']['product_name'], ENT_QUOTES, "UTF-8") ?></span>
                                                <br>
                                                <span class="cart-product-unit-price">
                                                    <span class="cart-item-title">Unit Price:</span>
                                                    <span class="cart-item-value"><?= $order['product']['price'] ?> VNĐ</span>
                                                </span>
                                                <br>
                                                <span class="cart-product-sku">
                                                    <span class="cart-item-value"><?= htmlentities($order['product']['description'], ENT_QUOTES, "UTF-8") ?></span>
                                                </span>
                                            </div>
                                        </td>
                                        <td style="text-align:center; vertical-align:middle;">
                                            <div class="product-qty"><input style="width:50px;" type="number" name="list_products[<?= $stt?>][quantity]" value="<?= $order['quantity'] ?>" class="input-mini " min="0" step="1"></div>
                                            <br>
                                            <a class="btn btn-small btn-danger btn-xs j2store-remove remove-icon" href="<?= PATH_INDEX ?>?c=order&a=remove&product_id=<?= $order['product']['product_id']?>">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>

                                        <td style="text-align:center; vertical-align:middle;" class="cart-line-subtotal"><?= $order['money'] ?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </aside>
                        </form>
                        <br>
                        <div style="text-align: center;" class="j2store-cart-buttons">
                            <a class="buttons-left">
                                <a href="<?= PATH_INDEX ?>?c=order&a=menu" class="mu-readmore-btn" tabindex="0">Continue Choose food</a>
                                <a onclick="submit_form('edit_cart','','')" class="mu-readmore-btn" tabindex="0">Update</a>
                            </div>
                            <div class="buttons-right">
                            </div>
                        </div>
                        <!-- Display plugin results -->
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="span6">
                        <div class="mu-title">
                            <h2>Cart totals</h2>
                        </div>
                        <aside style="padding-left: 400px;">
                            <table style="width:50%;" class="cart-footer table table-bordered">
                                <tbody>
                                    <tr valign="top">
                                        <th style="text-align:center" scope="row" colspan="2">Subtotal</th>
                                        <td style="text-align:right"><?= $additional_money ?></td>
                                    </tr>
                                    <tr valign="top">
                                        <th style="text-align:center" scope="row" colspan="2">Total</th>
                                        <td style="text-align:right"><?= $total ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </aside>
                        <br>
                        <div style="text-align:center" class="buttons-right">
                            <a href="<?= PATH_INDEX?>?c=order&a=cancel" class="mu-readmore-btn" tabindex="0">Cancel</a>
                            <a href="<?= PATH_INDEX?>?c=order&a=commit" class="mu-readmore-btn" tabindex="0">Pay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>