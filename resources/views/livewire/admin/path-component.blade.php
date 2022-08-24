<div>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Paths</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li> 
                        <li class="breadcrumb-item active">Paths</li>
                    </ol>
                    <a type="button" href="{{ route('admin-addpath') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                            class="fa fa-plus-circle"></i>
                        Create New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left pt-2 pb-2">
                            <h5 class="card-title float-start">PATHS OVERVIEW</h5>
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
                                class="{{ count($countsrecords) == 0 ? 'text-danger pl-1' : 'text-success pl-1' }}">{{ count($countsrecords) }}
                                record(s).</span>

                        </div>
                        <div class="table-responsive">
                            @if (count($paths) == 0)
                                <div class="text-center">
                                    <p class="text-danger">0 record found.</p>
                                    <a href="{{ route('admin-addpath') }}" class="btn btn-info btn-circle">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            @else
                                <table class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Sites</th>
                                            <th>Created by</th>
                                            <th>Created at</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paths->sortByDesc('id') as $path)
                                            <tr class="data-vertical">
                                                <td>{{ $path->name_en }}</td>
                                                <td style="vertical-align : middle;">
                                                    <img src="{{ asset('primary/assets/images/paths') }}/{{ $path->photo }}"
                                                        width="70">
                                                </td>
                                                <td>
                                                    @if (   count($pathsite->where('path_id',$path->id))  == 0)
                                                        <a href="{{ route('admin-addsite',$path->id) }}"><i class="icon-plus text-info fa-2x"></i></a>
                                                        <br>
                                                    @else
                                                        <span>{{ count($pathsite->where('path_id',$path->id)) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $path->user->name }}</td>
                                                <td>{{ $path->created_at->format('Y-m-d')  }}</td>
                                                <td>
                                                    <a href="#"
                                                        wire:click.prevent="changeStatus({{ $path->id }})">
                                                        <i class="fas {{ $path->status == 0 ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger' }} fa-2x"
                                                            title="{{ $path->status == 0 ? 'turn off' : 'turn on' }}"></i>
                                                    </a>

                                                </td>
                                                <td>
                                                    <a href="{{ route('admin-showpath',$path->id) }}"
                                                        class="text-dark p-r-10" data-toggle="tooltip" title="Show details">
                                                        <i class="ti-eye fa-2x"></i>
                                                    </a>
                                                    <a  href="{{ route('admin-editpath',$path->id) }}"
                                                        class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
                                                        <i class="ti-marker-alt fa-2x"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#delete-confirmation-modal"  class="text-dark" title="Delete"
                                                        data-toggle="tooltip"  wire:click.prevent="confirmDelete({{ $path->id }})" >
                                                        <i class="ti-trash fa-2x" ></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $paths->links('livewire-pagination') }}
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self id="delete-confirmation-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-info"><i class="fa fa-exclamation-circle"></i> Delete confirmation</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        Are you sure you wanna delete all the record for the path   
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" wire:click.prevent="deletePath()">confrim</button>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('primary/dist/css/main.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('primary/assets/node_modules/bootstrap-select/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('primary/dist/js/pages/jasny-bootstrap.js') }}"></script>
        <script>
            window.livewire.on('cityDeleted',function(){
                $("#delete-confirmation-modal").modal('hide');
            });
        </script>
    @endpush

</div>
