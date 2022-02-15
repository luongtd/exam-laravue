<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Resources\TodoCollection;

class TodosController extends Controller
{
    public function index()
    {
        // $products = Todo::all()->toArray();
		$products = Todo::get();
        return TodoCollection::collection($products);   
    }
    public function add(Request $request)
    {
        // $product = new Todo([
			// 'content' => $request->content,
			// 'checked' => $request->checked,
			// 'completed' => $request->completed,
			// 'created_at' => now(),
			// 'updated_at' => now(),
            // 'name' => $request->input('name'),
            // 'detail' => $request->input('detail')
        // ]);
		
		$todo = new Todo();
		$todo->content = $request->content;
		$todo->checked = $request->checked;
		$todo->completed = $request->completed;
		$todo->created_at = now();
		$todo->updated_at = now();
		$todo->save();
		
        $products = Todo::get();
        return TodoCollection::collection($products);
    }
    public function remove(Request $request)
    {
        $todo = Todo::find($request->id)->delete();

        $products = Todo::get();
        return TodoCollection::collection($products);
    }
	public function removeAll(Request $request)
    {
		foreach ($request->params as $param) {
			if ($param['checked'] == 1) {
				$todo = Todo::where('id', $param['id'])->delete();
			}
		}

        $products = Todo::get();
        return TodoCollection::collection($products);
    }
	
	public function doneAll(Request $request)
    {
		// $ids = [];
		foreach ($request->params as $param) {
			if ($param['checked'] == 1) {
				// array_push($ids, $param['id']);
				$todo = Todo::where('id', $param['id'])->first();
				$todo->completed = 1;
				$todo->save();
			}
		}

        $products = Todo::get();
        return TodoCollection::collection($products);
    }
}
