<div>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Site Detail > {{ $site->name_en }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-sites') }}">Sites</a></li>
                        <li class="breadcrumb-item active">Show Site</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Site Details</h3>
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @php
                                    $index = 1;
                                @endphp
                                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                @foreach ($site->media->where('type','image') as $media)
                                    
                                        <li data-target="#carouselExampleIndicators2"
                                            data-slide-to="{{ $index }}"></li>
                                        @php
                                            $index++;
                                        @endphp
                                @endforeach
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img width="100%" height="100%" class="img-responsive"
                                        src="{{ asset('primary/assets/images/sites') }}/{{ $site->photo }}">
                                </div>
                                @foreach ($site->media as $media)
                                    @if ($media->type == 'image')
                                        <div class="carousel-item">
                                            <img class="img-responsive"
                                                src="{{ asset('primary/assets/images/sites/media/images') }}/{{ $media->name }}">
                                        </div>
                                    @endif
                                @endforeach
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
                                    aria-hidden="true"></i> {{ $site->name_en }}, {{ $site->city->city_en }}, Morocco
                                <span class="font-weight-light text-muted float-right"><small>Added by :
                                        {{ $site->user->name }}</small> </span>
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
                                    <h4 class="pt-2">Name : {{ $site->name_en }}</h4>
                                    <p class="text-dark p-t-20 pro-desc">
                                        {{ $site->description_en }}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile8" role="tabpanel">
                                <div class="p-20">
                                    <h3>Description français</h3>
                                    <h4 class="pt-2">NOM : {{ $site->name_fr }} </h4>
                                    <p class="text-dark p-t-20 pro-desc">
                                        {{ $site->description_fr }}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages8" role="tabpanel">
                                <div class="p-20 text-right" lang="ar" dir="rtl">
                                    <h3>وصف عربي</h3>
                                    <h4 class="pt-2"">اسم : {{ $site->name_ar }}</h4>
                                    <p class="text-dark p-t-20 pro-desc">
                                        {{ $site->description_ar }}
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
                                                class="{{ $site->status == 0 ? 'bg-success' : 'bg-danger' }} text-white rounded p-1">
                                                {{ $site->status == 0 ? 'active' : 'inactive' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Created at</td>
                                        <td>
                                            {{ $site->created_at }}
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Price</td>
                                        <td class="text-primary">{{ $site->price==0 ? 'Free' : $site->price .' MAD' }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Geolocation</td>
                                        <td> {{ $site->latitude }}  {{ $site->longitude }}</td>
                                    </tr>
                                    <tr>
                                        <td>Open time</td>
                                        <td>{{ $site->openTime }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="ti-map-alt"></i> Location</h5>
                        <iframe
                        src="https://maps.google.com/?q={{ $site->latitude }},{{ $site->longitude }}&output=embed"
                            width="100%" height="244" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="ti-gallery"></i> Gallery</h5>
                        @foreach ($site->media as $image)
                            @if ($image->type == 'image')
                                <img class="m-t-10 m-l-5"
                                    src="{{ asset('primary/assets/images/sites/media/images') }}/{{ $image->name }}"
                                    width="110px" height="110px">
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="ti-microphone"></i> Audio file</h5>
                        <div class="text-center">
                            
                            @foreach ($site->media as $audio)
                                @if ($audio->type == 'audio')
                                    <audio controls>
                                        <source
                                            src="{{ asset('primary/assets/images/sites/media/audios') }}/{{ $audio->name }}"
                                            type="audio/ogg">
                                        <source
                                            src="{{ asset('primary/assets/images/sites/media/audios') }}/{{ $audio->name }}"
                                            type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="ti-video-clapper"></i> Video file</h5>
                        <div class="text-center">
                            @foreach ($site->media as $video)
                                @if ($video->type == 'video')
                                    <video width="300" controls>
                                        <source
                                            src="{{ asset('primary/assets/images/sites/media/videos') }}/{{ $video->name }}"
                                            type="video/mp4">
                                        <source
                                            src="{{ asset('primary/assets/images/sites/media/videos') }}/{{ $video->name }}"
                                            type="video/ogg">
                                        Your browser does not support HTML video.
                                    </video>
                                @endif
                            @endforeach
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
