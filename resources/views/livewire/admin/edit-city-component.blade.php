<div>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Manage Cities</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-cities') }}">Cities</a></li>
                        <li class="breadcrumb-item active">Edit City</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Edit city</h4>
                    </div>
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
                        <form wire:submit.prevent="updateCity()">
                            <input type="hidden" wire:model="user_id">
                            <div class="form-body">
                                <h3 class="card-title">City info </h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-4 offset-md-1   text-center ">
                                        @if ($newphoto)
                                            <img id="image-ville" src="{{ $newphoto->temporaryUrl() }}" width="100%" height="90%">
                                        @else
                                            <img id="image-ville"
                                                src="{{ asset('primary/assets/images/cities/') }}/{{ $photo }}"
                                                width="100%" height="90%">
                                            @error('photo')
                                                {{ $message }}
                                            @enderror
                                        @endif
                                        <input type="file" id="uploadfile" class="custom-file-input" wire:model="newphoto">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="latitude">City latitude </label>
                                                    <input type="text" id="latitude" class="form-control"
                                                        wire:model.lazy="latitude">
                                                    @error('latitude')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="longitude">City longitude </label>
                                                    <input type="text" class="form-control" id="longitude"
                                                        wire:model.lazy="longitude">
                                                    @error('longitude')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group pt-2">
                                                    <label for=""> </label>
                                                    <button class="btn align-middle" id="btn-active-tab" wire:ignore type="button" >
                                                        <i id="flag" class="flag-icon flag-icon-gb fa-2x"></i>
                                                    </button>
                                                    @if($errors->any())
                                                            <a class="mytooltip" href="javascript:void(0)"> 
                                                                <div class="notify">
                                                                    <span class="heartbit" style="top:-23px;right:0px;height:25px;height:25px;"></span> 
                                                                    <span class="point" style="width:10px; height:10px; right:8px; top:-14px"></span>
                                                                    <span class="tooltip-content5">
                                                                        <span class="tooltip-text3">
                                                                            <span class="tooltip-inner2">
                                                                                Please check the other language fields as well<br /> Thank you.
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{-- english Tab --}}
                                        <div class="tab-content tabcontent-border ">
                                            <div class="tab-pane  active" id="englishTab" role="tabpanel" wire:ignore.self>
                                                <section>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="city_en">City name </label>
                                                                <input type="text" class="form-control" id="city_en"
                                                                    wire:model.lazy="city_en">
                                                                @error('city_en')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="description_en">City description </label>
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
                                                                <label for="city_fr">Nom ville </label>
                                                                <input type="text" class="form-control" id="city_fr"
                                                                    wire:model.lazy="city_fr">
                                                                @error('city_fr')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="description_fr">Ville Description </label>
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
                                                                <label for="city_ar">اسم المدينة</label>
                                                                <input type="text" class="form-control" id="city_ar"
                                                                    wire:model.lazy="city_ar">
                                                                @error('city_ar')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="description_ar">وصف المدينة</label>
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
                                    <div class="col-md-1">
    
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions float-right">
                                <button type="submit" class="btn btn-success" id="btn-submit"> <i
                                        class="fa fa-check"></i> Save</button>
                                <a href="{{ route('admin-cities') }}" class="btn btn-inverse">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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