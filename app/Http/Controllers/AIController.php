<?php

namespace App\Http\Controllers;

use App\Models\Category;
use OpenAI\Laravel\Facades\OpenAI;

use Illuminate\Http\Request;

class AIController extends Controller
{
    public function index(Request $request){
        // return response()->json(['Title' => 'Hello World','Description'=>'Description']);
        // return 1;
        $description=$request->description;
        if(!$description){
            return response()->json(['error' => 'Description is required'],422);
        }
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'Please generate a JSON response containing a "Title" and a "Description" for a brand that is booking a sponsee.In the Title there will be a short sentence about service he wants and in Description the description of the service  Here are the details of the service: '.$description],
            ],
        ]);
        
return response()->json($result['choices'][0]['message']['content']);  // No need to use json_decode(), just return the $result object.
        // Output the content from the AI's response
        // echo $result['choices'][0]['message']['content'];
        
    }

    public function generateService(Request $request)
{
    $service_message = $request->description;
    $categories= Category::select(['id','name'])->get();
    $cate_to_string = json_encode($categories);

    if (!$service_message ) {
        return response()->json(['error' => 'Message and Category ID are required'], 422);
    }

    $result = OpenAI::chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            [
                'role' => 'user',
                'content' => 'Please generate a JSON response containing the following for a service the sponsee is creating: "title", "description", "tags" (as an array of keywords), and "category_id". Here are the details provided: ' . $service_message.'The category i have '.$cate_to_string, 
            ]
        ],
    ]);

    // Output the AI's response as JSON
    return response()->json($result['choices'][0]['message']['content']);
}

}
