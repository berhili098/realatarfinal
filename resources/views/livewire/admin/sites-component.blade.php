<div>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Sites</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sites</li>
                    </ol>
                    <a type="button" href="{{ route('admin-addsite') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                            class="fa fa-plus-circle"></i>
                        Create New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filter</h5>
                        <form role="form" class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" wire:model="searchWord"
                                        placeholder="Site name, latidute...">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group has-info">
                                    <select class="form-control custom-select" wire:model="searchStatus">
                                        <option value="" selected >Status</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
   
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="form-group has-info">
                                    <select class="form-control custom-select" wire:model="searchCity">
                                        <option value="" selected>Cities</option>
   
                                        @foreach ($cities->sortByDesc('created_at') as $city)
                                            <option value="{{ $city->id }}">{{ $city->city_fr }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group has-info">
                                    <select wire:model="searchUser" class="form-control custom-select">
                                        <option value="" selected> Created By</option>
                                        @foreach ($users->sortByDesc('created_at') as $user)
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
        <div class="row el-element-overlay">
   
            @foreach ($sites->sortByDesc('created_at') as $site)
                <div class="col-lg-4 col-md-6">
   
                    <div class="card">
                        <div class="el-card-item">
   
   
   
                            <div class="el-card-avatar el-overlay-1 mb-0 " >
                                <img class="card-img-top" src="{{ asset('primary/assets/images/sites/' . $site->photo) }}"
                                    alt="Card image cap" style="object-fit: cover !important; max-height:220px"
                                    width="300" height="300">
                                <div class="el-overlay">
                                    <ul class="el-info">
                                        <li>
                                            <a class="btn default btn-outline "
                                                href="{{ route('admin-editsite', $site->id) }}">
                                                <i class="icon-pencil"></i>
                                            </a>
                                        </li>
                                        @if ($site->delete == 0)
                                            <li>
                                                <a wire:click.prevent="confirmDeleteSite({{ $site->id }})"
                                                    data-toggle="modal" data-target="#confirmationDelete"
                                                    class="btn default btn-outline" title="Supprimer">
                                                    <i class="icon-trash"></i>
                                                </a>
   
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
   
                            <div wire:ignore.self>
                                <div style="cursor: pointer;"
                                    onclick=" window.location='{{ route('admin-showsite', $site->id) }}'"
                                    class="card-body bg-light p-t-40 p-b-40 " style="top:0px">
                                    <h4 class="card-title">{{ $site->name_fr }}</h4>
                                    <h4 class="text-primary float-left">
                                        {{ $site->price == 0 ? 'Free' : $site->price.' MAD' }}
                                    </h4>
                                    <h4 class="float-right">S'ouvre à: {{ $site->openTime }}</h4>
                                </div>
                                <div style="cursor: pointer;"
                                    onclick=" window.location='{{ route('admin-showsite', $site->id) }}'"
                                    class="card-body border-top">
                                    <div class="d-flex no-block align-items-center">
                                        <span><i class=" fas fa-file-video"></i></span>
                                        <span class="p-10 text-muted">Videos</span>
                                        <span
                                            class="ml-auto badge badge-pill badge-secondary pull-right">{{ count($site->media->where('type', 'video')) }}</span>
                                    </div>
                                    <div class="d-flex no-block align-items-center">
                                        <span><i class=" fas fa-file-audio"></i></span>
                                        <span class="p-10 text-muted">Audios</span>
                                        <span
                                            class="ml-auto badge badge-pill badge-secondary pull-right">{{ count($site->media->where('type', 'audio')) }}</span>
                                    </div>
                                    <div class="d-flex no-block align-items-center">
                                        <span><i class=" fas fa-file-image"></i></span>
                                        <span class="p-10 text-muted">Images</span>
                                        <span
                                            class="ml-auto badge badge-pill badge-secondary pull-right">{{ count($site->media->where('type', 'image')) }}</span>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <div class="d-flex no-block align-items-center float-left">
                                        <span class="m-r-15"><img alt="img " class="thumb-md img-circle "
                                                src="{{ asset('primary/assets/images/users') }}/{{ $site->user->photo }} "></span>
                                        <div>
                                            <h5 class="card-title m-b-0">{{ $site->user->name }}</h5>
                                            <small class="text-success">created by
                                                {{ $site->user->utype == 'ADM' ? 'administrator' : 'user' }}</small>
                                        </div>
   
                                    </div>
                                    @if (Auth::user()->utype == 'ADM' && $site->delete == 1)
                                        <div class="d-flex no-block align-items-center float-right  ">
                                            <a href="#" wire:click.prevent='restore({{ $site->id }})'> <i
                                                    title="restore this site"
                                                    class="  fas fa-redo-alt text-danger fa fa-2x"></i></a>
   
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
   
                </div>
            @endforeach
        </div>
   
        <div class="justify-content-between color-success">
            {{ $sites->links('livewire-pagination') }}
        </div>
    </div>
   
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
   
</div>