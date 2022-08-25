@push('styles')
    <link href="{{ asset('primary/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" />
@endpush


<div>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Manage Quizzes</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-quiz') }}">Quizzes</a> </li>
                        <li class="breadcrumb-item active">Add Quiz</li>
                    </ol>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="storeQuiz()">
            <div class="row">
                <div class="col-lg-8">
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
                            <div class="row">
                                <div class="form-body col-12">
                                    <h3 class="card-title">Quiz info</h3>
                                    <hr>
                                    <div class="row p-t-20">


                                        <div class="col-md-12 px-5">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 mt-3">
                                                    <div class="form-group has-info">
                                                        <label for="sites33"> Choose one site</label>
                                                        <select class="form-control custom-select "
                                                            wire:model="site_id">
                                                            <option class="text-center" value="" selected>choose
                                                                one site
                                                            </option>

                                                            @foreach ($sites->sortByDesc('created_at') as $site)
                                                                <option class="text-center" value="{{ $site->id }}">
                                                                    {{ $site->name_en }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>



                                                {{-- <div class="col-md-1">
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
                                                                                Please check the other language fields
                                                                                as well<br /> Thank you.
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div> --}}
                                                <div id='enquest' class="col-sm-6 col-md-6 mt-3">
                                                    <div class="form-group text-right" class="text-right" wire:ignore >
                                                        <label id='label_en' for=""> Question</label>
                                                        <label id="label_fr" for=""> Question</label>
                                                        <label id="label_ar" for="city_ar" > السؤال </label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="question_en"
                                                                wire:model="question_en"
                                                                placeholder="Enter question here ">
                                                            <input type="text" class="form-control" id="question_fr"
                                                                wire:model="question_fr"
                                                                placeholder="Entrez la question ici ">
                                                            <input type="text" class="form-control text-right" id="question_ar"
                                                                wire:model="question_ar" placeholder="أدخل  السؤال هنا">
                                                            <div class="input-group-append">
                                                                <a style="border-color: grey" id="btn-active-tab"
                                                                    wire:ignore type="button"> <i id="flag"
                                                                        class="flag-icon flag-icon-gb "
                                                                        style="border-radius:0 5px 5px  0; font-size:38px"></i></a>
                                                            </div>

                                                        </div>
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
                                                                                Please check the other language fields
                                                                                as well<br /> Thank you.
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
                                                            <div class="col-md-6">
                                                                <label for="reponse1_en">Answer 1</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="reponse1_en"
                                                                                    value="1"
                                                                                    name="correcte_en"class="custom-control-input"
                                                                                    wire:model="correcte_en">
                                                                                <label class="custom-control-label"
                                                                                    for="reponse1_en"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter answer 1  here "
                                                                        wire:model="reponse1_en"
                                                                        aria-label="Text input with radio button"><br>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="reponse2_en">Answer 2</label>
                                                                <div class="input-group">

                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="reponse2_en"
                                                                                    value="2"
                                                                                    name="correcte_en"class="custom-control-input"
                                                                                    wire:model="correcte_en">
                                                                                <label class="custom-control-label"
                                                                                    for="reponse2_en"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"
                                                                        placeholder="Enter answer 2  here "
                                                                        wire:model="reponse2_en" class="form-control"
                                                                        aria-label="Text input with radio button">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="reponse3_en">Answer 3</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="reponse3_en"
                                                                                    value="3"
                                                                                    name="correcte_en"class="custom-control-input"
                                                                                    wire:model="correcte_en">
                                                                                <label class="custom-control-label"
                                                                                    for="reponse3_en"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter answer 3  here "
                                                                        wire:model="reponse3_en"
                                                                        aria-label="Text input with radio button">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="reponse4_en">Answer 4</label>
                                                                <div class="input-group">

                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="reponse4_en"
                                                                                    value="4"
                                                                                    name="correcte_en"class="custom-control-input"
                                                                                    wire:model="correcte_en">
                                                                                <label class="custom-control-label"
                                                                                    for="reponse4_en"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"
                                                                        placeholder="Enter answer 4  here "
                                                                        wire:model="reponse4_en" class="form-control"
                                                                        aria-label="Text input with radio button">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                                {{-- français Tab --}}
                                                <div class="tab-pane  " id="frenchTab" role="tabpanel"
                                                    wire:ignore.self>
                                                    <section>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="reponse1_fr">Reponse 1</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="correcte_fr"
                                                                                    value="1"
                                                                                    name="correcte_fr"class="custom-control-input"
                                                                                    wire:model="correcte_fr">
                                                                                <label class="custom-control-label"
                                                                                    for="correcte_fr"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Entrez la reponse 1 ici "
                                                                        wire:model="reponse1_fr"
                                                                        aria-label="Text input with radio button">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="reponse2_fr">Reponse 2</label>
                                                                <div class="input-group">

                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="reponse2_fr"
                                                                                    value="2"
                                                                                    name="correcte_fr"class="custom-control-input"
                                                                                    wire:model="correcte_fr">
                                                                                <label class="custom-control-label"
                                                                                    for="reponse2_fr"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"
                                                                        placeholder="Entrez la reponse 2 ici  "
                                                                        wire:model="reponse2_fr" class="form-control"
                                                                        aria-label="Text input with radio button">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="reponse3_fr">Reponse 3</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="reponse3_fr"
                                                                                    value="3"
                                                                                    name="correcte_fr"class="custom-control-input"
                                                                                    wire:model="correcte_fr">
                                                                                <label class="custom-control-label"
                                                                                    for="reponse3_fr"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Entrez la reponse 3 ici "
                                                                        wire:model="reponse3_fr"
                                                                        aria-label="Text input with radio button">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="reponse4_fr">Reponse 4</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="reponse4_fr"
                                                                                    value="4"
                                                                                    name="correcte_fr"class="custom-control-input"
                                                                                    wire:model="correcte_fr">
                                                                                <label class="custom-control-label"
                                                                                    for="reponse4_fr"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text"
                                                                        placeholder="Entrez la reponse 4 ici  "
                                                                        wire:model="reponse4_fr" class="form-control"
                                                                        aria-label="Text input with radio button">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </section>
                                                </div>

                                                {{-- Arabic Tab --}}
                                                <div class="tab-pane " id="arabicTab" role="tabpanel"
                                                    wire:ignore.self>
                                                    <section lang="ar" class="text-right">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="reponse1_ar">الجواب 1</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control text-right"  placeholder="أدخل  الجواب 1 هنا" wire:model="reponse1_ar"
                                                                        aria-label="Text input with radio button">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="correcte_ar"
                                                                                    name="correcte_ar"
                                                                                    class="custom-control-input "
                                                                                    value="1"
                                                                                    wire:model="correcte_ar">
                                                                                <label class="custom-control-label"
                                                                                    for="correcte_ar"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>


                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="reponse2_en">الجواب 2</label>
                                                                <div class="input-group">
                                                                    <input type="text"
                                                                        placeholder="أدخل  الجواب 2 هنا"
                                                                        wire:model="reponse2_ar" class="form-control text-right"
                                                                        aria-label="Text input with radio button">

                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio"
                                                                                    id="correcte2_ar"
                                                                                    name="correcte_ar"
                                                                                    class="custom-control-input"
                                                                                    value="2"
                                                                                    wire:model="correcte_ar">
                                                                                <label class="custom-control-label"
                                                                                    for="correcte2_ar"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="reponse3_en">الجواب 3</label>
                                                                
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control text-right"
                                                                        placeholder="أدخل  الجواب 3 هنا"
                                                                        wire:model="reponse3_ar"
                                                                        aria-label="Text input with radio button">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio"
                                                                                    id="correcte3_ar"
                                                                                    name="correcte_ar"
                                                                                    class="custom-control-input"
                                                                                    value="3"
                                                                                    wire:model="correcte_ar">
                                                                                <label class="custom-control-label"
                                                                                    for="correcte3_ar"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    


                                                                </div>


                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="reponse4_en">الجواب 4</label>
                                                                
                                                                <div class="input-group">
                                                                    <input type="text"
                                                                        placeholder="أدخل  الجواب 4 هنا"
                                                                        wire:model="reponse4_ar" class="form-control text-right"
                                                                        aria-label="Text input with radio button">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio"
                                                                                    id="correcte4_ar"
                                                                                    name="correcte_ar"
                                                                                    class="custom-control-input"
                                                                                    value="4"
                                                                                    wire:model="correcte_ar">
                                                                                <label class="custom-control-label"
                                                                                    for="correcte4_ar"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    

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
                            <br>


                        </div>
                    </div>

                </div>
                <div class=" col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="row button-group">
                                <div class="col-lg-6 col-md-4">
                                    <button class="btn waves-effect waves-light btn-block btn-success "><i
                                            class="fa fa-save"></i> Save</button>
                                </div>
                                <div class="col-lg-6 col-md-4">
                                    <a type="button" href="{{ route('admin-cities') }}"
                                        class="btn waves-effect waves-light btn-block btn-danger">Cancel</a>
                                </div>
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
            $('#question_fr').hide();
            $('#question_ar').hide();
            $('#label_fr').hide();
            $('#label_ar').hide();
            $('#btn-active-tab').click(function(e) {
                if (langue == 0) {
                    $('#question_fr').show();
                    $('#question_en').hide();
                    $('#label_fr').show();
                    $('#label_en').hide();
                    $('#flag').removeClass('flag-icon-gb');
                    $('#flag').addClass('flag-icon-fr');
                    $('#flag').attr('title', 'Français, click to change the to arabic');
                    $('#frenchTab').addClass('active');
                    $('#englishTab').removeClass('active');
                    $('#arabTab').removeClass('active');
                    langue = 1;
                } else if (langue == 1) {
                    $('#question_ar').show();
                    $('#question_fr').hide();
                    $('#label_ar').show();
                    $('#label_fr').hide();
                    $('#flag').removeClass('flag-icon-fr');
                    $('#flag').addClass('flag-icon-ma');
                    $('#flag').attr('title', 'Arabic, click to change the to english');
                    $('#frenchTab').removeClass('active');
                    $('#englishTab').removeClass('active');
                    $('#arabicTab').addClass('active');
                    langue = 2;
                } else {
                    $('#question_en').show();
                    $('#question_ar').hide();
                    $('#label_en').show();
                    $('#label_ar').hide();
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
