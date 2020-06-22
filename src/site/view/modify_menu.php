<section id="mu-about-us">
    <div class="container float-right" >
        <div class="row">
            <div class="col-md-12">
                <div class="mu-about-us-area">
                    <div class="mu-title">
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

                            thead{
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
                        <span class="mu-subtitle">Modify</span>
                        <h2>MENU</h2>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>

                    <table class="table table-bordered ">
                        <thead style="background-color:#c1a35f;">
                            <tr>
                                <th class="w-10" style=" vertical-align: middle;font-size: 20px;color:white">ID</th>
                                <th class="w-25" style=" vertical-align: middle;font-size: 20px;color:white">Image</th>
                                <th class="w-10" style="vertical-align: middle;font-size: 20px;color:white">Name</th>
                                <th class="w-10" style="vertical-align: middle;font-size:20px;color:white">Discripton</th>
                                <th class="w-10" style="vertical-align: middle;font-size: 20px;color:white">Price</th>
                                <th class="w-10" style="vertical-align: middle;font-size: 20px;color:white">Enable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="vertical-align: middle;">1</td>
                                <td style=" vertical-align: middle;">
                                    <div>
                                        <img src="assets/img/modify_menu/1.jpg" alt="food" style="width:200px;height:200px;">
                                    </div>
                                </td>
                                <td style=" vertical-align: middle;">Banh Bo</td>
                                <td style="vertical-align: middle;">Banh bo mien tay nam bo</td>
                                <td style="vertical-align: middle;">5000 VND </td>

                                <td style="vertical-align: middle;">
                                    <div><label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;">2</td>
                                <td style="vertical-align: middle;">
                                    <div>
                                        <img src="assets/img/modify_menu/2.jpg" alt="food" style="width:200px;height:200px;">
                                    </div>
                                </td>
                                <td style="vertical-align: middle;">Banh canh</td>
                                <td style="vertical-align: middle;">Banh canh hem em iu ::heart </td>
                                <td style="vertical-align: middle;">25000 VND </td>
                                <td style="vertical-align: middle;">
                                    <div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    <button data-toggle="modal" data-target="#addFood" style="margin:5px;float:right;background-color:#c1a35f;border:#c1a35f" class="btn-lg btn-success" type="submit">Add food</button>
    <button style="float:right;background-color:#c1a35f;border:#c1a35f;margin:5px;" data-toggle="modal" data-target="#addCategory" class="btn-lg btn-success" type="submit">Add Category</button>
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
                    <label>Name</label>
                    <input type="text" />
                </div>
                <div class="block">
                    <label>Catagory</label>
                    <select style="width: 184px;
            text-align: right;">
                        <option value="volvo">Volvo</option>
                        <option value="saab">saab</option>
                        <option value="opel">opel</option>
                        <option value="audi">opel</option>
                    </select>
                </div>
                <div class="block">
                    <label>Description</label>
                    <input type="text" />
                </div>
                <div class="block">
                    <label>Price</label>
                    <input type="number" />

                </div>
                <div class="block">
                    <label>Status</label>
                    <select style="width: 184px;text-align: right;">
                        <option value=1>Enable</option>
                        <option value=0>Disable</option>
                    </select>
                </div>
                <div class="block">
                    <label>Image</label>
                    <input type="" />
                </div>
                <button class="btn btn-default">Browse</button>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default" style="background-color:#c1a35f ;">ADD</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" style="color:#c1a35f ;">ADD CATEGORY</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="block">
                    <label>Name</label>
                    <input type="text" />

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default" style="background-color:#c1a35f ;">ADD</button>
                </div>
            </div>
        </div>
    </div>
</section>