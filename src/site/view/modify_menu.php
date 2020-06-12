<section id="mu-about-us">
    <div class="container">
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
                                background-color: rgb(204, 185, 11);
                            }

                            input:focus+.slider {
                                box-shadow: 0 0 1px rgb(204, 185, 11);
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
                        <h2 >MENU</h2>
                        <i class="fa fa-spoon"></i>
                        <span class="mu-title-bar"></span>
                    </div>

                    <table class="table table-bordered ">
                        <thead style="background-color:rgb(204, 185, 11);">
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
                            <tr>
                                <td>

                                </td>
                                <td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"><button type="button" style="size: 200%;background-color:rgb(204, 185, 11);color:white">Add Food</button></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>