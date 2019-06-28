  <!--Navbar-->
  <nav class="navbar navbar-dark red-pma navbar-expand-md sticky-top scrolling-navbar">
      <div class="container-fluid">
          <!-- Brand -->
          <a class="navbar-brand waves-effect" href="<?= site_url('') ?>" style="font-weight:600">
              <img src="http://192.168.35.160/portal/monitoring_old/img/blowing.gif" height="30" alt="Pinus Merah Abadi">
          </a>

          <!-- Collapse -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size:13px">
              <ul class="navbar-nav ml-auto">
                  </li>
                  <a id="navbar-static-login" class="btn btn-outline-light btn-sm" data-toggle="modal" style="border-radius:16px" data-target="#modalLogin">
                      Log In
                      <i class="fas fa-sign-in-alt"></i>
                  </a>
              </ul>
          </div>
      </div>
  </nav>
  <!--/.Navbar-->

  <!-- Header Title -->
  <div class="d-flex justify-content-between shadow-sm p-2">
      <div>
          <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
              <button type="button" onClick="fnExcelReport()" class="btn btn-outline"><i class="fas fa-file-excel pr-2"></i>XLSX</button>
              <button type="button" class="btn btn-outline"><i class="far fa-file-pdf pr-2"></i>PDF</button>
              <button type="button" class="btn btn-outline"><i class="fas fa-print pr-2"></i>PRINT</button>
          </div>
      </div>
      <div class="">
          <div class="form-row">
              <div class="col-auto col-xs-12">
                  <select id="selected-modul" class="form-control custom-select-sm" title=" Group Region">
                      <option value="LBP">LBP</option>
                      <option value="SAPKASBANK">KASBANK</option>
                      <option value="SAPINV">INVENTORY</option>
                  </select>
              </div>
              <div class="col-auto col-xs-12">
                  <select id="selected-bulan" class="form-control custom-select-sm"" title=" Bulan">
                      <?php
                        $tahun = date('Y') + 1;
                        $month = date('m');
                        ?>
                      <option <?php if ($month == '01') {
                                    echo "selected ";
                                } ?>value="01"> January</option>
                      <option <?php if ($month == '02') {
                                    echo "selected ";
                                } ?>value="02"> Febuary</option>
                      <option <?php if ($month == '03') {
                                    echo "selected ";
                                } ?>value="03"> March</option>
                      <option <?php if ($month == '04') {
                                    echo "selected ";
                                } ?>value="04"> April</option>
                      <option <?php if ($month == '05') {
                                    echo "selected ";
                                } ?>value="05"> May</option>
                      <option <?php if ($month == '06') {
                                    echo "selected ";
                                } ?>value="06"> June</option>
                      <option <?php if ($month == '07') {
                                    echo "selected ";
                                } ?>value="07"> July</option>
                      <option <?php if ($month == '08') {
                                    echo "selected ";
                                } ?>value="08"> August</option>
                      <option <?php if ($month == '09') {
                                    echo "selected ";
                                } ?>value="09"> September</option>
                      <option <?php if ($month == '10') {
                                    echo "selected ";
                                } ?>value="10"> October</option>
                      <option <?php if ($month == '11') {
                                    echo "selected ";
                                } ?>value="11"> November</option>
                      <option <?php if ($month == '12') {
                                    echo "selected ";
                                } ?>value="12"> December</option>
                  </select>
              </div>
              <div class="col-auto col-xs-12">
                  <select class="form-control custom-select-sm" id="selected-tahun" title="Tahun">
                      <?php
                        for ($i = 2016; $i <= $tahun; $i++) { ?>
                          <option value="<?php echo $i ?>" <?php if (date('Y') == $i) {
                                                                echo "selected ";
                                                            } ?>><?php echo $i ?></option>
                      <?php } ?>
                  </select>
              </div>

              <div class="col-auto col-xs-12">
                  <select id="selected-group-region" class="form-control custom-select-sm" title=" Group Region">
                      <option value="" selected>-- SELECT GROUP REGION --</option>
                      <option value="1">West</option>
                      <option value="2">Central</option>
                      <option value="3">East</option>
                  </select>
              </div>
              <div class="col-auto col-xs-12">
                  <select id="selected-region" class="form-control custom-select-sm" title=" Region" data-style="btn-sm btn-default" data-width="100px">
                      <option value="">-- SELECT REGION --</option>
                  </select>
              </div>
          </div>
      </div>
  </div>
  <section class="text-center mt-4">
      <h4 class="font-medium font-weight-light text-uppercase">
          <span class="bq-reds pl-1 title">
          </span>
      </h4>
  </section>
  <!-- Header Title -->


  <!-- Modal: modalPoll -->
  <div class="modal fade right" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
          <div class="modal-content">
              <!--Header-->
              <div class="modal-header" style="background: -webkit-linear-gradient(right, #f05454 0%, #cc0000 65%);">

                  <p class="heading lead text-uppercase">dashboard monitoring</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">×</span>
                  </button>
              </div>
              <!--Body-->
              <div class="modal-body">
                  <!-- Material form register -->
                  <form>
                      <!-- Material outline input with prefix-->
                      <p class="h4 mb-4"><i class="fas fa-sign-in-alt animated rotateIn mr-2"></i>Login Form</p>
                      <div class="md-form md-outline">
                          <i class="fas fa-envelope prefix grey-text"></i>
                          <input type="text" id="inputIconEx1" class="form-control">
                          <label for="inputIconEx1" data-error="wrong" data-success="right">E-mail address</label>
                      </div>
                      <div class="md-form md-outline">
                          <i class="fas fa-lock prefix grey-text"></i>
                          <input type="password" id="inputValidationEx2" class="form-control validate">
                          <label for="inputValidationEx2" data-error="wrong" data-success="right">Your password</label>
                      </div>
                      <div class="d-flex justify-content-around">
                          <div>
                              <!-- Remember me -->
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                  <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                              </div>
                          </div>
                          <div>
                              <!-- Forgot password -->
                              <a href="">Forgot password?</a>
                          </div>
                      </div>
                      <div class="text-center mt-4">
                          <button class="btn btn-sm btn-danger text-uppercase" type="submit">Login</button>
                          <button class="btn btn-sm btn-cyan text-uppercase" data-dismiss="modal" type="submit">Cancel</button>
                      </div>
                  </form>
                  <!-- Material form register -->
              </div>
          </div>
      </div>
  </div>
  <!-- Modal: modalPoll -->