<div>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Users</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                    <a type="button" href="{{ route('admin-adduser') }}"
                        class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
                        Create New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card  ">
                    <div class="card-body">
                        <h5 class="card-title">Filter</h5>
                        <form role="form" class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" wire:model="searchWord"
                                        placeholder="User name , email ...">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group has-info">
                                    <select class="form-control custom-select" wire:model="searchStatus">
                                        <option value="" selected>Status</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group has-info">
                                    <select class="form-control custom-select" wire:model="typeUser">
                                        <option value="" selected>Type</option>
                                        <option value="ADM">Admin</option>
                                        <option value="USR">User</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group has-info">
                                    <select wire:model="searchUser" class="form-control custom-select">
                                        <option value="" selected> Created By</option>
                                        @foreach ($wholeusers->sortByDesc('created_at') as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore.self id="confirmationDelete" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="vcenter">Supprimer cette ville</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>Vous voulez vraiment supprimer cette ville</h4>
                        <p>Si vous supprimez cette ville vous ne pouvez pas la recuperer</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Non</button>
                        <button wire:click.prevent="deleteSite()" class="btn btn-danger waves-effect">Oui</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        @if (count($countsrecord) > 0)


            <div class="row el-element-overlay">

                @foreach ($users as $user)
                    <div class="col-lg-4 col-md-6">

                        <div class="card h-92">
                            <div class="header">
                                <div class="header-dropdown">
                                    <div class="d-flex">

                                        <div class="p-2"></div>
                                        <div class="ml-auto p-2">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-settings"></i>
                                                </button>
                                                <div class="dropdown-menu animated flipInX">
                                                    <a class="dropdown-item" href="javascript:void(0)"> <i class="ti-eye pr-1 "></i> Show</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"> <i class="ti-marker-alt pr-1" ></i>Edit</a>

                                                    <a class="dropdown-item" href="javascript:void(0)">  <i class="ti-trash pr-1 " ></i>Delete</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 text-center">
                                        <a href=""><img
                                                src="{{ asset('primary/assets/images/users') }}/{{ $user->photo }}"
                                                alt="user" class="img-circle img-responsive"
                                                style="height: 130px; width:130px"></a>
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="card-title m-b-0">{{ $user->name }}</h5> <small>Created by
                                            {{ $user->find($user->createdBy)->name }}</small>
                                        <p>
                                        <address>
                                            {{ $user->address ? Str::of($user->address)->limit(50) : 'no address available' }}
                                            <br />
                                            <span class="label label-danger mb-3 mt-3">{{ $user->utype }}</span>
                                            <br />
                                            {{ $user->phoneNo ? '(+212)' : '' }}
                                            {{ $user->phoneNo ? $user->phoneNo : 'no phone number available' }}


                                        </address>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            @if (count($countsrecord) > 6)
                <div class="justify-content-between color-success ">
                    {{ $users->links('livewire-pagination') }}
                </div>
            @endif
        @else
            <div class="text-center">
                <p class="text-danger">0 record found.</p>
                <a href="{{ route('admin-addsite') }}" class="btn btn-info btn-circle">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        @endif
    </div>




</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('primary/dist/css/main.css') }}">
@endpush

@push('scripts2')
    <script src="{{ asset('primary/assets/node_modules/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('primary/dist/js/pages/jasny-bootstrap.js') }}"></script>
    <script>
        window.livewire.on('itemDeleted', function() {
            $("#confirmationDelete").modal('hide');
        });
    </script>
    @if (Session::has('message'))
        <script>
            window.livewire.on('success', function() {

                $.toast({
                    heading: '{!! Session::get('title') !!}',
                    text: '{!! Session::get('message') !!}',
                    position: 'bottom-right',
                    loaderBg: '#ff6849',
                    icon: '{!! Session::get('type') !!}',
                    hideAfter: 3500,
                    stack: 6
                });

            });
        </script>
    @endif


@endpush
