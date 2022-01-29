<?php $this->view("dashboard/includes/header",$data) ;
$this->view("dashboard/includes/navbar",$data) ; ?>
<style type="text/css">
.add_new {
    width: 300px;
    height: 800px;
    background-color: #cecccc;
    position: absolute;
    padding: 6px;
    box-shadow: 0px 0px 10px;
}
.edit_product-images img{
  width: 100px;
  height : 100px;
  position : relative ;
  top: -20px;
  left : 28%;
  
}

.edit_chef {
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
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Chefs List </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="search-field d-none d-md-block">
                            
                            <button type="button" class="btn btn-dark btn-sm" onclick="show_add_new(event)">Add new chef</button>
                            <!--add chef-->
                            <div class="add_new hide">
                                <h3 class="page-title" style="padding-bottom:15px"> Add chef </h3>
                                <form enctype="multipart/form-data" class="row row-cols-lg-auto g-3" method="post">
                                    <div class="form-group" style="width:300px">
                                        <label>chef Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Chef Name">
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef occupation</label>
                                        <input type="text" class="form-control" name="occupation" id="occupation" 
                                            placeholder="chef occupation" required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef facebook</label>
                                        <input type="text" class="form-control" name="facebook" id="facebook"
                                            placeholder=required required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef instagram</label>
                                        <input type="text" class="form-control" name="instagram" id="instagram" 
                                            placeholder="chef instagram" required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef linkedin</label>
                                        <input type="text" class="form-control" name="linkedin" id="linkedin" 
                                            placeholder="chef linkedin" required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef image </label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            placeholder="Meal image" optional>
                                    </div>
                                    <div class="js-product-images edit_product-images">

                                    </div>
                                        
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" onclick="collect_data(event)">Add
                                            Chef</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger"
                                            onclick="show_add_new(event)">Close</button>
                                    </div>
                                </form>


                            </div>
                            <!--edit chef-->
                            <div class="edit_chef hide">
                                <h3 class="page-title" style="padding-bottom:15px"> Edit Chef </h3>
                                <form class="row row-cols-lg-auto g-3" method="post">
                                <div class="form-group" style="width:300px">
                                        <label>chef Name</label>
                                        <input type="text" class="form-control"  id="add_name" placeholder="Meal Name">
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef occupation</label>
                                        <input type="text" class="form-control" name="occupation" id="add_occupation" 
                                            placeholder="chef occupation" required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef facebook</label>
                                        <input type="text" class="form-control" name="facebook" id="add_facebook"
                                            placeholder=required required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef instagram</label>
                                        <input type="text" class="form-control" name="instagram" id="add_instagram" 
                                            placeholder="chef instagram" required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef linkedin</label>
                                        <input type="text" class="form-control" name="linkedin" id="add_linkedin" 
                                            placeholder="chef linkedin" required>
                                    </div>
                                    <br><br style="clear:both;">
                                    <div class="form-group" style="width:300px">
                                        <label>Chef image </label>
                                        <input type="file" class="form-control" name="image" id="add_image"
                                            placeholder="Meal image" optional>
                                    </div>
                                    <div class="js-product-images edit_product-images">

                                    </div>
                                  
                                    <div class="col">
                                    <button type="button" class="btn btn-primary" onclick="collect_edit_data(event)">Save</button>
                                  </div>
                                    <div class="col">
                                    <button type="button" class="btn btn-danger" onclick="show_edit_chef(0,'',event)">Cancel</button>
                                  </div>
                                </form>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> id </th>
                                        <th> name </th>
                                        <th>occupation</th>
                                        <th> facebook</th>
                                        <th> instagram </th>
                                        <th> linkedin</th>
                                        <th> state </th>
                                        <th>image</th>

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
                    var chef_input = document.querySelector("#name");
                    if (show_add_box.classList.contains("hide")) {
                        show_add_box.classList.remove("hide");
                        chef_input.focus();
                    } else {
                        show_add_box.classList.add("hide");
                        chef_input.value = "";
                    }
                }
               function show_edit_chef(id, name, e) {
                  
                  var show_edit_box = document.querySelector(".edit_chef");
                  if(e) {
                   
                    var a = (e.currentTarget.getAttribute("info"));
                    
                    if(a) {
                      var info = JSON.parse(a.replaceAll("'", '"'));
                      
                    
                    
                    EDIT_ID = info.id;
                    
                    
                    

                    var chef_input = document.querySelector("#add_name");
                    
                    chef_input.value = info.name;
                    var image_input = document.querySelector(".js-product-images");
                    image_input.innerHTML = `<img src="<?=ROOT?>/uploads/${info.image} " />`
                    
                    
                    
                    var occupation_input = document.querySelector("#add_occupation");
                    
                    occupation_input.value = info.occupation;
                    
              
                    
                    var facebook_input = document.querySelector("#add_facebook");
                    facebook_input.value = info.facebook;
                    
                    var instagram_input = document.querySelector("#add_instagram");
                    instagram_input.value = info.instagram;
                   
                    var linkedin_input = document.querySelector("#add_linkedin");
                    linkedin_input.value = info.linkedin;
                    
                    }
                    if (show_edit_box.classList.contains("hide")) {
                      
                      show_edit_box.classList.remove("hide");
                      chef_input.focus();
                  } else {
                    
                      show_edit_box.classList.add("hide");
                      
                      chef_input.value = "";
                      
                      
                  }
                    }
                    
                    
                  
                    
                }
                
            


                function collect_data(e) {
                  
                    var chef_input = document.querySelector("#name");
                    
                    if (chef_input.value.trim() == '' || !isNaN(chef_input.value.trim())) {
                      
                        alert("please enter a valid chef name");
                        return;
                    }
                    var occupation_input = document.querySelector("#occupation");
                    if (occupation_input.value.trim() == '' || !isNaN(occupation_input.value.trim())) {

                        alert("please enter a valid occupation name");
                        return;
                    }
                    var image_input = document.querySelector("#image");

                    if (image_input.files.length == 0) {

                        alert("please enter a valid image");
                        return;
                    }
                    
                    var facebook_input = document.querySelector("#facebook");
                    var instagram_input = document.querySelector("#instagram");
                    var linkedin_input = document.querySelector("#linkedin");
                    

                    var data = new FormData();
                    data.append('name', chef_input.value.trim());
                    data.append('occupation', occupation_input.value.trim());
                    data.append('facebook', facebook_input.value.trim());
                    data.append('instagram', instagram_input.value.trim());
                    data.append('linkedin', linkedin_input.value.trim());
                    data.append('image', image_input.files[0]);
                    data.append('data_type', 'add_chef');
                    send_data_files(data);
                    
            


                }

                function collect_edit_data(e) {
                  var data = new FormData();
                  var chef_input = document.querySelector("#add_name");
                    if (chef_input.value.trim() == '' || !isNaN(chef_input.value.trim())) {

                        alert("please enter a valid meal name");
                        return;
                    }
                    var occupation_input = document.querySelector("#add_occupation");
                    if (occupation_input.value.trim() == '' || !isNaN(occupation_input.value.trim())) {

                        alert("please enter a valid meal name");
                        return;
                    }
                    var image_input = document.querySelector("#add_image");
                        
                        if (image_input.files.length >  0) {

                            
                            data.append('image',image_input.files[0]) ;
                            
                            
                        }
                    var facebook_input = document.querySelector("#add_facebook");
                    var instagram_input = document.querySelector("#add_instagram");
                    var linkedin_input = document.querySelector("#add_linkedin");
                    

                    
                    data.append('name', chef_input.value.trim());
                    data.append('occupation', occupation_input.value.trim());
                    data.append('facebook', facebook_input.value.trim());
                    data.append('instagram', instagram_input.value.trim());
                    data.append('linkedin', instagram_input.value.trim());
                    data.append('data_type', 'edit_chef');
                    data.append('id',EDIT_ID);
                    send_data_files(data);
                    


                }

              

                function send_data(formdata) {

                  var ajax = new XMLHttpRequest();
                    ajax.addEventListener('readystatechange', function() {
                        if (ajax.readyState == 4 && ajax.status == 200) {
                          
                            handle_result(ajax.responseText);

                        }
                    });
                    ajax.open("POST", "<?=ROOT?>Ajax_chef", true);
                    ajax.send(formdata);
                }

                function send_data_files(formdata) {

                    var ajax = new XMLHttpRequest();
                    ajax.addEventListener('readystatechange', function() {
                        if (ajax.readyState == 4 && ajax.status == 200) {
                            handle_result(ajax.responseText);

                        }
                    });
                    ajax.open("POST", "<?=ROOT?>Ajax_chef", true);
                    ajax.send(formdata);
                    }

                


                function handle_result(result) {
                  console.log(result)
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
                                if (obj.data_type == "edit_chef") {
                                  
                                    show_edit_chef(0,'', false);
                                    
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






