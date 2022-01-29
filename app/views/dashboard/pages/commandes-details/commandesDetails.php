<?php $this->view("dashboard/includes/header",$data) ;
$this->view("dashboard/includes/navbar",$data) ; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Commands List </h3>
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
                        <input type="text" class="form-control bg-transparent border-0 " placeholder="Search by name">
                      </div>
                    </form>
                  </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> image </th>
                          <th> id </th>
                          <th> Full name </th>
                          <th>number of meals</th>
                          <th>time</th>
                          <th> Amount </th>
                          <th> state <th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="<?=ASSETS?>assets-dashboard/images/faces-clipart/pic-1.png" alt="image" />
                          </td>
                          <td> 1 </td>
                          <td> Herman Beck </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                          <td><button type="button" class="btn btn-dark btn-sm">not livred</button></td>
                          <!-- lorsque on click sur le btn la commandes disparait from the table mais non from la base de donnée-->
                        </tr>     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          <!-- content-wrapper ends -->
<?php $this->view("dashboard/includes/scripts",$data) ; 
$this->view("dashboard/includes/footer",$data) ; ?>