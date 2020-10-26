<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function upload(Request $request){
        $user=$request->all();
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images/'.$user['id'].' '.$user['fio']), $imageName);

        return back()
            ->with('success','Изображения пациента '.$user['fio'].' успешно загружены')
            ->with('image',$imageName);
    }
    public function unload(){
        return $_REQUEST['name'];
    }
}
