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
                                            <select id="sites" style="width: 100%" size="4"
                                                 data-placeholder="Choose" wire:ignore>
                                                @foreach ($sites->sortBy('name_en') as $site)
                                                    <option value="{{ $site->id }}">{{ $site->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Length :</label>
                                            <select style="width: 100%" size=4 
                                                data-placeholder="Choose" id="sites2"  wire:model="selectedSites2" wire:ignore>
                                                
                                            </select>
                                            <button class="btn btn-success" id="button1" wire:click.prevent="check"
                                                type="button">select all</button>
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
                                    <div class="custom-file mb-3 text-left">
                                        <input type="file" class="custom-file-input" id="videoupload"
                                            wire:model="videos" accept="video/*">
                                        <label class="custom-file-label form-control" for="videoupload">Choose
                                            file</label>
                                    </div>
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
@endpush

@push('scripts')
    <script>
        var index = 1;
        $("#sites").change(function() {
            var itemText = $('#sites option:selected').text();
            var itemVal = $('#sites option:selected').val();
            var option = new Option(itemText,itemVal);
            $("#sites2").append(option);
            $(this).find('option:selected').remove();
            $('#sites2').focus();
            index++;
        });

        $("#sites2 ").click(function() {
            var itemText = $('#sites2 option:selected').text();
            var itemVal = $('#sites2 option:selected').val();
            var option = new Option(itemText,itemVal);
            $("#sites").append(option);
            $(this).find('option:selected').remove();
            index++;
        });

        $('#button1').click(function(){
            $('#sites2').attr('multiple','multiple');
            $('#sites2').attr('disbaled');
        });



    </script>
@endpush
