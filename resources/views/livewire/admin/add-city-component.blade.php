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
                        <li class="breadcrumb-item"><a href="{{ route('admin-cities') }}">Cities</a> </li>
                        <li class="breadcrumb-item active">Add City</li>
                    </ol>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="storeCity()">
            <div class="row">
                <div class="col-lg-9">
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

                            <input type="hidden" wire:model.lazy="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-body">
                                <h3 class="card-title">City info</h3>
                                <hr>
                                <div class="row p-t-20">

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="latitude">City latitude</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="icon-location-pin"></i></span>
                                                        </div>
                                                        <input input type="text" id="latitude" class="form-control"
                                                            wire:model.lazy="latitude" placeholder="5.698069809">
                                                    </div>
                                                    @error('latitude')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="longitude">City longitude</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="icon-location-pin"></i></span>
                                                        </div>
                                                        <input input type="text" id="latitude" class="form-control"
                                                            id="longitude" wire:model.lazy="longitude"
                                                            placeholder="5.698069809">
                                                    </div>
                                                    @error('longitude')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group pt-2">
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
                                        {{-- english Tab --}}
                                        <div class="tab-content tabcontent-border ">
                                            <div class="tab-pane  active" id="englishTab" role="tabpanel"
                                                wire:ignore.self>
                                                <section>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="city_en">City name</label>
                                                                <input type="text" class="form-control"
                                                                    id="city_en" wire:model.lazy="city_en"
                                                                    placeholder="Enter name of the city ">
                                                                @error('city_en')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="description_en">City description</label>
                                                                <textarea id="description_en" rows="7" class="form-control" wire:model.lazy="description_en"
                                                                    placeholder="Enter city's description in english"></textarea>
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
                                                                <label for="city_fr">Nom ville</label>
                                                                <input type="text" class="form-control"
                                                                    id="city_fr" wire:model.lazy="city_fr"
                                                                    placeholder="Entrez le nom de la ville">
                                                                @error('city_fr')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="description_fr">Ville Description</label>
                                                                <textarea id="description_fr" rows="7" class="form-control" wire:model.lazy="description_fr"
                                                                    placeholder="Entrez la description de la ville en anglais "></textarea>
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
                                                                <input type="text" class="form-control"
                                                                    id="city_ar" wire:model.lazy="city_ar"
                                                                    placeholder="أدخل اسم المدينة">
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
                                                                <textarea id="description_ar" rows="7" class="form-control" wire:model.lazy="description_ar"
                                                                    placeholder="أدخل وصف المدينة باللغة العربية"></textarea>
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


                        </div>
                    </div>
                </div>
                    <div class=" col-3">


                        <div class="card">
                            <div class="card-body text-center">
                                <div class="row button-group">
                                    <div class="col-lg-6 col-md-4">
                                        <button class="btn waves-effect waves-light btn-block btn-success "><i
                                                class="fa fa-save"></i>
                                            Save</button>
                                    </div>
                                    <div class="col-lg-6 col-md-4">
                                        <a type="button" href="{{ route('admin-cities') }}"
                                            class="btn waves-effect waves-light btn-block btn-danger">Cancel</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">

                                <div class=" text-center ">
                                    @if ($photo)
                                        <img id="image-ville" src="{{ $photo->temporaryUrl() }}"
                                        style="border-radius: 15px;max-height:300px; max-width:259px;">
                                    @else
                                        <img id="image-ville"
                                            src="{{ asset('primary/assets/images/cities/No_Image_Available.jpg') }}"
                                            style="border-radius: 15px;max-height:300px; max-width:259px;">
                                        @error('photo')
                                            {{ $message }}
                                        @enderror
                                    @endif
                                    <input type="file" id="uploadfile" class="custom-file-input d-none" wire:model="photo"
                                        accept="image/*">
                                </div>
                            </div>
                        </div>


                    </div>
            </div>
        </form>
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
