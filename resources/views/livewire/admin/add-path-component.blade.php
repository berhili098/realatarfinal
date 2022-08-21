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
            <form class="form-material" wire:submit.prevent="store()">
                <div class="row">
                    <div class="col-8">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">General Info </h4>
                                <div class="row p-t-40">
                               
                                   
                                 
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
                                                        <label for="name_en">Path name :</label>
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
                                                        <label for="description_en">Path description :</label>
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
                                                        <label for="name_fr">Nom Parcours :</label>
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
                                                        <label for="description_fr">Description Parcours
                                                            :</label>
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
                                                        <label for="name_ar">اسم مسار</label>
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
                                                        <label for="description_ar">وصف مسار</label>
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
                                            <label for="price">Length :</label>
                                            <input type="text" class="form-control" id="length"
                                                wire:model.lazy="length">
                                            @error('length')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_fr">Duration :</label>
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
                                            <label for="price">Length :</label>
                                            <select style="width: 100%" multiple="multiple" wire:model="sites" data-placeholder="Choose">
                                              @foreach ($sites as $site )
                                                  
                                           
                                                    <option value="{{ $site->id }}">{{ $site->name_en }}</option>
                                                    @endforeach
                                               
                                          
                                            </select>
                                        
                                        </div>
                                    </div>
                                    @if($sites)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="myadmin-dd-empty dd" id="nestable2">
                                                
                                                <ol class="dd-list">
                                                    @foreach ($sites as $site)
                                                      <li class="dd-item dd3-item"   data-id="{{ $site->id }}  "> 
                                                            <div class="dd-handle dd3-handle"></div>
                                                            <div class="dd3-content"> {{ $site->name_en }}</div>
                                                        </li>
                                               
                                                    @endforeach
                                                </ol>
                                            </div>
                                       
                                        
                                        </div>
                                    </div>
                                   @endif
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
                                @if ($photo)
                                    <img id="image-ville" src="{{ $photo->temporaryUrl() }}" width="100%"
                                        height="90%">
                                @else
                                    <img id="image-ville"
                                        src="{{ asset('primary/assets/images/cities/No_Image_Available.jpg') }}"
                                        width="100%" height="90%">
                                    @error('photo')
                                        {{ $message }}
                                    @enderror
                                @endif
                                <div wire:loading wire:target="photo">Uploading...</div>
                                <input type="file" id="uploadfile" class="custom-file-input" wire:model="photo"
                                    accept="image/*">
                            </div>
                        </div>
                 

                 

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> <i class="ti-video-clapper"></i> Video</h4>
                                <div class="m-4 text-center">
                                    <input type="file" class="form-control" wire:model="videos"  accept="video/*">
                                    <div wire:loading wire:target="videos">Uploading...</div>
                                    @error('videos.*')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="m-t-5 text-center">
                                    @if ($videos)
                                      
                                                <video width="300" controls>
                                                    <source src="{{ $videos->temporaryUrl() }}" type="video/mp4">
                                                    <source src="{{ $videos->temporaryUrl() }}" type="video/ogg">
                                                    Your browser does not support HTML video.
                                                </video>
                                 
                                    @else
                                        <p class="text-muted m-2">No videos selected.</p>
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
