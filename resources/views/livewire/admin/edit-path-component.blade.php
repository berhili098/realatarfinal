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
            <form class="form-material">
                <div class="row">
                    <div class="col-8">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">General Info </h4>



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
                                <div class="row p-t-40 d-none">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""> </label>
                                            <button class="btn align-middle" id="btn-active-tab" wire:ignore
                                                type="button">
                                                <i id="flag" class="flag-icon flag-icon-gb fa-2x"></i>
                                            </button>

                                        </div>
                                    </div>
                                </div>
<br>
<br>    
                                <div class="tab-content tabcontent-border ">
                                    {{-- english Tab --}}
                                    <div class="tab-pane  active" id="englishTab" role="tabpanel" wire:ignore.self>
                                        <section>
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <div class="form-group">
                                                        <label for="name_en">Path name </label>
                                                        <input type="text" class="form-control" id="name_en"
                                                            wire:model.lazy="name_en">
                                                        @error('name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-1">
                                                    <div class="form-group text-right">
                                                        <label for=""> </label>
                                                        <button class="btn align-middle" id="faker" wire:ignore
                                                            type="button">
                                                            <i class="flag-icon flag-icon-gb fa-2x"></i>
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description_en">Path description </label>
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
                                                <div class="col-md-11">
                                                    <div class="form-group">
                                                        <label for="name_fr">Nom Parcours </label>
                                                        <input type="text" class="form-control" id="name_fr"
                                                            wire:model.lazy="name_fr">
                                                        @error('name_fr')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group text-right">
                                                        <label for=""> </label>
                                                        <button class="btn align-middle" id="faker2" wire:ignore
                                                            type="button">
                                                            <i class="flag-icon flag-icon-fr fa-2x"></i>
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description_fr">Description Parcours
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
                                    <div class="tab-pane  " id="arabicTab" role="tabpanel" wire:ignore.self>
                                        <section class="text-right" dir="rtl" lang="ar">
                                            <div class="row ">
                                                <div class="col-md-11">
                                                    <div class="form-group">
                                                        <label for="name_ar">اسم مسار</label>
                                                        <input type="text" class="form-control" id="name_ar"
                                                            wire:model.lazy="name_ar">
                                                        @error('name_ar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group text-left">
                                                        <label for=""> </label>
                                                        <button class="btn align-middle" id="faker3" wire:ignore
                                                            type="button">
                                                            <i class="flag-icon flag-icon-ma fa-2x"></i>
                                                        </button>

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
                                            <label for="price">Length </label>
                                            <input type="text" class="form-control" id="length"
                                                wire:model.lazy="length">
                                            @error('length')
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
                                            <label for="sites">All sites</label>
                                            <select class="form-control" id="sites" style="width: 100%" size="4" wire:ignore>
                                                @foreach ($sites->sortBy('name_en') as $site)
                                                    <option value="{{ $site->id }}">{{ $site->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sites2">Selected Sites</label>
                                            <select class="form-control" id="sites2" style="width: 100%" size="4" multiple
                                                wire:change="change" wire:ignore>
                                                @foreach ($selectedSites2 as $key => $site)
                                                    <option value="{{ $site }}"> {{ $key + 1 }} -
                                                        {{ $sites->where('id', $site)->first()['name_en'] }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="row button-group">
                                    <div class="col-lg-6 col-md-4">
                                        <button
                                            id="btn-submit"class="btn waves-effect waves-light btn-block btn-success"><i
                                                class="fa fa-save"></i> Save</button>
                                    </div>
                                    <div class="col-lg-6 col-md-4">
                                        <a type="button" href="{{ route('admin-path') }}"
                                            class="btn waves-effect waves-light btn-block btn-danger">Cancel</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class=" ti-image"></i> Default Image Site</h4>
                                @if ($newphoto)
                                    <img id="image-ville" src="{{ $newphoto->temporaryUrl() }}" width="100%"
                                        style="border-radius: 15px" height="90%">
                                @elseif ($photo)
                                    <img id="image-ville" src="{{ asset('primary/assets/images/paths/' . $photo) }}"
                                        width="100%" style="border-radius: 15px" height="90%">
                                @else
                                    <img id="image-ville"
                                        src="{{ asset('primary/assets/images/cities/No_Image_Available.jpg') }}"
                                        style="border-radius: 15px" width="100%" height="90%">
                                    @error('photo')
                                        {{ $message }}
                                    @enderror
                                @endif
                                <div wire:loading wire:target="newphoto">Uploading...</div>
                                <input type="file" id="uploadfile" class="custom-file-input"
                                    wire:model="newphoto" accept="image/*">
                            </div>
                        </div>




                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> <i class="ti-video-clapper"></i> Video</h4>

                                <div class="m-4 text-center">
                                    <div class="custom-file mb-3 text-left">
                                        <input type="file" class="custom-file-input" id="videoupload"
                                            wire:model="newvideo" accept="video/*">
                                        <label class="custom-file-label form-control" for="videoupload">Choose
                                            file</label>
                                    </div>
                                    <div wire:loading wire:target="newvideo">Uploading...</div>
                                    @error('videos.*')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="m-t-5 text-center">

                                    @if ($newvideo)
                                        <div wire:ignore>
                                            <video width="100%" height="100%" controls>
                                                <source src="{{ $newvideo->temporaryUrl() }}" type="video/mp4">
                                                <source src="{{ $newvideo->temporaryUrl() }}" type="video/ogg">
                                            </video>
                                        </div>
                                    @endif


                                    <div id="videot" wire:ignore>
                                        <video width="100%" height="100%" controls>
                                            <source src="{{ asset('primary/assets/images/paths/' . $video) }}"
                                                type="video/mp4">
                                            <source src="{{ asset('primary/assets/images/paths/' . $video) }}"
                                                type="video/ogg">
                                        </video>
                                    </div>







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
        $(document).ready(function() {
            $('#faker').click(function() {
                $('#btn-active-tab').click();
            });
            $('#faker2').click(function() {
                $('#btn-active-tab').click();
            });
            $('#faker3').click(function() {
                $('#btn-active-tab').click();
            });
            $('#videoupload').on('change', function() {
                $('#videot').hide();
            });

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
    <script>
        $("#sites").dblclick(function() {
            var index = 1;
            var itemText = $('#sites option:selected').text();
            var itemVal = $('#sites option:selected').val();
            var option = new Option(itemText, itemVal);
            $("#sites2").append(option);
            $(this).find('option:selected').remove();
            $('#sites2').focus();
            $('#sites2 option').each(function(e) {
                this.text = index + " - " + this.text.split(' -').pop();
                index++;
            });
        });

        $("#sites2").dblclick(function(e) {
            var itemText = $('#sites2 option:selected').text().split('- ').pop();
            var itemVal = $('#sites2 option:selected').val();
            var option = new Option(itemText, itemVal);
            $("#sites").append(option);
            $(this).find('option:selected').remove();
            var index = 1;
            $('#sites2 option').each(function(e) {
                this.text = index + " - " + this.text.split(' -').pop();
                index++;
            });
        });

        $("#btn-submit").click(function(event) {
            event.preventDefault();

            var test = [];

            $('#sites2 option').each(function(e) {
                test.push($(this).val());

            });
            console.log(test);

            Livewire.emit('store', test);
        });
    </script>
@endpush
