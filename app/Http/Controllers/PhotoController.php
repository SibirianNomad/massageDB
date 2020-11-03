<?php

namespace App\Http\Controllers;

use App\Models\Client as Model;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    private $clientRepository;

    public function __construct(){
        parent::__construct();
        $this->clientRepository = app(ClientRepository::class);
    }

    public function upload(Request $request){
        $user=$request->all();
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images/'.$user['id'].' '.$user['fio']), $imageName);
        $item=$this->clientRepository->getEdit($user['id']);
        $item->photo=1;
        $item->save();

        return back()
            ->with('success','Изображения пациента '.$user['fio'].' успешно загружены')
            ->with('image',$imageName);
    }
    public function unload(){
        $name= $_REQUEST['id'].' '. $_REQUEST['name'];
        $path       = 'images/'.$name; // путь к директории с изображениями
        $extensions = array('png', 'jpg', 'jpeg', 'gif','svg'); // показывать расширения

        $directoryIterator = new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS);
        $iteratorIterator  = new \RecursiveIteratorIterator($directoryIterator, \RecursiveIteratorIterator::LEAVES_ONLY);
        $images=[];
        foreach ($iteratorIterator as $file) {
            if (in_array($file->getExtension(), $extensions)) {
                $images[]='<img src="' . $file->getPathname() . '">';
            }
        }
        return $images;
    }
}
