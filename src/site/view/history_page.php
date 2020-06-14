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
        }

        tr:nth-child(even) {
            border-collapse: collapse;
            color:aliceblue;
            border: 1px solid black;
            background-color: #c1a35f;

        }

        .right {
            float: right;
            width: 100px;
            border: 1px solid #c1a35f;
            padding: 10px;
            text-align: center;
        }
        .detail{
            text-align: center;
        }
        .button{
            color: white;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            font-size: 10px;
            margin: 4px 2px;
            cursor: pointer;
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
                    </div>
                    <table style="width:100%">
                        <tr>
                            <th>Order</th>
                            <th>Information</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Banh Mi</td>
                            <td>So luong: 20, date</td>
                            <td class="detail">
                            <button type="button" class="detail" data-toggle="modal" data-target="#myModal">
    Detail
  </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Eve</td>
                            <td>So luong: 20, date</td>
                            <td>
                                <a href="#" class="button">Detail</a>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</section>