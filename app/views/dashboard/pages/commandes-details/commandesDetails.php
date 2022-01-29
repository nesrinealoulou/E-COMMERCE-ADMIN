<?php $this->view("dashboard/includes/header",$data) ;
$this->view("dashboard/includes/navbar",$data) ; ?>
<style type="text/css">






</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> orders details list </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="search-field d-none d-md-block">
                            
                            
                            

                            
                                    
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> id_user </th>
                                        <th> num_ligne</th>
                                        <th>id_meal</th>
                                        <th>quantity</th>
                                        <th> price</th>
                                        <th> status </th>
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


                
                
                <?php $this->view("dashboard/includes/scripts",$data) ; 
$this->view("dashboard/includes/footer",$data) ; ?>






