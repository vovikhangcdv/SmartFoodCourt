<section id="mu-restaurant-menu">
    <style>
        .img-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
        }

        table {
            font-family: arial, sans-serif;
            width: 100%;
        }

        th {
            text-align: left;
            border: 1px solid black;
            padding: 15px;
            border-collapse: collapse;
            color: black;
        }

        tr:nth-child(even) {
            border-collapse: collapse;
            /* color: #FFFFFF; */
            color: black;
            border: 1px solid black;
            /* background-color: lightslategray; */
            background-color: rgb(240, 240, 240);

        }

        .right {
            float: right;
            width: 100px;
            border: 1px solid #c1a35f;
            padding: 10px;
            text-align: center;
        }

        .detail {
            text-align: center;
            color: chocolate;
            background-color: eeeeee;

        }

        .button {
            padding: 10px 20px;
            text-align: center;
            font-size: 10px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .img-cart {
            display: block;
            max-width: 50px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
        }

        table tr td {
            border: 1px solid #FFFFFF;
        }

        table tr tt {
            background: #eee;
        }

        .panel-shadow {
            box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
        }
    </style>

    <div class="container">


        <div class="row" style="margin-top:30px">
            <div class="col-md-12">
                <div class="mu-restaurant-menu-area">
                    <div class="mu-title" style="padding-bottom:40px">
                        <span class="mu-subtitle">Report</span>
                        <h2><?= htmlentities($vendor['name'], ENT_QUOTES, "UTF-8"); ?></h2>
                        <?php $menu = $list_vendor[$vendor_id]; ?>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>
                    <form action="<?= PATH_INDEX ?>?c=report" method="POST">
                        <label style="font-size:150%" for="start">Date:</label>
                        <div style="float:right"><input style="font-size:150%" type="date" value="<?= $date ?>" id="date" name="date"> <input style="font-size:100%" type="submit" value="Query"></div><br>
                    </form>
                    <form action="<?= PATH_INDEX ?>?c=report" method="POST">
                        <label style="font-size:150%" for="for">Or:</label>
                        <form action="<?= PATH_INDEX ?>?c=report" method="POST">

                            <div style="float:right">
                                <select name="time" style="font-size:150%" id="time">
                                    <option <?= $time=="-1 day"?'selected="selected"':'' ?> value="-1 day">Today</option>
                                    <option <?= $time=="-1 week"?'selected="selected"':'' ?> value="-1 week">One week ago</option>
                                    <option <?= $time=="-1 month"?'selected="selected"':'' ?> value="-1 month">One month ago</option>
                                    <option <?= $time=="-1 year"?'selected="selected"':'' ?> value="-1 year">One year ago</option>
                                    <option <?= $time=="all"?'selected="selected"':'' ?> value="all">All time</option>
                                </select>
                                <input style="font-size:100%" type="submit" value="Query">
                                <br>
                            </div>
                        </form>
                        <hr>
                        <div class="mu-title" style="padding-bottom:40px">
                        <!-- <span class="mu-subtitle"></span> -->
                        <h3>Summary</h3>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>                        <table style="width:100%;">
                            <tr>
                                <th style="background-color:#c1a35f;width:50px">Bills</th>
                                <th style="text-align:right;" colspan="2"><?= $number_bills ?></th>
                            </tr>
                            <tr>
                                <th style="background-color:#c1a35f">Revenue</th>
                                <th style="text-align:right;">Total (VNĐ)</th>
                                <th style="text-align:center;"><?= $revenue ?></th>
                            </tr>
                        </table>
                        


                        <hr>

                        <div class="mu-title" style="padding-bottom:40px">
                        <!-- <span class="mu-subtitle"></span> -->
                        <h3>Detail</h3>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>
                        <table style="width:100%;">
                            <thead style="background-color:#c1a35f">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th style="text-align:right;">Total (VNĐ)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php foreach ($list_bill as $order_id => $bill) : ?>
                                <tr>
                                    <td><?= $order_id ?></td>
                                    <td><?= date("F j, Y, g:i a", $bill['timestamp_order']) ?></td>
                                    <td style="text-align:right;"><?= $bill['total'] ?></td>
                                    <td style="text-align:center;">
                                        <button class="mu-browsmore-btn" data-toggle="modal" data-target="#billmodal<?= $order_id ?>">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </table>

                </div>
            </div>
        </div>
        <?php foreach ($list_bill as $order_id => $bill) : ?>
            <!-- The Modal -->
            <div class="modal" id="billmodal<?= $order_id ?>">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->


                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="panel panel-info panel-shadow">
                                <div class="panel-heading">
                                    <h3>
                                        <img class="img-circle img-thumbnail" src="assets/img/avatars/<?= $bill['user']['id'] % 8 + 1 ?>.jpg">
                                        <?= htmlentities($bill['user']['fullname'], ENT_QUOTES, "UTF-8") ?>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="background-color:#c1a35f">
                                                <tr>
                                                    <th></th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($bill['orders'] as $stt => $order) : ?>
                                                    <tr>
                                                        <td><img width="100" height="100" src="<?= $order['product']['photo'] ?>" class="img-cart"></td>
                                                        <td><strong><?= htmlentities($order['product']['product_name'], ENT_QUOTES, "UTF-8") ?></strong></td>
                                                        <td><?= $order['quantity'] ?></td>
                                                        <td><?= $order['product']['price'] ?></td>
                                                        <td><?= $order['money'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td colspan="6">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right">VAT</td>
                                                    <td><?= $bill['additional_money'] ?></td>
                                                </tr>
                                                <tr style="background-color:#c1a35f">
                                                    <td colspan="2"><?= htmlentities($bill['vendor']['name'], ENT_QUOTES, "UTF-8") ?></td>
                                                    <td>Time: <?= date("F j, Y, g:i a", $bill['timestamp_order']) ?></td>

                                                    <td class="text-right"><strong>Total (VNĐ)</strong></td>
                                                    <td><?= $bill['total'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end -->
        <?php endforeach; ?>

    </div>

</section>