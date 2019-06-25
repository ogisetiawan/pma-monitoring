  <!--Navbar-->
  <nav class="navbar navbar-dark red-pma navbar-expand-lg scrolling-navbar">
      <div class="container-fluid">
          <!-- Brand -->
          <a class="navbar-brand waves-effect" href="<?= site_url('portal') ?>" target="_blank" style="font-weight:600">
              <!-- <img src="http://192.168.35.160/portal/monitoring/img/blowing.gif" height="30" alt="mdb logo"> -->
              <img src="http://192.168.35.160/pma_dev/kpi/assets/login/img/pma3.png" height="50" alt="mdb logo">PINUS MERAH ABADI, PT
          </a>

          <!-- Collapse -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size:13px">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link waves-effect waves-light" href="#">
                          <i class="fas fa-file-invoice"></i> LBP
                          <span class="sr-only">(current)</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link waves-effect waves-light" href="#">
                          <i class="fas fa-dollar-sign"></i> KASBANK</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link waves-effect waves-light" href="#">
                          <i class="fas fa-box"></i> INVENTORY</a>
                  </li>
                  <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fas fa-user"></i> USER </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item waves-effect waves-light" href="#">My account</a>
                            <a class="dropdown-item waves-effect waves-light" href="#">Log out</a>
                        </div>
                    </li> -->
              </ul>
          </div>
      </div>
  </nav>
  <!--/.Navbar-->
  
  <!-- Title -->
  <div class="d-flex flex-row-reverse shadow-sm p-2">
      <div class="form-row">
          <div class="col-auto col-xs-12">
              <select class="form-control custom-select-sm" id="selected-tahun" title="Tahun">
                  <?php
                    $tahun = date('Y') + 1;
                    $month = date('m');
                    for ($i = 2016; $i <= $tahun; $i++) { ?>
                      <option value="<?php echo $i ?>" <?php if (date('Y') == $i) {
                                                            echo "selected ";
                                                        } ?>><?php echo $i ?></option>
                  <?php } ?>
              </select>
          </div>
          <div class="col-auto col-xs-12">
              <select id="selected-bulan" class="form-control custom-select-sm"" title=" Bulan">
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