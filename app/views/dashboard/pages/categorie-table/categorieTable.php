<?php $this->view("dashboard/includes/header",$data) ;
$this->view("dashboard/includes/navbar",$data) ; ?>
        <style type="text/css">
            .add_new {
                width:600px ; 
                height:100px; 
                background-color : #cecccc ; 
                position: absolute ; 
                padding: 6px;
                box-shadow: 0px 0px 10px; 
             }
             .edit_category {
                width:600px ; 
                height:100px; 
                background-color : #cecccc ; 
                position: absolute ; 
                padding: 6px;
                box-shadow: 0px 0px 10px; 
             }
             .show {
                 display : block ; 
             }
             .hide {
                 display : none ; 
             }

        </style>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Categorie List </h3>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="search-field d-none d-md-block">
                    
                    <button type="button" class="btn btn-dark btn-sm" onclick="show_add_new(event)" >Add new categorie</button>
                    <!--add category-->
                    
                        <div class="add_new hide">
                        <h3 class="page-title"> Add categorie </h3>
                            <form class="row row-cols-lg-auto g-3" method="post">
                                <div class="col">
                                    <input type="text" class="form-control" id="nom" placeholder="Starter Name" autofocus required>
                                </div>
                                <div class="col">
		                            <button type="button" class="btn btn-primary" onclick="collect_data(event)">Add Categorie</button>
	                            </div>
                                <div class="col">
		                            <button type="button" class="btn btn-danger" onclick="show_add_new(event)">Close</button>
	                            </div>
                            </form>
                        </div>
                        <!--edit categorie-->
                        <div class="edit_category hide">
                        <h3 class="page-title"> edit categorie </h3>
                            <form class="row row-cols-lg-auto g-3" method="post">
                                <div class="col">
                                    <input type="text" class="form-control" id="nom_edit" name="nom" placeholder="Starter Name" autofocus required>
                                </div>
                                <div class="col">
		                            <button type="button" class="btn btn-primary" onclick="collect_edit_data(event)">Save</button>
	                            </div>
                                <div class="col">
		                            <button type="button" class="btn btn-danger" onclick="show_edit_category(0,'',event)">Cancel</button>
	                            </div>
                            </form>
                        </div>
                  </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> code </th>
                          <th> nom </th>
                          <th> state <th>
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
   
  var EDIT_ID = 0 ; 
  
    function show_add_new() {
       var show_add_box = document.querySelector(".add_new")  ;
       var category_input = document.querySelector("#nom");
       if(show_add_box.classList.contains("hide")) {
            show_add_box.classList.remove("hide"); 
            category_input.focus() ; 
       }
       else {
            show_add_box.classList.add("hide"); 
            category_input.value = "" ;
       }
    }

    function show_edit_category(id,category,e) {
      EDIT_ID = id ;
       var show_edit_box = document.querySelector(".edit_category")  ;
       
       var category_input = document.querySelector("#nom_edit");
       category_input.value = category;
       if(show_edit_box.classList.contains("hide")) {
          show_edit_box.classList.remove("hide"); 
            category_input.focus() ; 
       }
       else {
          show_edit_box.classList.add("hide"); 
            category_input.value = "" ;
       }
    }
       function collect_data(e) {
           var category_input = document.querySelector("#nom") ; 
           if (category_input.value.trim() == '' || !isNaN(category_input.value.trim())) {
               alert("please enter a valid category name") ; 
           } 
           var data= category_input.value.trim() ; 
           send_data({
               data:data,
               data_type:'add_category'
            });
       }
       function collect_edit_data(e) {
           var category_input = document.querySelector("#nom_edit") ; 
           if (category_input.value.trim() == '' || !isNaN(category_input.value.trim())) {
               alert("please enter a valid category name") ; 
           } 
           
           var data= category_input.value.trim() ; 
           send_data({
              id:EDIT_ID,
              category:data,
              data_type:'edit_category'
            });
            
       }
       function send_data(data = {}) {
         
            var ajax = new XMLHttpRequest();
            ajax.addEventListener('readystatechange',function(){
                if(ajax.readyState == 4 && ajax.status == 200) {
                       handle_result(ajax.responseText) ; 
                       
                }
            }) ; 
            ajax.open("POST","<?=ROOT?>ajax_category",true) ; 
            ajax.send(JSON.stringify(data)) ; 
       }
       function handle_result(result) { 
        console.log(result) ;
         if(result !="") {
          var obj = JSON.parse(result) ;
          

          if(typeof obj.data_type != 'undefined') 
          {
             if(obj.data_type == "add_new") {
               if(obj.message_type == "info") 
                {
                  
                  alert(obj.message);
                  show_add_new() ; 
                  var table_body = document.querySelector("#table_body");
                  table_body.innerHTML = obj.data;
                }
                else
                {
                  alert(obj.message);
                }
            }else {
              if(obj.data_type == "delete_row") {
                
                var table_body = document.querySelector("#table_body");
                table_body.innerHTML = obj.data;
                alert(obj.message);
              
              }
              if(obj.data_type == "edit_category") {
                show_edit_category(0,'',false) ;
                
                var table_body = document.querySelector("#table_body");
                table_body.innerHTML = obj.data;
                alert(obj.message);
              }
            }
            }
             
            
    
          
         }
           
       }
       function edit_row(e,id)
       {
        send_data({
          data_type: ""
        })  
       }
       function delete_row(e,id)
       {
        if(confirm("Are you sure you want to delete this row ?"))
          {
            send_data({
              id:id,
              data_type:'delete_row'
            });

          }
          
     
     
          
       
       }
       
    

</script>
<?php $this->view("dashboard/includes/scripts",$data) ; 
$this->view("dashboard/includes/footer",$data) ; ?>