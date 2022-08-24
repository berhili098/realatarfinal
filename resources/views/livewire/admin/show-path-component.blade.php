<div>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Path Detail > {{ $path->name_en }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-path') }}">Path</a></li>
                        <li class="breadcrumb-item active">Show Path</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Path Details</h3>
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="img-responsive"
                                        src="{{ asset('primary/assets/images/paths') }}/{{ $path->photo }}"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-responsive"
                                        src="{{ asset('primary/assets/images/paths') }}/{{ $path->photo }}"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item ">
                                    <img class="img-responsive"
                                        src="{{ asset('primary/assets/images/paths') }}/{{ $path->photo }}"
                                        alt="First slide">
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
                                    aria-hidden="true"></i> {{ $path->name_en }} Morocco
                                <span class="font-weight-light text-muted float-right"><small>Added by :
                                        {{ $path->user->name }}</small> </span>
                            </h4>

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
                                    <h4 class="pt-2">Name : {{ $path->name_en }}</h4>
                                    <p class="text-dark p-t-20 pro-desc">
                                        {{ $path->description_en }}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile8" role="tabpanel">
                                <div class="p-20">
                                    <h3>Description français</h3>
                                    <h4 class="pt-2">NOM : {{ $path->name_fr }} </h4>
                                    <p class="text-dark p-t-20 pro-desc">
                                        {{ $path->description_fr }}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages8" role="tabpanel">
                                <div class="p-20 text-right" lang="ar" dir="rtl">
                                    <h3>وصف عربي</h3>
                                    <h4 class="pt-2">اسم : {{ $path->name_ar }}</h4>
                                    <p class="text-dark p-t-20 pro-desc">
                                        {{ $path->description_ar }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="ti-direction"></i> Additional Information</h5>
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody class="text-dark">
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <span
                                                class="{{ $path->status == 0 ? 'bg-success' : 'bg-danger' }} text-white rounded p-1">
                                                {{ $path->status == 0 ? 'active' : 'inactive' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Created at</td>
                                        <td>
                                            {{ $path->created_at->format('Y-m-d')  }}
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Length</td>
                                        <td class="text-primary">{{ $path->length==0 ? 'None' : $path->length .' m' }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Duration</td>
                                        <td> {{ $path->duration }}  minutes</td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              
             

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="ti-video-clapper"></i> Video file</h5>
                        <div class="text-center">
                        
                          
                                    <video width="300" controls>
                                        <source
                                            src="{{ asset('primary/assets/images/paths') }}/{{ $path->video }}"
                                            type="video/mp4">
                                        <source
                                        src="{{ asset('primary/assets/images/paths') }}/{{ $path->video }}"
                                            type="video/ogg">
                                        Your browser does not support HTML video.
                                    </video>
                       
                        </div>

                    </div>
                </div>




                

                
                <div class="card">
                    {{-- <div class="card-body">
                        <h5 class="card-title">Sites {{ $city->city_en }}</h5>
                        @if (count($city->sites) == 0)
                            <div class="text-center">
                                <p>0 records found.</p>
                                <p>use the bottom bellow to add new site to {{ $city->city_en }}</p>
                                <a href="" class="btn btn-info"><i class="fa fa-plus"></i></a>
                            </div>
                        @else
                            <div class="row">
                                @foreach ($city->sites as $site)
                                    <div class="col-md-4 text-center">
                                        <div class="card">
                                            <a href="#" class="p-b-10">
                                                <img width="100px" src="{{ asset('primary/assets/images/sites/') }}/{{ $site->photo }}">
                                            </a>
                                            <h6><a href="#">{{ $site->name_en }}</a></h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div> --}}
                </div>
            </div>
        </div>

    </div>
</div>
