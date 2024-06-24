<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\appointment;
class HomeController extends Controller
{
    public function __invoke()
    {
        $bestItems = Product::inRandomOrder()->limit(3)->get();
        return view('home',compact('bestItems'));
    }
    public function zapis(){
        return view('zapis');
    }
    public function zapisAdd(Request $request){
        $data = ['name'=>$request->get('name'),'number'=>$request->get('number'),'age'=>$request->get('age'),'count'=>$request->get('count')];
        appointment::create($data);
        return to_route('zapis')->with(['success' => 'Ваша заявка была отправлена']);
    }
}
