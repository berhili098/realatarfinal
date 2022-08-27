<div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">

                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
                        Create New</button>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <!--.row -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12" style="cursor: pointer;"
            onclick=" window.location='{{ route('admin-cities') }}'" >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Villes</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-map-alt text-info"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">{{ $cities->count() }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12" style="cursor: pointer;"
            onclick=" window.location='{{ route('admin-sites') }}'" >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Sites</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-direction-alt text-purple"></i></h1>
                            <div class="ml-auto">
                     <h1 class="text-muted">{{ $sites->count() }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Users</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="icon-people text-danger"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">{{ $users->count() }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Total Ernings</h5>
                        <div class="d-flex align-items-center no-block m-t-20 m-b-10">
                            <h1><i class="ti-wallet text-success"></i></h1>
                            <div class="ml-auto">
                                <h1 class="text-muted">8170 MAD</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- End Info box -->

        <!-- ============================================================== -->
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">SITES OVERVIEW</h5>
                        <div class="table-responsive">
                            <table class="table product-overview">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Open Time </th>
                                        <th>Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sites->sortByDesc('created_at')->take(5) as $site)
                                    <tr class="data-vertical"  style="cursor: pointer;"
                                    onclick=" window.location='{{ route('admin-showsite',$site->id) }}'">
                                        <td>{{ $site->name_fr }}</td>
                                        <td> <img src="{{ asset('primary/assets/images/sites/'.$site->photo) }}" alt="iMac" width="80"> </td>
                                        <td>{{ $site->user->name }}</td>
                                        <td>{{ $site->created_at }}</td>
                                        <td>{{ $site->openTime }}</td>
                                        <td>{{ $site->price }} MAD</td>
                                        <td> <span class="label @if ($site->status == 0) label-success @else label-danger @endif label-success font-weight-100">{{ $site->status == 0 ? 'Actif' : 'Inactif' }}</span> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- End Comment - chats -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
        <!-- ============================================================== -->
        <!-- .row  -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card h-97">
                    <div class="card-body">
                        <div class="d-flex m-b-40 align-items-center">
                            <h5 class="card-title">CLIENTS STATS</h5>
                            <div class="ml-auto">
                                <ul class="list-inline font-12">
                                    <li><i class="fa fa-circle text-cyan"></i> For Sale</li>
                                    <li><i class="fa fa-circle text-primary"></i> For Rent</li>
                                    <li><i class="fa fa-circle text-purple"></i> All</li>
                                </ul>
                            </div>
                        </div>
                        <div id="morris-bar-chart" style="height:352px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card h-97">
                    <div class="card-body">
                        <h5 class="card-title">RECENT CITIES</h5>
                        @foreach ($cities->sortByDesc('created_at')->take(4) as $city)
                            
                   
                        <div class="d-flex no-block m-b-20 m-t-30">
                            <div class="p-r-15">
                                <a href="#"><img src="{{ asset('primary/assets/images/cities/'.$city->photo) }}" 
                                        alt="property" width="100" height="100"></a>
                            </div>
                            <div>
                                <h5 class="card-title m-b-5"><a href="#" class="link">{{$city->city_fr}}</a></h5>
                                <span class="text-muted">{{ $city->created_at }} | {{ $city->user->name }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row  -->
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('primary/dist/css/main.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('primary/dist/js/dashboard1.js') }}"></script>
@endpush
