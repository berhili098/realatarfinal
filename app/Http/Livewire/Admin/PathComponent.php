<?php

namespace App\Http\Livewire\Admin;

use App\Models\Path;
use App\Models\PathSite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PathComponent extends Component
{
    use WithPagination;

    public $path_id;

    public $search;
    public $sites = [];

    public function mount()
    {
        $this->search = '';
    }
    public function updating()
    {
        $this->resetPage();
    }
    public function changeStatus($path_id)
    {
        $this->path_id = $path_id;
        $path = Path::find($path_id);

        $path->update([
            'status' => $path->status == 0 ? 1 : 0,
        ]);
    }

    public function showSites($id)
    {
        $path = Path::find($id);
        $sites = $path->sites;
        $this->sites = $sites;
        
    }

    public function confirmDelete($path_id)
    {
        $this->path_id = $path_id;
    }
    public function deletePath()
    {
        $path = Path::find($this->path_id);
        $path->update([
            'status' => 1,
            'delete' => 1,
            'deletedBy' => Auth::user()->id,
        ]);
        $this->emit('cityDeleted');
        session()->flash('type', 'error');
        session()->flash('message', 'Well done, You have successfully deleted');
        session()->flash('title', 'Operation success');
    }

    public function render()
    {



        $paths = Path::where('delete', 0)->where(function ($query) {
            $query->where('name_ar', 'like', "%{$this->search}%")
                ->orwhere('name_fr', 'like', "%{$this->search}%")
                ->orwhere('name_en', 'like', "%{$this->search}%");
        })->paginate(6);

        $title = "Paths";
        $pathsite = PathSite::all();
        $countsrecords = Path::where('delete', 0)->get();
        return view('livewire.admin.path-component', compact('paths', 'pathsite', 'countsrecords'))->layout('layouts.master', compact('title'));
    }
}
