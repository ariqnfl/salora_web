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

    	$endpoint = "https://newsapi.org/v2/top-headlines?country=id&apiKey=b479ed952ff841d1be9c6c39db71cd30";
		$client = new Client();
		$response = $client->get($endpoint);
		$statusCode = $response->getStatusCode();
		$content = json_decode($response->getBody()->getContents());

		$articles = $content->articles;
		//dd($articles);
		return view('news/index', compact('articles'));
    }

    public function filterBy(Request $request){

    	$filterBy = $request->author;
    	if(!$filterBy){
    		return redirect('/');
    	}
    	
    	$endpoint = "https://newsapi.org/v2/top-headlines?country=id".$filterBy."&apiKey=b479ed952ff841d1be9c6c39db71cd30";
		$client = new Client();
		$response = $client->get($endpoint);
		$statusCode = $response->getStatusCode();
		$content = json_decode($response->getBody()->getContents());

		$articles = $content->articles;
		//dd($articles);
		return view('news/filter_by', compact('articles', 'filterBy'));

    }
}
