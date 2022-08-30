<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Site;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function show($id)
    {
        $site = Site::find($id);
        if($site->quiz != null){
            return response(['quiz' => $site->quiz], 200);
        }
        else
            return response(['message' => 'notfound'], 404);
    }
    public function updatePoints($id){
        $client = Client::find($id);
        $points = $client->points;
        $client->update([
            'points' => $points+25
        ]);
        return response(['message' => 'success'], 200);
    }
}
