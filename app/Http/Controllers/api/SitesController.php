<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Models\saved;
use App\Models\site;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHomeSites()
    {
        $sites = site::all()->where('status', '=', 1)->take(4);
        $totalSites = site::where('status', '=', 1)->count();
        return response(['sites' => $sites, "total" => $totalSites], 200);
    }

    public function getAllSites()
    {
        $sites = site::all()->where('status', '=', 1);
        $totalSites = site::where('status', '=', 1)->count();
        return response(['sites' => $sites, "total" => $totalSites], 200);
    }


    public function getFavorised($id)
    {
        try {
            $client = client::find($id);
            if($client){
                $list = [];
                foreach($client->saveds as $saved){
                    array_push($list, $saved->site);
                }
                return response(['savedSites' => $list, 'total' => $client->saveds->count()], 200);
            }
            else{
                return response(['message' => 'usernotfound'], 404);
            }
        } catch (\Exception $ex) {
            return response(['message' => $ex->getMessage()], 400);
        }
    }

    public function favorise(Request $request, $siteId){
        $request->validate([
            'uid'=>'required',
        ]);
        $saved = saved::where('client_id', $request->uid)->where('site_id', $siteId)->first();
        if(!is_null($saved)){
            $saved->delete();
            return response(['message' => 'unfavorised'], 200);
        }
        else{
            saved::create([
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
        //
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
