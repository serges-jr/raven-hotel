<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Feature;
use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChambreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AddImageRoomRequest;

class ChambreController extends Controller
{
    public function index()
    {
        // $chambres = Chambre::where('feature', !null)->get();
        // $features = Feature::all();
        // foreach ($features as $feature) {
        //     foreach ($chambres as $chambre) {
        //         $p = explode(',', $chambre->feature);
        //         foreach ($p as $ps) {
        //             if ($ps == $feature->id) {
        //                 echo $chambre->id.' '.$feature . '\n';
        //             }
        //         }
        //     }
        // }
        return view('admin.chambre.index', [
            'chambres' => Chambre::all(),
            'categorys' => Category::all(),
            'features' => Feature::all(),
            'equipments' => Equipment::all()
        ]);
    }
    public function store(ChambreRequest $request)
    {
        $post = $request->validated();
        $feature = implode(',', $request->validated('feature'));
        $equipments = implode(',', $request->validated('equipments'));
        $post['feature'] = $feature;
        $post['equipments'] = $equipments;
        $add = Chambre::create($post);
        return response()->json($add);
    }
    public function show($id)
    {
        $post = Chambre::findOrFail($id);
        $post['category_id'] = $post->category->name;
        return response()->json($post);
    }

    public function addImage($id)
    {
        $post = Chambre::find($id);
        return view('admin.chambre.addimage',compact('post'));
    }

    public function postImage(AddImageRoomRequest $request,$id,Chambre $post)
    {
        $room = Chambre::find($id);
       $add = $request->validated();
        /** @var UploadedFile $image */
        $image =$request->validated('image');
        if($room->image){
            Storage::disk('public')->delete($room->image);
        }
        $add['image'] = $image->store('blog','public');
        $post->where('id',$id)->update($add);
        return to_route('room.index');
    }

}
