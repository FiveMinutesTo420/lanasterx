<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __invoke($catalog_slug, $item_slug)
    {
        $product = Product::where("slug", $item_slug)->firstOrFail();
        return view('item', compact('product'));
    }

    public function showCatalog(Request $request){

        $match = array();
        $match[] = ['in_stock', '>', 0];
        $hasParams = false;
        if ($request->has('from_price') && $request->has('to_price')) {
            $hasParams = true;
            $match[] = ['price', '<=', $request->get('to_price')];
            $match[] = ['price', '>=', $request->get('from_price')];
        }



        if ($hasParams == true) {
            $items = Product::where($match)->get();
        } else {
            $items = Product::orderBy('id','DESC')->get();
        }
        if ($items->count() == 0) {
            $cheapiest = 0;
            $expensive = 0;
        } else {
            $cheapiest = $items->sortBy('price')->first()->price;
            $expensive = $items->sortByDesc('price')->first()->price;
        }

        if ($request->has('price') && $request->has('new')) {
            if ($request->price == 'expensive' && $request->new == 'new') {
                $items = $items->sortByDesc('price')->sortByDesc('id');
            }
            if ($request->price == 'cheap' && $request->new == 'new') {
                $items = $items->sortBy('price')->sortByDesc('id');
            }
            if ($request->price == 'expensive' && $request->new == 'old') {
                $items = $items->sortByDesc('price')->sortBy('id');
            }
            if ($request->price == 'cheap' && $request->new == 'old') {
                $items = $items->sortBy('price')->sortBy('id');
            }
        } else {
            if ($request->has('price')) {
                if ($request->price == 'expensive') {
                    $items = $items->sortByDesc('price');
                } else {
                    $items = $items->sortBy('price');
                }
            }
            if ($request->has('new')) {
                if ($request->new == 'new') {
                    $items = $items->sortByDesc('id');
                } else {
                    $items = $items->sortBy('id');
                }
            }
        }



        return view('catalog', ['items' => $items, 'title' => "Каталог",   'cheapiest' => $cheapiest, 'expensive' => $expensive]);
  
    }
    public function showCategory(Request $request, $category)
    {
        if ($category_object = Category::where('slug', $category)->first()) {

            $match = array();
            $match['category_id'] = $category_object->id;
            $match[] = ['in_stock', '>', 0];
            $hasParams = false;
            if ($request->has('from_price') && $request->has('to_price')) {
                $hasParams = true;
                $match[] = ['price', '<=', $request->get('to_price')];
                $match[] = ['price', '>=', $request->get('from_price')];
            }

 

            if ($hasParams == true) {
                $items = Product::where($match)->get();
            } else {
                $items = Product::where('category_id', $category_object->id)->where('in_stock', '>', 0)->get();
            }
            if ($items->count() == 0) {
                $cheapiest = 0;
                $expensive = 0;
            } else {
                $cheapiest = $items->sortBy('price')->first()->price;
                $expensive = $items->sortByDesc('price')->first()->price;
            }

            if ($request->has('price') && $request->has('new')) {
                if ($request->price == 'expensive' && $request->new == 'new') {
                    $items = $items->sortByDesc('price')->sortByDesc('id');
                }
                if ($request->price == 'cheap' && $request->new == 'new') {
                    $items = $items->sortBy('price')->sortByDesc('id');
                }
                if ($request->price == 'expensive' && $request->new == 'old') {
                    $items = $items->sortByDesc('price')->sortBy('id');
                }
                if ($request->price == 'cheap' && $request->new == 'old') {
                    $items = $items->sortBy('price')->sortBy('id');
                }
            } else {
                if ($request->has('price')) {
                    if ($request->price == 'expensive') {
                        $items = $items->sortByDesc('price');
                    } else {
                        $items = $items->sortBy('price');
                    }
                }
                if ($request->has('new')) {
                    if ($request->new == 'new') {
                        $items = $items->sortByDesc('id');
                    } else {
                        $items = $items->sortBy('id');
                    }
                }
            }



            return view('catalog', ['items' => $items, 'title' => $category_object->name, 'category' => $category_object,  'cheapiest' => $cheapiest, 'expensive' => $expensive]);
        } else {
            abort(404);
        }
    }
}
