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
                        <li class="breadcrumb-item active">Show Quiz</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-white">
                        <h3 class="m-b-0 ">Show Quiz</h6>
                            <hr>
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
                        <div class="tab-content tabcontent-border px-5">
                            <div class="tab-pane  active" id="home8" role="tabpanel">
                                <div class="p-20">
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="city_en">Question</label>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        class="form-control" id="question_en" wire:model="question_en"
                                                        placeholder="Enter question here "><br>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="reponse1_en">Answer 1</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <div class="custom-control custom-radio">
                                                                <input disabled type="radio" id="reponse1_en"
                                                                    value="1"
                                                                    name="correcte_en"class="custom-control-input"
                                                                    wire:model="correcte_en" disabled>
                                                                <label class="custom-control-label"
                                                                    for="reponse1_en"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        class="form-control" placeholder="Enter answer 1  here "
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
                                                                <input disabled type="radio" id="reponse2_en"
                                                                    value="2"
                                                                    name="correcte_en"class="custom-control-input"
                                                                    wire:model="correcte_en">
                                                                <label class="custom-control-label"
                                                                    for="reponse2_en"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        placeholder="Enter answer 2  here " wire:model="reponse2_en"
                                                        class="form-control" aria-label="Text input with radio button">

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
                                                                <input disabled type="radio" id="reponse3_en"
                                                                    value="3"
                                                                    name="correcte_en"class="custom-control-input"
                                                                    wire:model="correcte_en">
                                                                <label class="custom-control-label"
                                                                    for="reponse3_en"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        class="form-control" placeholder="Enter answer 3  here "
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
                                                                <input disabled type="radio" id="reponse4_en"
                                                                    value="4"
                                                                    name="correcte_en"class="custom-control-input"
                                                                    wire:model="correcte_en">
                                                                <label class="custom-control-label"
                                                                    for="reponse4_en"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        placeholder="Enter answer 4  here " wire:model="reponse4_en"
                                                        class="form-control"
                                                        aria-label="Text input with radio button">

                                                </div>
                                            </div>
                                        </div>

                                    </section>

                                </div>
                            </div>
                            <div class="tab-pane" id="profile8" role="tabpanel">
                                <div class="p-20">

                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="city_en">Question</label>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        class="form-control" id="question_fr"
                                                        wire:model="question_fr"
                                                        placeholder="Entrez la question ici ">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="reponse1_fr">Reponse 1</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <div class="custom-control custom-radio">
                                                                <input disabled type="radio" id="correcte_fr"
                                                                    value="1"
                                                                    name="correcte_fr"class="custom-control-input"
                                                                    wire:model="correcte_fr">
                                                                <label class="custom-control-label"
                                                                    for="correcte_fr"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        class="form-control" placeholder="Entrez la reponse 1 ici "
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
                                                                <input disabled type="radio" id="reponse2_fr"
                                                                    value="2"
                                                                    name="correcte_fr"class="custom-control-input"
                                                                    wire:model="correcte_fr">
                                                                <label class="custom-control-label"
                                                                    for="reponse2_fr"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
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
                                                                <input disabled type="radio" id="reponse3_fr"
                                                                    value="3"
                                                                    name="correcte_fr"class="custom-control-input"
                                                                    wire:model="correcte_fr">
                                                                <label class="custom-control-label"
                                                                    for="reponse3_fr"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        class="form-control" placeholder="Entrez la reponse 3 ici "
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
                                                                <input disabled type="radio" id="reponse4_fr"
                                                                    value="4"
                                                                    name="correcte_fr"class="custom-control-input"
                                                                    wire:model="correcte_fr">
                                                                <label class="custom-control-label"
                                                                    for="reponse4_fr"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        placeholder="Entrez la reponse 4 ici  "
                                                        wire:model="reponse4_fr" class="form-control"
                                                        aria-label="Text input with radio button">

                                                </div>
                                            </div>
                                        </div>

                                    </section>

                                </div>
                            </div>
                            <div class="tab-pane" id="messages8" role="tabpanel">
                                <div lang="ar">
                                    <section lang="ar" class="pt-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="city_ar"> السؤال </label>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        class="form-control" id="question_ar"
                                                        wire:model="question_ar" placeholder="أدخل  السؤال هنا">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="reponse1_ar">الجواب 1</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <div class="custom-control custom-radio">
                                                                <input disabled type="radio" id="correcte_ar"
                                                                    name="correcte_ar" class="custom-control-input"
                                                                    value="1" wire:model="correcte_ar">
                                                                <label class="custom-control-label"
                                                                    for="correcte_ar"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        class="form-control" placeholder="أدخل  الجواب 1 هنا"
                                                        wire:model="reponse1_ar"
                                                        aria-label="Text input with radio button">


                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <label for="reponse2_en">الجواب 2</label>
                                                <div class="input-group">

                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <div class="custom-control custom-radio">
                                                                <input disabled type="radio" id="correcte2_ar"
                                                                    name="correcte_ar" class="custom-control-input"
                                                                    value="2" wire:model="correcte_ar">
                                                                <label class="custom-control-label"
                                                                    for="correcte2_ar"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        placeholder="أدخل  الجواب 2 هنا" wire:model="reponse2_ar"
                                                        class="form-control"
                                                        aria-label="Text input with radio button">

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="reponse3_en">الجواب 3</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <div class="custom-control custom-radio">
                                                                <input disabled type="radio" id="correcte3_ar"
                                                                    name="correcte_ar" class="custom-control-input"
                                                                    value="3" wire:model="correcte_ar">
                                                                <label class="custom-control-label"
                                                                    for="correcte3_ar"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        class="form-control" placeholder="أدخل  الجواب 3 هنا"
                                                        wire:model="reponse3_ar"
                                                        aria-label="Text input with radio button">


                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <label for="reponse4_en">الجواب 4</label>
                                                <div class="input-group">

                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <div class="custom-control custom-radio">
                                                                <input disabled type="radio" id="correcte4_ar"
                                                                    name="correcte_ar" class="custom-control-input"
                                                                    value="4" wire:model="correcte_ar">
                                                                <label class="custom-control-label"
                                                                    for="correcte4_ar"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input onfocus="this.blur();" tabindex="-1" type="text"
                                                        placeholder="أدخل  الجواب 4 هنا" wire:model="reponse4_ar"
                                                        class="form-control"
                                                        aria-label="Text input with radio button">

                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class=" col-lg-3">
                <div class="card" >
                    <div class="card-body text-center" style="min-height: 455px">

                        <img src="{{ asset('primary/assets/images/clockk.png') }}" style=" max-height:263px"
                            alt="">


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
