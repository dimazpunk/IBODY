<!--
=========================================================
Material Dashboard PRO - v2.2.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard-pro
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    BPMI - Dashboard
  </title>
  <?php include "page/dochead.php";?>
</head>
<body class="">
  <div class="wrapper ">
    <?php include "page/navbar.php";?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Scoring Foreman</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="" action="/" class="form-horizontal">
                    <div class="row">
											<label class="col-sm-2 col-form-label">Nilai 1 - 12</label>
											<div class="col-sm-3">
													<div class="form-group">
														<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
															<option selected></option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>                            
														</select>
													</div>
											</div>
                        <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="number" class="form-control" value="2.500" disabled>                         
                            </div>
                        </div>                                         
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Nilai 13 - 24</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected></option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                        </select>
                        </div>
                      </div>
                      <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="number" class="form-control" value="3.000" disabled>                         
                            </div>
                        </div>                    
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Nilai 25 - 36</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected></option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                        </select>
                        </div>
                      </div>
                      <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="number" class="form-control" value="4.000" disabled>                         
                            </div>
                        </div>                    
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Nilai 37 - 48</label>
                      <div class="col-sm-3">
                        <div class="form-group">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected></option>
                            <option value="38">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                        </select>
                        </div>
                      </div>
                      <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="number" class="form-control" value="6.000" disabled>                         
                            </div>
                        </div>                    
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Nilai 49 - 58</label>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                <option selected></option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                            </select>
                          </div>
                        </div>
                      <label class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <input type="number" class="form-control" value="8.000" disabled>                         
                            </div>
                        </div>                    
                    </div>                    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Disabled</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" value="Disabled input here.." disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <span class="box pull-left">
                        <button type="cancel" class="btn btn-warning">Batal</button>                      
                        <button type="submit" class="btn btn-success">Submit</button>
                      </span>
                      <span class="float-right">
                        <button type="view" class="btn btn-primary">View</button>                      
                        <button type="level up" class="btn btn-info">Level Up</button>
                      </span>
                    </div>
                                        
                  </form>
                </div>
              </div>
            </div>
					</div>
					<!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
				</div>
			</div>
		</div>

<?php include "page/footer.php";?>
</body>

</html>