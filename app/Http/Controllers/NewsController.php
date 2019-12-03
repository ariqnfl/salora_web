<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;

class NewsController extends Controller
{
    //
    public function __construct()
    {
    }

    public function index(){

        $api_key = '966807fff7e243bd921c605c991bb5b4';
        $client = new Client();

        $response = $client->request('GET','https://newsapi.org/v2/top-headlines?country=id&category=sports&apiKey='.$api_key);
        $responseBody = $response->getBody()->getContents();

        $api_response = json_decode($responseBody,true);
        return view('news.index',compact('api_response'));
    }


}
