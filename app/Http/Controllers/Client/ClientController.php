<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use App\Http\Controllers\Client\BaseController;
use App\Models\Client;

class ClientController extends BaseController
{
    private $clientRepository;

    public function __construct(){
        parent::__construct();
        $this->clientRepository = app(ClientRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator=$this->clientRepository->getAllWithPaginate(10);
        $birthdays=$this->clientRepository->getBirthdays();
        $day=$this->clientRepository->getCurrentDate();
        return view('index',compact('paginator','birthdays','day'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item=new Client();
        return view('edit',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->input();

        $item=(new Client())->create($data);
        if($item){
            return redirect()->route('client.index')->with(['success'=>'Пациент дабален']);;
        }else{
            return back()->withErrors(['msg'=>"Ошибка сохранения"])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $item=$this->clientRepository->getEdit($id);

         if(empty($item)){
             abort(404);
         }
        return view('edit', compact('item'));
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
        $item=$this->clientRepository->getEdit($id);
        if(empty($item)){
            return back()->withErrors(['msg'=>"Запись id[{$id}] не найдена"])->withInput();
        }
        $data=$request->all();

        $result=$item->update($data);

        if($result){
            return redirect()->route('client.index')->with(['success'=>'Запись успешно отредактирована']);
        }else{
            return back()->withErrors(['msg'=>"Ошибка сохранения"])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=Client::destroy($id);

        if($result){
            return redirect()->route('client.index')->with(['success'=>"Запись успешно удалена"]);
        }else{
            return back()->withErrors(['msg'=>"Ошибка сохранения"])->withInput();
        }
    }
    public function upload(){
        dd(12);
    }
}
