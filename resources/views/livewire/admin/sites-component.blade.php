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
                                     <option value="" selected>Tous --- Status</option>
                                     <option value="1">Active</option>
                                     <option value="0">Inactive</option>
                                 </select>

                             </div>
                         </div>
                         <div class="col-sm-6 col-md-2">
                             <div class="form-group has-info">
                                 <select class="form-control custom-select" wire:model="searchCity">
                                     <option value="" selected>Tous --- City</option>

                                     @foreach ($cities as $city)
                                         <option value="{{ $city->id }}">{{ $city->city_fr }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-sm-6 col-md-3">
                             <div class="form-group has-info">
                                 <select wire:model="searchUser" class="form-control custom-select">
                                     <option value="" selected>Tous --- Created By</option>
                                     @foreach ($users as $user)
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
     <!-- /.row -->
     <!-- .row -->
     {{-- <div class="row"> --}}
     <!-- item -->
     {{-- @foreach ($sites as $site)
             
                 <div class="col-lg-4 col-md-6">
                     <div class="card">
                         <div class="el-card-item">
                             <a href="{{ route('admin-showsite', ['site_id' => $site->id]) }}">
                                 <div class="card-img-overlay">
                                     <span class="badge badge-info badge-pill">{{ $site->created_at }}</span>
                                 </div>
                                 <img class="card-img-top"
                                     src="{{ asset('primary/assets/images/sites/' . $site->photo) }}"
                                     alt="Card image cap" style="object-fit: cover;" width="400" height="400">
                             </a>
                             <div class="card-body bg-light">
                                 <h4 class="card-title">{{ $site->name_fr }}</h4>
                                 <h4 class="text-primary float-left">&#36;
                                     {{ $site->price == 0 ? 'Free' : $site->price }}
                                 </h4>
                                 <h4 class="float-right">S'ouvre à: {{ $site->openTime }}</h4>
                             </div>
                             <div class="card-body border-top">
                                 <div class="d-flex no-block align-items-center">
                                     <span><i class=" fas fa-file-video"></i></span>
                                     <span class="p-10 text-muted">Videos</span>
                                     <span
                                         class="ml-auto badge badge-pill badge-secondary pull-right">{{ count($site->media->where('type', 'image')) }}</span>
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
                                         class="ml-auto badge badge-pill badge-secondary pull-right">{{ count($site->media->where('type', 'video')) }}</span>
                                 </div>
                             </div>
                             <div class="card-body border-top">
                                 <div class="d-flex no-block align-items-center">
                                     <span class="m-r-15"><img alt="img " class="thumb-md img-circle "
                                             src="{{ asset('primary/assets/images/users') }}/{{ $site->user->photo }} "></span>
                                     <div>
                                         <h5 class="card-title m-b-0">{{ $site->user->name }}</h5>
                                         <small class="text-success">created by
                                             {{ $site->user->utype == 'ADM' ? 'administrator' : 'user' }}</small>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     

                 </div>
             </div>
         @endforeach --}}
     {{-- </div> --}}
     <div wire:ignore.self id="confirmationDelete" class="modal fade" tabindex="-1" role="dialog" >
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
                    <button wire:click.prevent="deleteSite()"    class="btn btn-danger waves-effect"  >Oui</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
     <div class="row el-element-overlay">
         <div class="col-md-12">
             <h4 class="card-title">Fade-in effect</h4>
             <h6 class="card-subtitle m-b-20 text-muted">You can use by default
                 <code>el-overlay</code>
             </h6>
         </div>
         @foreach ($sites as $site)
             <div class="col-lg-4 col-md-6">

                 <div class="card">
                     <div class="el-card-item">



                         <div class="el-card-avatar el-overlay-1">
                             <img class="card-img-top" src="{{ asset('primary/assets/images/sites/' . $site->photo) }}"
                                 alt="Card image cap" style="object-fit: cover !important;" width="600" height="400">
                             <div class="el-overlay">
                                 <ul class="el-info">
                                     <li>
                                         <a class="btn default btn-outline "
                                             href="{{ route('admin-editsite',$site->id) }}">
                                             <i class="icon-pencil"></i>
                                         </a>
                                     </li>
                                     <li>
                                        <a  wire:click.prevent="confirmDeleteSite({{ $site->id }})"
                                            data-toggle="modal" data-target="#confirmationDelete"   class="btn default btn-outline"   title="Supprimer">
                                            <i class="icon-trash"></i>
                                        </a>
                                         
                                     </li>
                                 </ul>
                             </div>
                         </div>

                         <div style="cursor: pointer;" onclick=" window.location='{{ route('admin-showsite', $site->id) }}'" wire:ignore.self >
                             <div class="card-body bg-light">
                                 <h4  class="card-title">{{ $site->name_fr }}</h4>
                                 <h4 class="text-primary float-left">
                                     {{ $site->price == 0 ? 'Free' : $site->price }}
                                 </h4>
                                 <h4 class="float-right">S'ouvre à: {{ $site->openTime }}</h4>
                             </div>
                             <div class="card-body border-top">
                                 <div class="d-flex no-block align-items-center">
                                     <span><i class=" fas fa-file-video"></i></span>
                                     <span class="p-10 text-muted">Videos</span>
                                     <span
                                         class="ml-auto badge badge-pill badge-secondary pull-right">{{ count($site->media->where('type', 'image')) }}</span>
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
                                         class="ml-auto badge badge-pill badge-secondary pull-right">{{ count($site->media->where('type', 'video')) }}</span>
                                 </div>
                             </div>
                             <div class="card-body border-top">
                                 <div class="d-flex no-block align-items-center">
                                     <span class="m-r-15"><img alt="img " class="thumb-md img-circle "
                                             src="{{ asset('primary/assets/images/users') }}/{{ $site->user->photo }} "></span>
                                     <div>
                                         <h5 class="card-title m-b-0">{{ $site->user->name }}</h5>
                                         <small class="text-success">created by
                                             {{ $site->user->utype == 'ADM' ? 'administrator' : 'user' }}</small>
                                     </div>
                                 </div>
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
