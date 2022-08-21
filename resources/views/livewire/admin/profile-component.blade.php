<div>
    <!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles" >
     
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Profile</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
                    Create New</button>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger" >
                        <h3>please fix the follow error :</h3>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
                    <center class="m-t-30"> <img src="{{ asset('primary/assets/images/users/' . Auth::user()->photo) }}"
                            class="img-circle" width="150" />
                        <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                        <h6 class="card-subtitle">{{ Auth::user()->utype == 'USR' ? 'User' : 'Admin' }}</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                    <font class="font-medium">254</font>
                                </a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i>
                                    <font class="font-medium">54</font>
                                </a></div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6>{{ Auth::user()->email }}</h6> <small class="text-muted p-t-30 db">Villes ajoutée(s)</small>
                    <h6>{{ $users->cities->count() == 0 ? 'Aucun Repere ajouté' : $users->cities->count() }}</h6> <small
                        class="text-muted p-t-30 db">Reperes ajouté(s)</small>
                    <h6>{{ $users->sites->count() == 0 ? 'Aucun Repere ajouté' : $users->sites->count() }}</h6>

                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist" wire:ignore>
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home"
                            role="tab">Timeline</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile"
                            role="tab">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings"
                            role="tab">Settings</a> </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" wire:ignore>
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body ">
                            <div class="profiletimeline">
                                <div class="bg-secondary p-3 d-flex justify-content-between align-items-center has-arrow waves-effect waves-dark"
                                    data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    <h4 class="m-0">Les Villes</h4>
                                    <i class="ti-arrow-down"></i>
                                </div>

                                <i class="arrow"></i>
                                <div class="collapse p-3" id="collapseExample">
                                    @foreach ($users->cities->sortByDesc('created_at') as $city)
                                        <div class="sl-item">

                                            <div class="sl-right">
                                                <div><span
                                                        class="sl-date">{{ $city->created_at->diffForHumans() }}</span>
                                                    <p>Creation de la ville <a
                                                            href="{{ route('admin-showcity', $city->id) }}">{{ $city->city_fr }}</a>
                                                    </p>
                                                    <div class="row">

                                                        <div class="col-lg-3 col-md-6 m-b-20"><img
                                                                src="{{ asset('primary/assets/images/cities/' . $city->photo) }}"
                                                                class="img-responsive radius" /></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                                <br>
                                <div class="bg-secondary p-3 d-flex justify-content-between align-items-center has-arrow waves-effect waves-dark"
                                    data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false"
                                    aria-controls="collapseExample2">
                                    <h4 class="m0">Les Reperes</h4>
                                    <i class="ti-arrow-down"></i>
                                </div>
                                <div class="collapse p-3" id="collapseExample2">
                                    @foreach ($users->sites->sortByDesc('created_at') as $site)
                                        <div class="sl-item">

                                            <div class="sl-right">
                                                <div><span
                                                        class="sl-date">{{ $site->created_at->diffForHumans() }}</span>
                                                    <p>Creation du repere <a
                                                            href="{{ route('admin-showsite', $site->id) }}">{{ $site->name_fr }}</a>
                                                    </p>
                                                    <div class="row">

                                                        <div class="col-lg-3 col-md-6 m-b-20"><img
                                                                src="{{ asset('primary/assets/images/sites/' . $site->photo) }}"
                                                                class="img-responsive radius" /></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--second tab-->
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">{{ Auth::user()->name }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">(+212){{ Auth::user()->phoneNo }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>city</strong>
                                    <br>
                                    <p class="text-muted">{{ explode(' ', Auth::user()->address)[0] }}</p>
                                </div>
                            </div>
                            <hr>
                            <p class="m-t-30">{!! html_entity_decode(nl2br(e(Auth::user()->description)))!!}</p>



                        </div>
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel">
                        <div class="card-body">

                            <form class="form-horizontal form-material" wire:submit.prevent="updateProfile()">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe" wire:model='name'
                                            class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com" wire:model='email'
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" wire:model='password'
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="tel" placeholder="123 456 7890" wire:model='phoneNo'
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line" wire:model='address'></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Description</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line" wire:model='description'></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">BirthDate</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="123 456 7890" wire:model='birthdate'
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                    <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a>
                    </li>
                    <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a>
                    </li>
                    <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a>
                    </li>
                </ul>
                <ul class="m-t-20 chatonline">
                    <li><b>Chat option</b></li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img"
                                class="img-circle"> <span>Varun Dhavan <small
                                    class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img"
                                class="img-circle"> <span>Genelia Deshmukh <small
                                    class="text-warning">Away</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img"
                                class="img-circle"> <span>Ritesh Deshmukh <small
                                    class="text-danger">Busy</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img"
                                class="img-circle"> <span>Arijit Sinh <small
                                    class="text-muted">Offline</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img"
                                class="img-circle"> <span>Govinda Star <small
                                    class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img"
                                class="img-circle"> <span>John Abraham<small
                                    class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img"
                                class="img-circle"> <span>Hritik Roshan<small
                                    class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img"
                                class="img-circle"> <span>Pwandeep rajan <small
                                    class="text-success">online</small></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->

</div>