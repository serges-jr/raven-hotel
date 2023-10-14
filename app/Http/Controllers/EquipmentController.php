<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Models\Equipment;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        return view('admin.equipment.index',[
            'equipment' => new Equipment(),
            'equipments' => Equipment::all()
        ]);
    }
    public function storeEquipment(EquipmentRequest $request)
    {
        $post = Equipment::updateOrCreate($request->validated());
        return response()->json($post);
    }
    public function edit($id)
    {
        $post = Equipment::findOrfail($id);
        return response()->json($post);
    }

    public function post(EquipmentRequest $request,$id)
    {
        $post = Equipment::where('id',$id)->update($request->validated());
        return response()->json($post);
    }

     public function active($id)
    {
        $post = Equipment::find($id);
        if($post->status == 0)
        {
            $post->where('id',$id)->update(['status' => 1]);
        }else{
            $post->where('id',$id)->update(['status' => 0]);
        }
        return response()->json($post);
    }
}
