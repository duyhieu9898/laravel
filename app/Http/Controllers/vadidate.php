<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class vadidate extends Controller
{
    //Validator::make($request,$pattern,$messenger,$customName);
    public function index(Request $request)
    {
        $validate = Validator::make(
            $request->all(),

            [
                'name' => 'Required|min:6|max:16',
                'age' => 'numeric|max:3',
                'email' => 'email',
            ],
            [
                'required' => ':attribute Không được để trống',
                'min' => ':attribute Không được nhỏ hơn :min',
                'max' => ':attribute Không được lớn hơn :max',
                'email' => ':attribute Không phải là emall',
                'numeric' => ':attribute Không phải là số',
            ],
            [
                'name' => 'Tên',
                'age' => 'Tuổi',
            ]
        );

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        } else {
            return redirect()->route('login-complete');
        }
    }
}
