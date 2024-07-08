<div class="col-xl-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body">

                                        <h4 class="header-title mb-3">Wizard With Progress Bar</h4>

                                        <form>
                                            <div id="progressbarwizard">

                                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                                    <li class="nav-item">
                                                        <a href="#account-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-1">
                                                            <i class="ri-account-circle-line fw-normal fs-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Account</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#profile-tab-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-1">
                                                            <i class="ri-profile-line fw-normal fs-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Profile</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#finish-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-1">
                                                            <i class="ri-check-double-line fw-normal fs-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Finish</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            
                                                <div class="tab-content b-0 mb-0">

                                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                    </div>
                                            
                                                    <div class="tab-pane" id="account-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="userName1">User name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="userName1" name="userName1" value="Powerx">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="password1"> Password</label>
                                                                    <div class="col-md-9">
                                                                        <input type="password" id="password1" name="password1" class="form-control" value="123456789">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="confirm1">Re Password</label>
                                                                    <div class="col-md-9">
                                                                        <input type="password" id="confirm1" name="confirm1" class="form-control" value="123456789">
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <ul class="list-inline wizard mb-0">
                                                            <li class="next list-inline-item float-end">
                                                                <a href="javascript:void(0);" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="tab-pane" id="profile-tab-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="name1"> First name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="name1" name="name1" class="form-control" value="Francis">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="surname1"> Last name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="surname1" name="surname1" class="form-control" value="Brinkman">
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="email1">Email</label>
                                                                    <div class="col-md-9">
                                                                        <input type="email" id="email1" name="email1" class="form-control" value="cory1979@hotmail.com">
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                        <ul class="pager wizard mb-0 list-inline">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Account</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
                                                                <button type="button" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></button>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="tab-pane" id="finish-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="text-center">
                                                                    <h2 class="mt-0"><i class="ri-check-double-line"></i></h2>
                                                                    <h3 class="mt-0">Thank you !</h3>

                                                                    <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                                                        mattis dictum aliquet.</p>

                                                                    <div class="mb-3">
                                                                        <div class="form-check d-inline-block">
                                                                            <input type="checkbox" class="form-check-input" id="customCheck3">
                                                                            <label class="form-check-label" for="customCheck3">I agree with the Terms and Conditions</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                        <ul class="pager wizard mb-0 list-inline mt-1">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Profile</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
                                                                <button type="button" class="btn btn-info">Submit</button>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div> <!-- tab-content -->
                                            </div> <!-- end #progressbarwizard-->
                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>