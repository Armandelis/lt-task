<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Number;
use Illuminate\Support\Facades\Validator;


class NumberStackController extends Controller
{
    /**
     * Push a new number into the stack
     *
     * @param  \Illuminate\Http\NumberStackPushRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function push(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required|integer|min:1',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first('number')
            ],400);
            return redirect('post/create')
                        ->withErrors()
                        ->withInput();
        }


        $number = new Number();
        $number->number = $request->input('number');
        $number->save();

        return response()->json([
            'message' => 'Number (' . $request->input('number') . ') Saved!'
        ],200);
    }

    /**
     * Pop the latest number out of the stack
     *
     * @return \Illuminate\Http\Response
     */
    public function pop()
    {
        $number = Number::orderBy('id', 'DESC')->first();
        if ($number === null) {
            return response()->json([
                'message' => 'The Stack Is Empty'
            ],200);
        }
        $number->delete();

        return response()->json([
            'poppedNumber' => $number->translate()
        ],200);
    }
}
