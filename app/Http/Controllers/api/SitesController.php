<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Saved;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHomeSites()
    {
        $sites = Site::where('status', '=', 0)->get()->take(4);
        $totalSites = Site::where('status', '=', 0)->count();
        foreach ($sites as $site) {
            $site->media;
        }
        return response(['sites' => $sites, "total" => $totalSites], 200);
    }

    public function getAllSites()
    {
        $sites = Site::where('status', '=', 0)->get();
        $totalSites = Site::where('status', '=', 0)->count();
        foreach($sites as $site){
            $site->saveds;
        }
        return response(['sites' => $sites, "total" => $totalSites], 200);
    }


    public function getFavorised($id)
    {
        try {
            $client = Client::find($id);
            if ($client) {
                $list = [];
                foreach ($client->saveds as $saved) {
                    array_push($list, $saved->site);
                }
                return response(['savedSites' => $list, 'total' => $client->saveds->count()], 200);
            } else {
                return response(['message' => 'usernotfound'], 404);
            }
        } catch (\Exception $ex) {
            return response(['message' => $ex->getMessage()], 400);
        }
    }

    public function favorise(Request $request, $siteId)
    {
        $request->validate([
            'uid' => 'required',
        ]);
        $saved = Saved::where('client_id', $request->uid)->where('site_id', $siteId)->first();
        if (!is_null($saved)) {
            $saved->delete();
            return response(['message' => 'unfavorised'], 200);
        } else {
            Saved::create([
                'site_id' => $siteId,
                'client_id' => $request->uid
            ]);
            return response(['message' => 'favorised'], 201);
        }
        // if()
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = Site::find($id);
        if ($site != null) {
            $images = $site->media->where('type', 'image');
            $videos = DB::table('media')->where('site_id', $id)->where('type', 'video')->get();
            $audios = DB::table('media')->where('site_id', $id)->where('type', 'audio')->get();
            return response(["images" => $images, "totalImages" => $images->count(),  "videos" => $videos, "totalvideos" => $videos->count(), "audios" => $audios, "totalAudios" => $audios->count()], 200);
        }
        else{
            return response("notfound", 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
