<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Electronic;

class ElectronicsController extends Controller
{
    public function index(){
        $electronics = Electronic::all();
        return view('student.allelectronics',compact('electronics'));
    }
    public function getelectronics(Request $request){
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $electronics = Electronic::where('name','like','%'.$query.'%')->get();
            }
            else{
                $electronics = Electronic::all(); 
            }
            $total = $electronics->count();
            if($total>0){
                foreach ($electronics as $electronic) {
                    $output .= "<tr id='eid".$electronic->id."'><td><input type='checkbox' name='ids' class='checker' value='".$electronic->id."'> </td><td class='px-6 py-4'><p>".$electronic->name."</p></td><td class='px-6 py-4'><p>".$electronic->desc."</p></td><td class='px-6 py-4 text-center'> <a type='button' onclick='editelectronic(".$electronic->id.")' class='bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin'>Edit</a> <a  class='bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin'>Remove</a></td></tr>";
                }
            }
            else{
                $output = "<tr> <td colspan='3'> <a class='block hover:bg-gray-50'> <div class='px-4 py-4 sm:px-6'><div class='flex items-center justify-between'> <p class='text-sm font-thin text-gray-700 truncate'> No Electronics Found</p></div></div></a></td></tr>";
            }
            $data = array('tabledata'=> $output);
            return response()->json($data);
        }
    }
    public function editelectronic($id){
        $electronic = Electronic::find($id);
        return response()->json($electronic);
    }
    public function addelectronic(Request $request){
        $electronic = Electronic::create([
            'name'=> $request->name,
            'desc'=> $request->desc
        ]);
        return response()->json($electronic);
    }
    public function delelectronic(Request $request,$eid){
        $electronic = Electronic::find($eid);
        $electronic->delete();
        return response()->json(['success'=>'Electronic deleted successfully!!!']);
    }
    public function delelectronics(Request $request){
        Electronic::whereIn('id',$request->ids)->delete();
        return response()->json(['success'=>'Electronics deleted successfully!!!']);
    }
    public function updateelectronic(Request $request){
        $electronic = Electronic::find($request->id);
        $electronic->name = $request->name;
        $electronic->desc = $request->desc;
        $electronic->save();
        return response()->json($electronic);
    }
}