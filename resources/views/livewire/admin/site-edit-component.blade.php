<div>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Manage Site</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-sites') }}">Sites</a></li>
                        <li class="breadcrumb-item active">Add Site</li>
                    </ol>

                </div>
            </div>
        </div>
        <div class="row">
            <form class="form-material" wire:submit.prevent="updateSite()">
                <div class="row">
                    <div class="col-8">

                        <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>


                            @endif
                            <div class="card-body">
                                <h4 class="card-title">General Info </h4>
                                <div class="row p-t-40 ">
                                    <a href="#"
                                    wire:click.prevent="changeStatus({{ $site->id }})"
                                    title="{{ $site->status == 0 ? 'turn off' : 'turn on' }}">
                                    <i class="fas {{ $site->status == 0 ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger' }} fa-2x"
                                        title=""></i>
                                </a>
                                </div>
                                <div class="row p-t-40">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="latitude">Site latitude </label>
                                            <input type="text" id="latitude" class="form-control"
                                                wire:model.lazy="latitude">
                                            @error('latitude')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="longitude">Site longitude </label>
                                            <input type="text" class="form-control" id="longitude"
                                                wire:model.lazy="longitude">
                                            @error('longitude')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for=""> </label>
                                            <button class="btn align-middle" id="btn-active-tab" wire:ignore
                                                type="button">
                                                <i id="flag" class="flag-icon flag-icon-gb fa-2x"></i>
                                            </button>
                                            @if ($errors->any())
                                                <a class="mytooltip" href="javascript:void(0)">
                                                    <div class="notify">
                                                        <span class="heartbit"
                                                            style="top:-23px;right:-17px;height:25px;height:25px;"></span>
                                                        <span class="point"
                                                            style="width:10px; height:10px; right:-10px; top:-14px"></span>
                                                        <span class="tooltip-content5">
                                                            <span class="tooltip-text3">
                                                                <span class="tooltip-inner2">
                                                                    Please check the other language fields as
                                                                    well<br /> Thank you.
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content tabcontent-border ">
                                    {{-- english Tab --}}
                                    <div class="tab-pane  active" id="englishTab" role="tabpanel" wire:ignore.self>
                                        <section>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name_en">Site name </label>
                                                        <input type="text" class="form-control" id="name_en"
                                                            wire:model.lazy="name_en">
                                                        @error('name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description_en">Site description </label>
                                                        <textarea id="description_en" rows="7" class="form-control" wire:model.lazy="description_en"></textarea>
                                                        @error('description_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                                    {{-- français Tab --}}
                                    <div class="tab-pane  " id="frenchTab" role="tabpanel" wire:ignore.self>
                                        <section>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name_fr">Nom repere </label>
                                                        <input type="text" class="form-control" id="name_fr"
                                                            wire:model.lazy="name_fr">
                                                        @error('name_fr')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description_fr">Repere Description
                                                            </label>
                                                        <textarea id="description_fr" rows="7" class="form-control" wire:model.lazy="description_fr"></textarea>
                                                        @error('description_fr')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                                    {{-- Arabic Tab --}}
                                    <div class="tab-pane " id="arabicTab" role="tabpanel" wire:ignore.self>
                                        <section class="text-right" dir="rtl" lang="ar">
                                            <div class="row ">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name_ar">اسم المعلم</label>
                                                        <input type="text" class="form-control" id="name_ar"
                                                            wire:model.lazy="name_ar">
                                                        @error('name_ar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description_ar">وصف معلم</label>
                                                        <textarea id="description_ar" rows="7" class="form-control" wire:model.lazy="description_ar"></textarea>
                                                        @error('description_ar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Additional info</h4>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price </label>
                                            <input type="text" class="form-control" id="price"
                                                wire:model.lazy="price">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_fr">Duration </label>
                                            <input type="text" class="form-control" id="duration"
                                                wire:model.lazy="duration">
                                            @error('duration')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="openTime">Open Time </label>
                                            <input type="time" class="form-control" id="openTime"
                                                wire:model.lazy="openTime">

                                            @error('openTime')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" wire:ignore>
                                            <label for="openTime">City </label>
                                            <select class="form-control custom-select" wire:model.lazy="city_id">
                                                <option>--Select your City--</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ $city->id == $city_id ? 'selected' : '' }}>
                                                        {{ $city->city_fr }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('openTime')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body text-center">

                                <button type="submit" class="btn btn-info" id="btn-submit"> <i
                                        class="fa fa-check"></i> Save</button>
                                <a href="{{ route('admin-sites') }}" class="btn btn-inverse">Cancel</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class=" ti-image"></i> Default Image Site</h4>
                                @if ($neWphoto)
                                    <img id="image-ville" src="{{ $neWphoto->temporaryUrl() }}"  style="border-radius: 15px" width="100%"
                                        height="90%">
                                @else
                                    <img id="image-ville"
                                        src="{{ asset('primary/assets/images/sites/') }}/{{ $photo }}"  style="border-radius: 15px" 
                                        width="100%" height="90%">
                                    @error('photo')
                                        {{ $message }}
                                    @enderror
                                @endif
                                <div wire:loading wire:target="photo">Uploading...</div>
                                <input type="file" id="uploadfile" class="custom-file-input"
                                    wire:model="neWphoto" accept="image/*">
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="ti-gallery"></i> Pictures</h4>
                                <div class="m-4 text-center">
                                    <div class="custom-file mb-3 text-left">
                                        <input type="file" class="custom-file-input" id="picturesupload"
                                            wire:model="neWimages" multiple accept="image/*">
                                        <label class="custom-file-label form-control" for="picturesupload">Choose
                                            file</label>
                                    </div>

                                    <div wire:loading wire:target="neWimages">Uploading...</div>
                                    @error('images.*')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="m-t-5 d-flex" >


                                    @foreach ($site->media->where('type', 'image') as $image)
                                      <div class="position-relative" >
                                      <a href=""   wire:click.prevent="deletePicture({{ $image->id }})">  <i class=" fa fa-trash position-absolute text-danger  "  style="right:10px; top:15px;font-size:20px" ></i></a>
                                        <img class="m-t-10 m-l-5"
                                        src="{{ asset('primary/assets/images/sites/media/images') }}/{{ $image->name }}"
                                        width="110px" height="100px">
                                      </div>
                                    @endforeach

                                    @if (count($neWimages) > 0)
                                        @foreach ($neWimages as $image)
                                            <img class="m-t-10 m-l-5" src="{{ $image->temporaryUrl() }}"
                                                width="110px" height="100px">
                                        @endforeach

                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="ti-microphone"></i> Audio</h4>
                                <div class="m-4 text-center">
                                    <div class="custom-file mb-3 text-left">
                                        <input type="file" id="audiosupload" class="custom-file-input"
                                            class="form-control" wire:model="neWaudios" multiple accept="audio/*">
                                        <label class="custom-file-label form-control" for="audiosupload">Choose
                                            file</label>
                                    </div>

                                    <div wire:loading wire:target="neWaudios">Uploading...</div>
                                    @error('audios.*')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="m-t-5 text-center">
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
                                    @if (count($neWaudios) > 0)
                                        @foreach ($neWaudios as $audio)
                                            <audio controls>
                                                <source src="{{ $audio->temporaryUrl() }}" type="audio/ogg">
                                                <source src="{{ $audio->temporaryUrl() }}" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>

                                        @endforeach

                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> <i class="ti-video-clapper"></i> Video</h4>
                                <div class="m-4 text-center">
                                    <div class="custom-file mb-3 text-left">
                                        <input type="file" id="videoupload" class="custom-file-input" wire:model="neWvideos" multiple
                                        accept="video/*">
                                       
                                        <label class="custom-file-label form-control" for="videoupload">Choose
                                            file</label>
                                    </div>
                                    
                                    <div wire:loading wire:target="neWvideos">Uploading...</div>
                                    @error('videos.*')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="m-t-5 text-center">
                                    @foreach ($site->media as $video)
                                    @if ($video->type == 'video')
                                    <video width="300" controls>
                                        <source src="{{ asset('primary/assets/images/sites/media/videos') }}/{{ $video->name }}" type="video/mp4">
                                        <source src="{{ asset('primary/assets/images/sites/media/videos') }}/{{ $video->name }}" type="video/ogg">
                                        Your browser does not support HTML video.
                                    </video>
                                    @endif
                                    @endforeach
                                    @if (count($neWvideos) > 0)
                                        @foreach ($neWvideos as $video)
                                        <video width="300" controls>
                                            <source src="{{ $video->temporaryUrl() }}" type="video/mp4">
                                            <source src="{{ $video->temporaryUrl() }}" type="video/ogg">
                                            Your browser does not support HTML video.
                                        </video>

                                        @endforeach

                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>



@push('styles')
    <link href="{{ asset('primary/dist/css/pages/stylish-tooltip.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            var langue = 0;
            $("#image-ville").click(function() {
                $('#uploadfile').click();
            });
            $('#btn-active-tab').click(function(e) {
                if (langue == 0) {

                    $('#flag').removeClass('flag-icon-gb');
                    $('#flag').addClass('flag-icon-fr');
                    $('#flag').attr('title', 'Français, click to change the to arabic');
                    $('#frenchTab').addClass('active');
                    $('#englishTab').removeClass('active');
                    $('#arabTab').removeClass('active');
                    langue = 1;
                } else if (langue == 1) {

                    $('#flag').removeClass('flag-icon-fr');
                    $('#flag').addClass('flag-icon-ma');
                    $('#flag').attr('title', 'Arabic, click to change the to english');
                    $('#frenchTab').removeClass('active');
                    $('#englishTab').removeClass('active');
                    $('#arabicTab').addClass('active');
                    langue = 2;
                } else {

                    $('#flag').removeClass('flag-icon-ma');
                    $('#flag').addClass('flag-icon-gb');
                    $('#flag').attr('title', 'English, click to change the to french');
                    $('#frenchTab').removeClass('active');
                    $('#englishTab').addClass('active');
                    $('#arabicTab').removeClass('active');
                    langue = 0;
                }
            });
        });
    </script>
@endpush
