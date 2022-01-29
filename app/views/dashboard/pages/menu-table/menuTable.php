<?php $this->view("dashboard/includes/header",$data) ;
$this->view("dashboard/includes/navbar",$data) ; ?>
<style type="text/css">
.add_new {
    width: 300px;
    height: 650px;
    background-color: #cecccc;
    position: absolute;
    padding: 6px;
    box-shadow: 0px 0px 10px;
}

.edit_meal {
    width: 300px;
    height: 780px;
    background-color: #cecccc;
    position: absolute;
    padding: 6px;
    box-shadow: 0px 0px 10px;
}

.show {
    display: block;
}

.hide {
    display: none;
}


.edit_product-images img{
  width: 100px;
  height : 100px;
  position : relative ;
  top: -20px;
  left : 28%;
  
}

</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Menu List </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="search-field d-none d-md-block">
                            <form class="d-flex align-items-center h-100" action="#">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                    </div>
                                    <input type="text" class="form-control bg-transparent border-0 "
                                        placeholder="Search by name">
                                </div>
                            </form>
                            <button type="button" class="btn btn-dark btn-sm" onclick="show_add_new(event)">Add new
                                meal</button>
                            <!--add meal-->

                            <div class="add_new hide">
                                <h3 class="page-title" style="padding-bottom:15px"> Add meal </h3>
                                <form enctype="multipart/form-data" class="row row-cols-lg-auto g-3" method="post">
                                    <div class="form-group" style="width:300px">
                                        <label>Meal Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Meal Name">
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Meal image </label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            placeholder="Meal image" optional>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label for="exampleInputEmail1">Meal description</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                            placeholder=required required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Meal price</label>
                                        <input type="number" class="form-control" name="price" id="price" step="0.5"
                                            placeholder="0.00" required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Meal category</label>
                                        <select class="form-control form-control-sm" name="category" id="category"
                                            required>
                                            <option></option>
                                            <?php if(is_array($data['categories'])): ?>
                                            <?php foreach($data['categories'] as $categ): ?>
                                            <option value="<?=$categ->code?>"><?= $categ->nom ?></option>
                                            <?php endforeach;?>
                                            <?php endif;?>





                                        </select>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" onclick="collect_data(event)">Add
                                            Meal</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger"
                                            onclick="show_add_new(event)">Close</button>
                                    </div>
                                </form>


                            </div>
                            <!--edit Meal-->
                            <div class="edit_meal hide">
                                <h3 class="page-title" style="padding-bottom:15px"> Edit meal </h3>
                                <form class="row row-cols-lg-auto g-3" method="post">
                                    <div class="form-group" style="width:300px">
                                        <label>Meal Name</label>
                                        <input type="text" class="form-control" id="add_name" placeholder="Meal Name">
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Meal image </label>
                                        <input type="file" class="form-control" name="image" id="add_image"
                                            placeholder="Meal image" optional>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label for="exampleInputEmail1">Meal description</label>
                                        <input type="text" class="form-control" name="description" id="add_description"
                                            placeholder=required required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Meal price</label>
                                        <input type="number" class="form-control" name="price" id="add_price" step="0.5"
                                            placeholder="0.00" required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Meal category</label>
                                        <select class="form-control form-control-sm" name="category" id="add_category"
                                            required>
                                            <option></option>
                                            <?php if(is_array($data['categories'])): ?>
                                            <?php foreach($data['categories'] as $categ): ?>
                                            <option value="<?=$categ->code?>"><?= $categ->nom ?></option>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                    <div class="js-product-images edit_product-images">

                                    </div>
                                    <div class="col">
                                    <button type="button" class="btn btn-primary" onclick="collect_edit_data(event)">Save</button>
                                  </div>
                                    <div class="col">
                                    <button type="button" class="btn btn-danger" onclick="show_edit_meal(0,'',event)">Cancel</button>
                                  </div>
                                </form>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> id </th>
                                        <th> name </th>
                                        <th>image</th>
                                        <th> description </th>
                                        <th> price </th>
                                        <th> category </th>
                                        <th> state </th>

                                    </tr>
                                </thead>
                                <tbody id="table_body">
                                    <?php 
                           
                           echo $data['tbl_rows'];




                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <script type="text/javascript">
                    
                var EDIT_ID = 0;

                function show_add_new() {
                    var show_add_box = document.querySelector(".add_new");
                    var meal_input = document.querySelector("#name");
                    if (show_add_box.classList.contains("hide")) {
                        show_add_box.classList.remove("hide");
                        meal_input.focus();
                    } else {
                        show_add_box.classList.add("hide");
                        meal_input.value = "";
                    }
                }

                function show_edit_meal(id, name, e) {
                  var show_edit_box = document.querySelector(".edit_meal");
                  if(e) {
                    
                    var a = (e.currentTarget.getAttribute("info"));
                    if(a) {
                    var info = JSON.parse(a.replaceAll("'", '"'));
                    
                    console.log(info) ;
                    EDIT_ID = info.id;
                    
                    //show_edit_box.style.left = (e.clientX - 400) + "px";
                    //show_edit_box.style.top = (e.clientY -120 ) + "px";

                    var meal_input = document.querySelector("#add_name");
                    meal_input.value = info.name;

                    var image_input = document.querySelector(".js-product-images");
                    image_input.innerHTML = `<img src="<?=ROOT?>/uploads/${info.image} " />`

                    var description_input = document.querySelector("#add_description");
                    console.log(description_input.value);
                    description_input.value = info.description;

                    var price_input = document.querySelector("#add_price");
                    price_input.value = info.price;

                    var category_input = document.querySelector("#add_category");
                    category_input.value = info.code_categorie;
                    }

                    if (show_edit_box.classList.contains("hide")) {
                        show_edit_box.classList.remove("hide");
                        meal_input.focus();
                    } else {
                        show_edit_box.classList.add("hide");
                        meal_input.value = "";
                    }
                }
                }


                function collect_data(e) {
                    var meal_input = document.querySelector("#name");
                    if (meal_input.value.trim() == '' || !isNaN(meal_input.value.trim())) {

                        alert("please enter a valid meal name");
                        return;
                    }
                    var description_input = document.querySelector("#description");
                    if (description_input.value.trim() == '' || !isNaN(description_input.value.trim())) {

                        alert("please enter a valid meal name");
                        return;
                    }
                    var price_input = document.querySelector("#price");
                    if (price_input.value.trim() == '' || isNaN(price_input.value.trim())) {

                        alert("please enter a valid price");
                        return;
                    }
                    var image_input = document.querySelector("#image");

                    if (image_input.files.length == 0) {

                        alert("please enter a valid image");
                        return;
                    }
                    var category_input = document.querySelector("#category");
                    if (category_input.value.trim() == '' || isNaN(category_input.value.trim())) {

                        alert("please enter a valid category" + " " + category_input.value.trim());
                        return;
                    }

                    var data = new FormData();
                    data.append('name', meal_input.value.trim());
                    data.append('image', image_input.files[0]);
                    data.append('description', description_input.value.trim());
                    data.append('price', price_input.value.trim());
                    data.append('category', category_input.value.trim());
                    data.append('data_type', 'add_meal');
                    send_data_files(data);


                }

                function collect_edit_data(e) {
                  var data = new FormData();
                  var meal_input = document.querySelector("#add_name");
                    if (meal_input.value.trim() == '' || !isNaN(meal_input.value.trim())) {

                        alert("please enter a valid meal name");
                        return;
                    }
                    var description_input = document.querySelector("#add_description");
                    if (description_input.value.trim() == '' || !isNaN(description_input.value.trim())) {

                        alert("please enter a valid meal name");
                        return;
                    }
                    var price_input = document.querySelector("#add_price");
                    if (price_input.value.trim() == '' || isNaN(price_input.value.trim())) {

                        alert("please enter a valid price");
                        return;
                    }
                    var image_input = document.querySelector("#add_image");

                    if (image_input.files.length >  0) {

                        
                        data.append('image',image_input.files[0]) ;
                        
                        
                    }
                    var category_input = document.querySelector("#add_category");
                    if (category_input.value.trim() == '' || isNaN(category_input.value.trim())) {

                        alert("please enter a valid category" + " " + category_input.value.trim());
                        return;
                    }

                    
                    data.append('name', meal_input.value.trim());
                     data.append('description', description_input.value.trim());
                    data.append('price', price_input.value.trim());
                    data.append('category', category_input.value.trim());
                    data.append('data_type', 'edit_meal');
                    data.append('id',EDIT_ID);
                    send_data_files(data);


                }

              

                

                function send_data_files(formdata) {

                    var ajax = new XMLHttpRequest();
                    ajax.addEventListener('readystatechange', function() {
                        if (ajax.readyState == 4 && ajax.status == 200) {
                            handle_result(ajax.responseText);

                        }
                    });
                    ajax.open("POST", "<?=ROOT?>Ajax_meal", true);
                    ajax.send(formdata);
                }


                function handle_result(result) {
                  
                    if (result != "") {
                        
                        var obj = JSON.parse(result);

                        
                        if (typeof obj.data_type != 'undefined') {
                          
                            if (obj.data_type == "add_new") {
                                if (obj.message_type == "info") {

                                    alert(obj.message);
                                    show_add_new();
                                    var table_body = document.querySelector("#table_body");
                                    table_body.innerHTML = obj.data;
                                } else {
                                    alert(obj.message);
                                }
                            } else {
                                if (obj.data_type == "delete_row") {

                                    var table_body = document.querySelector("#table_body");
                                    table_body.innerHTML = obj.data;
                                    
                                    alert(obj.message);

                                }
                                if (obj.data_type == "edit_meal") {
                                    show_edit_meal(0, '', false);

                                    var table_body = document.querySelector("#table_body");
                                    table_body.innerHTML = obj.data;
                                    alert(obj.message);
                                }
                            }
                        }




                    }

                }
                

                function delete_row(e, id) {
                    if (confirm("Are you sure you want to delete this row ?")) {
                        var data = new FormData();
                      data.append('data_type', "delete_row");
                    data.append('id', id);
                   send_data(data);

                    }
                   


                }
                </script>
                <?php $this->view("dashboard/includes/scripts",$data) ; 
$this->view("dashboard/includes/footer",$data) ; ?>