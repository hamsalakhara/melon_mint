<?php

namespace App\Http\Controllers\Admin\Assets;
use App\Http\Controllers\Controller;
use App\Models\Assets;
use Illuminate\Http\Request;

class AssestShowController extends Controller
{
    public function showAssets(){
        $Assetss = Assets::all();
        return view ('admin.assets-management.Assetslist',compact('Assetss'));
        }

        public function changeStatus(Request $request)
        {
            $user = Assets::find($request->user_id);
            $user->status = $request->status;
            $user->save();
      
            return response()->json(['success'=>'Status change successfully.']);
        }
    
        // public function add(){
        // return view ('adminAssetsShow.createassets');
        // }

        public function store(Request $request){
            $path = $request->file('fileupload')->store('public/images');
            $active = $request->has('active') ? 1 : 0;
            $model = new Assets();
            $model->name=$request->name;
            $model->fileupload=$path;
            $model->price=$request->price;
            $model->status= $active;
            $model->creatername='anjali';
            $model->is_zip=0;
           // Blog::create($request->all());
            $model->save();
            return redirect('assets')->with('message','Create New Users');

        }
}

