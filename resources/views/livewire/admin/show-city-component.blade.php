<div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Show city Detail</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-cities') }}">Cities</a></li>
                        <li class="breadcrumb-item active">Show City</li>
                    </ol>
                    
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- .row -->
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card h-97" >
                    <div class="card-body">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active text-center">
                                    <img class="img-responsive"
                                        src="{{ asset('primary/assets/images/cities') }}/{{ $city->photo }}"
                                        title="{{ $city->city_en }}" alt="{{ $city->city_en }}" width="70%" height="70%">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="p-t-20 p-b-20">
                            <h4 class="card-title "><i class="fa fa-map-marker text-danger m-r-10"
                                    aria-hidden="true"></i> {{ $city->city_en }}, Morocco <span
                                    class="font-weight-light text-muted float-right"><small>Added by :
                                        {{ $city->user->name }}</small> </span></h4>

                        </div>
                        <hr class="m-0 p-2">


                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home8" role="tab">
                                    <span> <i id="flag" class="flag-icon flag-icon-gb fa-2x"></i></span>
                                </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile8"
                                    role="tab"><span><i id="flag"
                                            class="flag-icon flag-icon-fr fa-2x"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages8"
                                    role="tab"><span><i id="flag"
                                            class="flag-icon flag-icon-ma fa-2x"></i></span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane  active" id="home8" role="tabpanel">
                                <div class="p-20">
                                    <h3>English description</h3>
                                    <h4 class="pt-2">Name : {{ $city->city_en }}</h4>
                                    <p class="text-dark p-t-20 pro-desc">
                                        {{ $city->description_en }}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile8" role="tabpanel">
                                <div class="p-20">
                                    <h3>Description français</h3>
                                    <h4 class="pt-2">NOM : {{ $city->city_fr }} </h4>
                                    <p class="text-dark p-t-20 pro-desc">
                                        {{ $city->description_fr }}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages8" role="tabpanel">
                                <div class="p-20 text-right" lang="ar" dir="rtl">
                                    <h3>وصف عربي</h3>
                                    <h4 class="pt-2"">اسم : {{ $city->city_ar }}</h4>
                                    <p class="text-dark p-t-20 pro-desc">
                                        {{ $city->description_ar }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-12">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Additional Information</h5>
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody class="text-dark">
                                    <tr>
                                        <td>Created at</td>
                                        <td>
                                            {{ $city->created_at->format('Y-m-d') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <span
                                                class="{{ $city->status == 1 ? 'bg-success' : 'bg-danger' }} text-white rounded p-1">
                                                {{ $city->status == 0 ? 'inactive' : 'active' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total sites</td>
                                        <td>{{ count($city->sites) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total pictures</td>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($city->sites as $site)
                                            {{ $count = $count + count($site->media->where('type','image')) }}
                                        @endforeach
                                        <td>{{ $count }}</td>
                                    </tr>
                                    <tr>
                                        @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($city->sites as $site)
                                        {{ $count = $count + count($site->media->where('type','video')) }}
                                    @endforeach
                                        <td>Total video</td>
                                        <td>{{ $count }}</td>
                                    </tr>
                                    <tr>
                                        @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($city->sites as $site)
                                        {{ $count = $count + count($site->media->where('type','audio')) }}
                                    @endforeach
                                        <td>Total audio</td>
                                        <td>{{ $count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Quiz</td>
                                        <td>3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location</h5>
                        <iframe
                        src="https://maps.google.com/?q={{ $city->latitude }},{{ $city->longitude }}&output=embed"
                            width="100%" height="244" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sites {{ $city->city_en }}</h5>
                        @if (count($city->sites) == 0)
                            <div class="text-center">
                                <p>0 records found.</p>
                                <p>use the bottom bellow to add new site to {{ $city->city_en }}</p>
                                <a href="{{ route('admin-addsite',['city_id'=>$city->id]) }}" class="btn btn-info"><i class="fa fa-plus"></i></a>
                            </div>
                        @else
                            <div class="row">
                                @foreach ($city->sites as $site)
                                    <div class="col-md-4 text-center">
                                        <div class="card">
                                            <a href="{{ route('admin-showsite',['site_id'=>$site->id]) }}" class="p-b-10">
                                                <img width="100px" src="{{ asset('primary/assets/images/sites/') }}/{{ $site->photo }}">
                                            </a>
                                            <h6><a href="#">{{ $site->name_en }}</a></h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                                <div class="text-center">
                                    <hr>
                                    <a href="{{ route('admin-addsite',['city_id'=>$city->id]) }}" class="btn btn-info"><i class="fa fa-plus"></i></a>
                                </div>
                            
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('styles')
<link href="{{ asset('primary/dist/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('primary/dist/css/pages/tab-page.css') }}" rel="stylesheet">
@endpush