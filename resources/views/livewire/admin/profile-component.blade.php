<div>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">

            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Profile</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                            class="fa fa-plus-circle"></i>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h3>please fix the follow error :</h3>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <center class="m-t-30">
                      
                            <div class="text-center">

                                @if ($newphoto)
                                    <img id="image-profile" src="{{ $newphoto->temporaryUrl() }}" class="img-circle"
                                        width="150" height="150">
                                @else
                                    <img id="image-profile"
                                        src="{{ asset('primary/assets/images/users') }}/{{ $photo }}"
                                        class="img-circle" width="150" height="150" >
                                @endif
                                <input type="file" id="uploadfile" class="custom-file-input " accept="image/*"
                                    wire:model="newphoto">

                            </div>
                            <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                            <h6 class="card-subtitle">{{ Auth::user()->utype == 'USR' ? 'User' : 'Admin' }}</h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                            class="icon-people"></i>
                                        <font class="font-medium">254</font>
                                    </a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                            class="icon-picture"></i>
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
                        <h6>{{ $users->cities->count() == 0 ? 'Aucun Repere ajouté' : $users->cities->count() }}</h6>
                        <small class="text-muted p-t-30 db">Reperes ajouté(s)</small>
                        <h6>{{ $users->sites->count() == 0 ? 'Aucun Repere ajouté' : $users->sites->count() }}</h6>
                        <div class="map-box">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508"
                                width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> <small class="text-muted p-t-30 db">Social Profile</small>
                        <br />
                        @if (Auth::user()->facebook)
                            <a href="{{ Auth::user()->facebook }}" target="_blank"
                                class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if (Auth::user()->twitter)
                            <a href="{{ Auth::user()->twitter }}" target="_blank"
                                class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if (Auth::user()->youtube)
                            <a href="{{ Auth::user()->youtube }}" target="_blank"
                                class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></a>
                        @endif

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
                                    @foreach ($all as $city)
                                        <div class="sl-item">

                                            <div class="sl-right">
                                                <div><span
                                                        class="sl-date">{{ $city->created_at->diffForHumans() }}</span>
                                                    <p>Creation de @if ($city->type == 'cities')
                                                            la ville
                                                        @else
                                                            repere
                                                        @endif <a
                                                            @if ($city->type == 'cities') href="{{ route('admin-showcity', $city->id) }}" @else  href="{{ route('admin-showsite', $city->id) }}" @endif>
                                                            @if ($city->type == 'cities')
                                                                {{ $city->city_en }}
                                                            @else
                                                                {{ $city->name_en }}
                                                            @endif
                                                        </a>
                                                    </p>
                                                    <div class="row">

                                                        <div class="col-lg-3 col-md-6 m-b-20"><img
                                                                @if ($city->type == 'cities') src="{{ asset('primary/assets/images/cities/' . $city->photo) }}"  @else   src="{{ asset('primary/assets/images/sites/' . $city->photo) }}" @endif
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

                                </div>
                                <hr>
                                @if (Auth::user()->description)
                                    <p class="m-t-30">{!! html_entity_decode(nl2br(e(Auth::user()->description))) !!}</p>
                                @else
                                    <p class="m-t-30 text-center">No description</p>
                                @endif

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
                                            <input type="email" placeholder="johnathan@admin.com"
                                                wire:model='email' class="form-control form-control-line"
                                                name="example-email" id="example-email">
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
                                        <label class="col-md-12">Facebook</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="https://web.facebook.com/xxxx"
                                                wire:model='facebook' class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Twitter</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="https://twitter.com/xxxx"
                                                wire:model='twitter' class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Youtube</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="https://www.youtube.com/channel/xxxx"
                                                wire:model='youtube' class="form-control form-control-line">
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

        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->

</div>

@push('scripts')

    <script>
        $(document).ready(function () {
           $('#image-profile').click(function(){
               $('#uploadfile').click();
           });
        });
    </script>
    <script src="{{ asset('primary/assets/node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('primary/dist/js/pages/mask.init.js') }}"></script>
@endpush
