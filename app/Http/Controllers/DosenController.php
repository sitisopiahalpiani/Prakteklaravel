<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DosenModel;

class DosenController extends Controller
{
    public function index(){
        $dosen = DosenModel::all();
        return view('dosen',['data'=>$dosen]);
    }



public function create(){
    $model = new DosenModel;
return view('dosen_create',compact('model'));
}

public function store(Request $request){
    DosenModel::create($request->all());
return redirect()->route('dosenList');
}

public function edit($id){
    $data= DosenModel::where('id_dosen',$id)-> firstorfail();
    //return$data;
return view('dosen_edit',compact('data'));

}

public function update(Request $request,$id){
    $data= DosenModel::where('id_dosen',$id)
            ->update([
                'nama'      =>$request['nama'],
                'telp'      =>$request['telp'],
                'email'     =>$request['email'],
            ]);
            return redirect()->route('dosenList');
   
}
public function destroy($id){
    $data= DosenModel::where('id_dosen',$id)
            ->delete();
            return redirect()->route('dosenList');
}


}