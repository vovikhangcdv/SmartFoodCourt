<style>
    h1 {
        text-align: center;
    }

    p {
        text-align: center;
    }

    div {
        text-align: center;
        vertical-align: middle;
    }

    th {
        text-align: center;
    }

    td {
        text-align: center;
    }

    thead {
        background-color: #c1a35f;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #c1a35f;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #c1a35f;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<div id="mu-about-us">
    <div class="container float-right">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-about-us-area">
                    <?php if (isset($message)) :; ?>
                        <div class="container">
                            <div style='display:<?= (isset($message) and $message != NULL) ? "block" : "none" ?>'>
                                <br>
                                <div class=<?= $return ? "'alert alert-success'" : "'alert alert-danger'" ?> role="alert"><?= (isset($message) and $message != NULL) ? $message : "" ?></div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="mu-title">
                        <span class="mu-subtitle">Modify</span>
                        <h2>MENU</h2>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>
                    <button data-toggle="modal" data-target="#addFood" style="margin:5px;float:right;background-color:#c1a35f;border:#c1a35f" class="btn-lg btn-success" type="submit">Add food</button>
                    <button style="float:right;background-color:#c1a35f;border:#c1a35f;margin:5px;" data-toggle="modal" data-target="#addCategory" class="btn-lg btn-success" type="submit">Add Category</button>
                    <table class="table table-bordered ">
                        <thead style="background-color:#c1a35f;">
                            <tr>
                                <th class="w-10" style=" vertical-align: middle;font-size: 20px;">ID</th>
                                <th class="w-25" style=" vertical-align: middle;font-size: 20px;">Image</th>
                                <th class="w-10" style="vertical-align: middle;font-size: 20px;">Name</th>
                                <th class="w-10" style="vertical-align: middle;font-size:20px;">Discripton</th>
                                <th class="w-10" style="vertical-align: middle;font-size: 20px;">Price</th>
                                <th class="w-10" style="vertical-align: middle;font-size: 20px;">Enable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_product as $stt => $product) : ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?= $stt + 1 ?></td>
                                    <td style=" vertical-align: middle;">
                                        <div>
                                            <img src="<?= xss_filter($product['photo']) ?>" alt="food" style="width:125px;height:120px;">
                                        </div>
                                    </td>
                                    <td style=" vertical-align: middle;"><?= xss_filter($product['product_name']) ?></td>
                                    <td style="vertical-align: middle;"><?= xss_filter($product['description']) ?></td>
                                    <td style="vertical-align: middle;"><?= xss_filter($product['price']) ?> VND </td>

                                    <td style="vertical-align: middle;">
                                        <div><label class="switch">
                                                <input type="checkbox" <?= ($product['is_ready'] === 1) ? 'checked' : '' ?> onclick="send_request('<?= PATH_INDEX ?>?c=modify_menu&a=switch_product_status','product_id=<?= $product['product_id'] ?>')">
                                                <span class="slider round"></span>
                                            </label>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>



    <style>
        label {
            display: inline-block;
            width: 140px;
            text-align: right;
        }
    </style>
    <div class="modal fade" id="addFood" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" style="color:#c1a35f ;">ADD FOOD</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="block">
                    <form action="<?= PATH_INDEX ?>?c=modify_menu&a=add_product" method="POST" enctype="multipart/form-data">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Field</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-sm-3"><label>Product name</label></td>
                                    <td class="col-sm-9"><input required type="text" name="product_name" /></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3"><label>Category</label></td>
                                    <td class="col-sm-9">
                                        <select name="category_id" style="width: 184px;text-align: right;">
                                            <?php foreach ($list_category as $stt => $category) : ?>
                                                <option value="<?= xss_filter($category['id']) ?>"><?= xss_filter($category['catname']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3"><label>Description</label></td>
                                    <td class="col-sm-9"> <textarea style="margin-left:5px" rows="4" cols="20" name="description"></textarea></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3"><label>Price (VNĐ)</label></td>
                                    <td class="col-sm-9"><input required name="price" type="number" min="1000" step="1000" /></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3"><label>Image</label></td>
                                    <td class="col-sm-9 float-right"><input required type="file" name="file" multiple /></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-default" style="background-color:#c1a35f ;">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" style="color:#c1a35f ;">CATEGORY</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="block">
                    <div style="margin-top:10px">
                        <form action="<?= PATH_INDEX ?>?c=modify_menu&a=add_category" method="POST">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_category as $stt => $category) : ?>

                                        <tr>
                                            <td><?= xss_filter($category['catname']) ?></td>
                                            <td> <a class="btn btn-small btn-danger btn-xs j2store-remove remove-icon" href="<?= PATH_INDEX ?>?c=modify_menu&a=delete_category&category_id=<?= $category['id'] ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                </a></td>
                                        </tr>
                                        <tr>
                                        <?php endforeach; ?>

                                        <td class="col-sm-3"><label>Category name</label></td>
                                        <td class="col-sm-9"><input type="text" name="catname" /></td>
                                        </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default" style="background-color:#c1a35f ;">ADD</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>