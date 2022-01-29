<?php $this->view("dashboard/includes/header",$data) ;
$this->view("dashboard/includes/navbar",$data) ; ?>
<style type="text/css">


.edit_order {
    width: 300px;
    height: 250px;
    background-color: #cecccc;
    position: absolute;
    z-index : 1111111111111111111111;
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
            <h3 class="page-title"> orders list </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="search-field d-none d-md-block">
                            
                            <!--edit status-->
                            <div class="edit_order hide">
                                <h3 class="page-title" style="padding-bottom:15px"> Edit order Status </h3>
                                <form class="row row-cols-lg-auto g-3" method="post">
                                <div class="form-group" style="width:300px">
                                        <label>order Status</label>
                                        <select class="form-control form-control-sm" name="status" id="edit_status"
                                            required>
                                            <option></option>
                              
                                            <option>delivered</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                    <button type="button" class="btn btn-primary" onclick="collect_edit_data(event)">Save</button>
                                  </div>
                                    <div class="col">
                                    <button type="button" class="btn btn-danger" onclick="show_edit_order(0,'',event)">Cancel</button>
                                  </div>
                                </form>
                            </div>
                            

                            
                                    
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> id_order </th>
                                        <th> id_user</th>
                                        <th>date_order</th>
                                        <th> delivery_adress</th>
                                        <th> status </th>
                                        <th> total_order </th>
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
                var EDIT_ID_USER = 0;
              function show_edit_order(id,id_user,name, e) {
                  var show_edit_box = document.querySelector(".edit_order");
                  if(e) {
                   
                    var a = (e.currentTarget.getAttribute("info"));
                    
                    if(a) {
                    var info = JSON.parse(a.replaceAll("'", '"'));
                    
                   
                    
                    
                    EDIT_ID = id;
                    EDIT_ID_USER = id_user ; 
                  
                    
                    
                    
                    
                    show_edit_box.style.left = (e.clientX - 1490) + "px";
                    show_edit_box.style.top = (e.clientY -60 ) + "px";

                  var status_input = document.querySelector("#edit_status");
                   status_input.value = info.name;

                    

                }
             
                
                
                }
                if (show_edit_box.classList.contains("hide")) {
                        show_edit_box.classList.remove("hide");
                       status_input.focus();
                    } else {
                        show_edit_box.classList.add("hide");
                       status_input.value = "";
                    }
                }

                function collect_edit_data(e) {
                  var data = new FormData();
                  var status_input = document.querySelector("#edit_status");
                    if (status_input.value.trim() == '' || !isNaN(status_input.value.trim())) {

                        alert("please enter a valid status name");
                        return;
                    }
                    data.append('status',status_input.value.trim());
                    data.append('data_type', 'edit_order');
                    data.append('id_order',EDIT_ID);
                    data.append('id_user',EDIT_ID_USER);
                    send_data(data);
        
                    
                }

              

                

                function send_data(formdata) {

                    var ajax = new XMLHttpRequest();
                    ajax.addEventListener('readystatechange', function() {
                        if (ajax.readyState == 4 && ajax.status == 200) {
                            handle_result(ajax.responseText);

                        }
                    });
                    ajax.open("POST", "<?=ROOT?>Ajax_order", true);
                    ajax.send(formdata);
                }


                function handle_result(result) {
                  console.log(result)
                    if (result != "") {

                        var obj = JSON.parse(result);

                        if (typeof obj.data_type != 'undefined') {
                          if (obj.data_type == "edit_order") {
                                    //show_edit_order(0, '', false);
                                    var table_body = document.querySelector("#table_body");
                                    table_body.innerHTML = obj.data;
                                    alert(obj.message);
                                }
                            }
                        }




                    }

                
                </script>
                <?php $this->view("dashboard/includes/scripts",$data) ; 
$this->view("dashboard/includes/footer",$data) ; ?>






