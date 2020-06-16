<section id="mu-restaurant-menu">
    <style>
        table {
            font-family: arial, sans-serif;
            width: 100%;
        }

        th {
            text-align: left;
            border: 1px solid black;
            padding: 15px;
            border-collapse: collapse;
            color:black;
        }

        tr:nth-child(even) {
            border-collapse: collapse;
            color:#FFFFFF;
            border: 1px solid black;
            background-color:lightslategray ;  

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
            color:chocolate;
            background-color:eeeeee;
            
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
        <div class="row">
            <div class="col-md-12">
                <div class="mu-restaurant-menu-area">
                    <div class="mu-title">
                        <span class="mu-subtitle">History</span>
                        <h2>Ordered MENU</h2>
                        <?php $menu = $list_vendor[$vendor_id]; ?>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    <table style="width:100%;">
                        <tr>
                            <th>Order</th>
                            <th>Information</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Banh Mi</td>
                            <td>So luong: 20, date</td>
                            <td style="text-align:center;">
                                <button  class="detail" data-toggle="modal" data-target="#myModal">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Eve</td>
                            <td>So luong: 20, date</td>
                            <td style="text-align:center";>
                                <button class="detail" data-toggle="modal" data-target="#myModal">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Eve</td>
                            <td>So luong: 20, date</td>
                            <td style="text-align:center";>
                                <button class="detail" data-toggle="modal" data-target="#myModal">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Eve</td>
                            <td>So luong: 20, date</td>
                            <td style="text-align:center";>
                                <button class="detail" data-toggle="modal" data-target="#myModal">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Eve</td>
                            <td>So luong: 20, date</td>
                            <td style="text-align:center";>
                                <button class="detail" data-toggle="modal" data-target="#myModal">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Eve</td>
                            <td>So luong: 20, date</td>
                            <td style="text-align:center";>
                                <button class="detail" data-toggle="modal" data-target="#myModal">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div style="float:right;">
                      <button class="button button1">
                        Make report
                      </button>
                    </div>
                    <div style="float:right";>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- popup show detail here -->
        <div class="modal" id="myModal" style="background-image: url('assets/img/slider/2.jpg');">
            <div style="width:900px; margin:0 auto;" >
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="mu-title">
                        <h2>Bill Ordered</h2>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>

                    <!-- Modal body -->
                    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
                    <div class="container bootstrap snippet">
                        <div class="col-md-9 col-sm-8 content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-info panel-shadow">
                                        <div class="panel-heading">
                                            <h3>
                                                
                                                <div>
                                                <img class="img-circle img-thumbnail" src="https://bootdey.com/img/Content/user_3.jpg">
                                                <div style="float:letf;">NgoQuocKhanh</div>
                                                <div style="float:left; font-size:15px; color:black;">Vender X</div>
                                              </div>
                                            </h3>
                                                
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead style="background-color: c1a35f;">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><img src="https://via.placeholder.com/400x200/" class="img-cart"></td>
                                                            <td><strong>Product 1</strong>
                                                                <p>Size : 26</p>
                                                            </td>
                                                            <td>
                                                                <form class="form-inline">
                                                                    <input class="form-control" type="text" value="1">
                                                                </form>
                                                            </td>
                                                            <td>$54.00</td>
                                                            <td>$54.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="https://via.placeholder.com/400x200/" class="img-cart"></td>
                                                            <td><strong>Product 2</strong>
                                                                <p>Size : M</p>
                                                            </td>
                                                            <td>
                                                                <form class="form-inline">
                                                                    <input class="form-control" type="text" value="2">
                                                                </form>
                                                            </td>
                                                            <td>$16.00</td>
                                                            <td>$32.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" class="text-right">Total Product</td>
                                                            <td>$86.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" class="text-right">Total Shipping</td>
                                                            <td>$2.00</td>
                                                        </tr>
                                                        <tr>
                                                          <td style="color:black;"><strong>Time:</strong> </td>
                                                          <td>06:21,06:07:2020</td>
                                                            <td colspan="6" class="text-right"><strong>Total</strong></td>
                                                            <td>$88.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continue Shopping</a>
                                    <a href="#" class="btn btn-primary pull-right">Next<span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</section>