<div>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Quizzes</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Quizzes</li>
                    </ol>
                    <a type="button" href="{{ route('admin-addquiz') }}"
                        class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
                        Create New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left pt-2 pb-2">
                            <h5 class="card-title float-start">QUIZZES OVERVIEW</h5>
                        </div>
                        <div class="float-right pt-2 pb-2">
                            <div class="input-group">
                                <input type="text" wire:model.debounce.500ms="search" class="form-control"
                                    placeholder="search..." aria-label="search" aria-describedby="basic-addon11">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon11"><i class="ti-search"></i></span>
                                </div>
                            </div>
                            <span
                                class="{{ count($countsrecord) == 0 ? 'text-danger pl-1' : 'text-success pl-1' }}">{{ count($countsrecord) }}
                                record(s).</span>

                        </div>
                        <div class="table-responsive">
                            @if (count($quizzes) == 0)
                                <div class="text-center">
                                    <p class="text-danger">0 record found.</p>
                                    <a href="{{ route('admin-addquiz') }}" class="btn btn-info btn-circle">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            @else
                                <table class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>Question</th>
                                            <th class="text-center">Answers</th>
                                            <th>Repere</th>
                                            <th>Created by</th>
                                            <th>Created at</th>
                                            <th class="text-center">Status</th>
                                            <th style="width: 10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quizzes as $quiz)
                                            <tr class="data-vertical ">
                                                <td>{{ $quiz->question_en }}</td>
                                                <td class="text-center  ">
                                                    <a id="answersmodal" data-toggle="modal"
                                                        data-target="#show-answer-modal" href="#"
                                                        wire:click.prevent="getAnswer({{ $quiz->id }})"
                                                        class="text-info ">
                                                        <i class="ti-bookmark-alt fa-customized "
                                                            title="show correct answer"></i>
                                                    </a>
                                                </td>
                                                <td><a
                                                        href="{{ route('admin-showsite', $quiz->site->id) }}">{{ $quiz->site->name_en }}</a>
                                                </td>
                                                <td>{{ $quiz->user->name }}</td>
                                                <td>{{ $quiz->created_at->format('Y-m-d') }}</td>
                                                <td class="text-center ">
                                                    <a href="#"
                                                        wire:click.prevent="changeStatus({{ $quiz->id }})">
                                                        <i class=" fas   {{ $quiz->status == 0 ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger' }} fa-customized"
                                                            title="{{ $quiz->status == 0 ? 'turn off' : 'turn on' }}"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin-editquiz', $quiz->id) }}"
                                                        class="text-dark " data-toggle="tooltip" title="Edit">
                                                        <i class="ti-marker-alt fa-customized"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#delete-confirmation-modal" class="text-dark"
                                                        title="Delete" data-toggle="tooltip"
                                                        wire:click.prevent="confirmDelete({{ $quiz->id }})">
                                                        <i class="ti-trash fa-customized"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $quizzes->links('livewire-pagination') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self id="delete-confirmation-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-info"><i class="fa fa-exclamation-circle"></i> Delete confirmation</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        Are you sure you wanna delete all the record for the quiz
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light"
                        wire:click.prevent="deleteQuiz()">confrim</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self id="show-answer-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-info">Quiz info</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div id="modalnon2" class=" text-center modal-body">
                    <div class="spinner-grow text-success " role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div id="modalnon" class=" d-none modal-body">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home8" role="tab">
                                            <span> <i id="flag" class="flag-icon flag-icon-gb fa-2x"></i></span>
                                        </a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile8"
                                            role="tab"><span><i id="flag"
                                                    class="flag-icon flag-icon-fr fa-2x"></i></span></a> </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages8"role="tab">
                                            <span><i id="flag" class="flag-icon flag-icon-ma fa-2x"></i></span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tabcontent-border px-5">
                                    <div class="tab-pane  active" id="home8" role="tabpanel">
                                        <div class="p-20">
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="city_en">Question</label>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control" id="question_en"
                                                                wire:model="question_en"
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
                                                                        <input disabled type="radio"
                                                                            id="reponse1_en" value="1"
                                                                            name="correcte_en"class="custom-control-input"
                                                                            wire:model="correcte_en" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="reponse1_en"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control"
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
                                                                        <input disabled type="radio"
                                                                            id="reponse2_en" value="2"
                                                                            name="correcte_en"class="custom-control-input"
                                                                            wire:model="correcte_en">
                                                                        <label class="custom-control-label"
                                                                            for="reponse2_en"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" placeholder="Enter answer 2  here "
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
                                                                        <input disabled type="radio"
                                                                            id="reponse3_en" value="3"
                                                                            name="correcte_en"class="custom-control-input"
                                                                            wire:model="correcte_en">
                                                                        <label class="custom-control-label"
                                                                            for="reponse3_en"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control"
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
                                                                        <input disabled type="radio"
                                                                            id="reponse4_en" value="4"
                                                                            name="correcte_en"class="custom-control-input"
                                                                            wire:model="correcte_en">
                                                                        <label class="custom-control-label"
                                                                            for="reponse4_en"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" placeholder="Enter answer 4  here "
                                                                wire:model="reponse4_en" class="form-control"
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
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control" id="question_fr"
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
                                                                        <input disabled type="radio"
                                                                            id="correcte_fr" value="1"
                                                                            name="correcte_fr"class="custom-control-input"
                                                                            wire:model="correcte_fr">
                                                                        <label class="custom-control-label"
                                                                            for="correcte_fr"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control"
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
                                                                        <input disabled type="radio"
                                                                            id="reponse2_fr" value="2"
                                                                            name="correcte_fr"class="custom-control-input"
                                                                            wire:model="correcte_fr">
                                                                        <label class="custom-control-label"
                                                                            for="reponse2_fr"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" placeholder="Entrez la reponse 2 ici  "
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
                                                                        <input disabled type="radio"
                                                                            id="reponse3_fr" value="3"
                                                                            name="correcte_fr"class="custom-control-input"
                                                                            wire:model="correcte_fr">
                                                                        <label class="custom-control-label"
                                                                            for="reponse3_fr"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control"
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
                                                                        <input disabled type="radio"
                                                                            id="reponse4_fr" value="4"
                                                                            name="correcte_fr"class="custom-control-input"
                                                                            wire:model="correcte_fr">
                                                                        <label class="custom-control-label"
                                                                            for="reponse4_fr"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" placeholder="Entrez la reponse 4 ici  "
                                                                wire:model="reponse4_fr" class="form-control"
                                                                aria-label="Text input with radio button">

                                                        </div>
                                                    </div>
                                                </div>

                                            </section>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="messages8" role="tabpanel">
                                        <div  class="p-20" lang="ar">
                                            <section lang="ar" class="pt-2">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="city_ar"> السؤال </label>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control" id="question_ar"
                                                                wire:model="question_ar"
                                                                placeholder="أدخل  السؤال هنا">

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
                                                                        <input disabled type="radio"
                                                                            id="correcte_ar" name="correcte_ar"
                                                                            class="custom-control-input"
                                                                            value="1" wire:model="correcte_ar">
                                                                        <label class="custom-control-label"
                                                                            for="correcte_ar"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control"
                                                                placeholder="أدخل  الجواب 1 هنا"
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
                                                                        <input disabled type="radio"
                                                                            id="correcte2_ar" name="correcte_ar"
                                                                            class="custom-control-input"
                                                                            value="2" wire:model="correcte_ar">
                                                                        <label class="custom-control-label"
                                                                            for="correcte2_ar"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" placeholder="أدخل  الجواب 2 هنا"
                                                                wire:model="reponse2_ar" class="form-control"
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
                                                                        <input disabled type="radio"
                                                                            id="correcte3_ar" name="correcte_ar"
                                                                            class="custom-control-input"
                                                                            value="3" wire:model="correcte_ar">
                                                                        <label class="custom-control-label"
                                                                            for="correcte3_ar"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control"
                                                                placeholder="أدخل  الجواب 3 هنا"
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
                                                                        <input disabled type="radio"
                                                                            id="correcte4_ar" name="correcte_ar"
                                                                            class="custom-control-input"
                                                                            value="4" wire:model="correcte_ar">
                                                                        <label class="custom-control-label"
                                                                            for="correcte4_ar"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" placeholder="أدخل  الجواب 4 هنا"
                                                                wire:model="reponse4_ar" class="form-control"
                                                                aria-label="Text input with radio button">

                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="vtabs">
                                    <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home9"
                                                role="tab">
                                                <span><i id="flag" class="flag-icon flag-icon-gb "></i></span>
                                            </a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile9"
                                                role="tab"><span><i id="flag"
                                                    class="flag-icon flag-icon-fr "></i></span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab"
                                                href="#messages9" role="tab"><span><i id="flag" class="flag-icon flag-icon-ma"></i></span></a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home9" role="tabpanel">
                                            <div class="p-20">
                                                <section>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="city_en">Question</label>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" class="form-control"
                                                                    id="question_en" wire:model="question_en"
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
                                                                            <input disabled type="radio"
                                                                                id="reponse1_en" value="1"
                                                                                name="correcte_en"class="custom-control-input"
                                                                                wire:model="correcte_en" disabled>
                                                                            <label class="custom-control-label"
                                                                                for="reponse1_en"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" class="form-control"
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
                                                                            <input disabled type="radio"
                                                                                id="reponse2_en" value="2"
                                                                                name="correcte_en"class="custom-control-input"
                                                                                wire:model="correcte_en">
                                                                            <label class="custom-control-label"
                                                                                for="reponse2_en"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" placeholder="Enter answer 2  here "
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
                                                                            <input disabled type="radio"
                                                                                id="reponse3_en" value="3"
                                                                                name="correcte_en"class="custom-control-input"
                                                                                wire:model="correcte_en">
                                                                            <label class="custom-control-label"
                                                                                for="reponse3_en"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" class="form-control"
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
                                                                            <input disabled type="radio"
                                                                                id="reponse4_en" value="4"
                                                                                name="correcte_en"class="custom-control-input"
                                                                                wire:model="correcte_en">
                                                                            <label class="custom-control-label"
                                                                                for="reponse4_en"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" placeholder="Enter answer 4  here "
                                                                    wire:model="reponse4_en" class="form-control"
                                                                    aria-label="Text input with radio button">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="tab-pane  p-20" id="profile9" role="tabpanel">
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="city_en">Question</label>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control" id="question_fr"
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
                                                                        <input disabled type="radio"
                                                                            id="correcte_fr" value="1"
                                                                            name="correcte_fr"class="custom-control-input"
                                                                            wire:model="correcte_fr">
                                                                        <label class="custom-control-label"
                                                                            for="correcte_fr"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control"
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
                                                                        <input disabled type="radio"
                                                                            id="reponse2_fr" value="2"
                                                                            name="correcte_fr"class="custom-control-input"
                                                                            wire:model="correcte_fr">
                                                                        <label class="custom-control-label"
                                                                            for="reponse2_fr"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" placeholder="Entrez la reponse 2 ici  "
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
                                                                        <input disabled type="radio"
                                                                            id="reponse3_fr" value="3"
                                                                            name="correcte_fr"class="custom-control-input"
                                                                            wire:model="correcte_fr">
                                                                        <label class="custom-control-label"
                                                                            for="reponse3_fr"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" class="form-control"
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
                                                                        <input disabled type="radio"
                                                                            id="reponse4_fr" value="4"
                                                                            name="correcte_fr"class="custom-control-input"
                                                                            wire:model="correcte_fr">
                                                                        <label class="custom-control-label"
                                                                            for="reponse4_fr"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input onfocus="this.blur();" tabindex="-1"
                                                                type="text" placeholder="Entrez la reponse 4 ici  "
                                                                wire:model="reponse4_fr" class="form-control"
                                                                aria-label="Text input with radio button">

                                                        </div>
                                                    </div>
                                                </div>

                                            </section>
                                        </div>
                                        <div class="tab-pane p-20" id="messages9" role="tabpanel">
                                            <div  class="p-20" lang="ar">
                                                <section lang="ar" class="pt-2">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="city_ar"> السؤال </label>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" class="form-control" id="question_ar"
                                                                    wire:model="question_ar"
                                                                    placeholder="أدخل  السؤال هنا">
    
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
                                                                            <input disabled type="radio"
                                                                                id="correcte_ar" name="correcte_ar"
                                                                                class="custom-control-input"
                                                                                value="1" wire:model="correcte_ar">
                                                                            <label class="custom-control-label"
                                                                                for="correcte_ar"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" class="form-control"
                                                                    placeholder="أدخل  الجواب 1 هنا"
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
                                                                            <input disabled type="radio"
                                                                                id="correcte2_ar" name="correcte_ar"
                                                                                class="custom-control-input"
                                                                                value="2" wire:model="correcte_ar">
                                                                            <label class="custom-control-label"
                                                                                for="correcte2_ar"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" placeholder="أدخل  الجواب 2 هنا"
                                                                    wire:model="reponse2_ar" class="form-control"
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
                                                                            <input disabled type="radio"
                                                                                id="correcte3_ar" name="correcte_ar"
                                                                                class="custom-control-input"
                                                                                value="3" wire:model="correcte_ar">
                                                                            <label class="custom-control-label"
                                                                                for="correcte3_ar"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" class="form-control"
                                                                    placeholder="أدخل  الجواب 3 هنا"
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
                                                                            <input disabled type="radio"
                                                                                id="correcte4_ar" name="correcte_ar"
                                                                                class="custom-control-input"
                                                                                value="4" wire:model="correcte_ar">
                                                                            <label class="custom-control-label"
                                                                                for="correcte4_ar"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onfocus="this.blur();" tabindex="-1"
                                                                    type="text" placeholder="أدخل  الجواب 4 هنا"
                                                                    wire:model="reponse4_ar" class="form-control"
                                                                    aria-label="Text input with radio button">
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('primary/dist/css/main.css') }}">
        <link href="{{ asset('primary/dist/css/pages/tab-page.css') }}" rel="stylesheet">
    @endpush

    @push('scripts')
        <script src="{{ asset('primary/assets/node_modules/bootstrap-select/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('primary/dist/js/pages/jasny-bootstrap.js') }}"></script>
        <script>
            window.livewire.on('cityDeleted', function() {
                $("#delete-confirmation-modal").modal('hide');
            });
            $(document).ready(function() {
                $('a').click(function() {
                    setTimeout(function() {
                        $('#modalnon').removeClass('d-none');
                        $('#modalnon2').addClass('d-none');
                    }, 1000);
                });
            });
        </script>
    @endpush

</div>
