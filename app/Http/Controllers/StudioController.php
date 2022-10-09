<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Studio;
use Auth;
use Illuminate\Support\Facades\Storage;
class StudioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = Auth::user(); 
        if($user->user_type != 1){
            return redirect('/home');
        }

        $studioList = Studio::get();
        return view('studio', compact('studioList'));
        //return view('studio');
    }

    function createOrUpdateForm(Request $request ){
        $user = Auth::user(); 
        if($user->user_type != 1){
            return redirect('/home');
        }
        $studio = [];
        if(isset($request->id)){
            $studio = Studio::where('id',$request->id)->first();
        }
        return view('add-studio', compact('studio'));
    }

    function save(Request $request, int $id = 0 ){
        $user = Auth::user(); 
        if($user->user_type != 1){
            return redirect('/home');
        }
        try {
            $validator = Validator::make($request->all(), [
                'studio_name' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
                'location' => ['nullable', 'string',],
                'opening_time' => ['required', 'date_format:H:i'],
                'closing_time' => ['required', 'date_format:H:i'],
                'charges' => ['required', 'string'],
                'studio_image' => ['nullable','mimes:jpeg,png,gif,jpg','max:10240']
            ]);

            if ($validator->fails()) {
                if($id){
                    return redirect('/edit-studio/'.$id)
                    ->withErrors($validator)
                    ->withInput();
                }
                return redirect('/add-studio/')
                ->withErrors($validator)
                ->withInput();
            }

            $requestArr = $validator->validated();
            $saveData = [
                'studio_name' => $requestArr['studio_name'],
                'description' => $requestArr['description'],
                'location' => $requestArr['location'],
                'opening_time' => $requestArr['opening_time'],
                'closing_time' => $requestArr['closing_time'],
                'charges' => $requestArr['charges'],
            ];

            if ($request->hasFile('studio_image')) {
                $studio_image = $request->file('studio_image');
                // $name = $studio_image->getClientOriginalName();
                 $path = $studio_image->store('uploads/files');
                 $path = Storage::url($path);
                 $saveData['studio_image'] = $path;
            } 
           

            if($id > 0){
                $studioArr = Studio::where('id', $id)->firstOrFail();
                $studioArr->update($saveData);
            }else{
                $studioArr = Studio::create($saveData);
            }
            return redirect('studio')->with('message', 'Studio data has been successfully saved.');
        } catch (Exception $err) {
            return redirect('studio')->with('message', 'Something went wrong. Please try again later');
        }
        
    }

}
