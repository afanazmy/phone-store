<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;
use App\User;
use App\Phone;

class PhoneController extends Controller
{
    public function index(Request $request)
    {
        $brand = $request->input('brand');
        $model = $request->input('model');

        if ($brand && $model) {
            $phones = Phone::where('brand', $brand)
                            ->where('model', $model)
                            ->get();

            return response()->json([
                'status' => 'success',
                'result' => $phones
            ]);
        } elseif ($brand) {
            $phones = Phone::where('brand', $brand)->get();

            return response()->json([
                'status' => 'success',
                'result' => $phones
            ]);
        } elseif ($model) {
            $phones = Phone::where('model', $model)->get();

            return response()->json([
                'status' => 'success',
                'result' => $phones
            ]);
        } else {
            $phones = Phone::all();

            return response()->json([
                'status' => 'success',
                'result' => $phones
            ]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand'     => 'required',
            'model'     => 'required|unique:phones'
        ]);

        $phone = Phone::create([
            'brand' => $request->input('brand'),
            'model' => $request->input('model')
        ]);

        if ($phone) {
            return response()->json([
                'status' => 'success',
                'result' => $phone
            ]);
        } else {
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Something wrong!'
            ]);
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id'        => 'required',
            'brand'     => 'required',
            'model'     => 'required|unique:phones'
        ]);

        $phone = Phone::where('id', $request->input('id'))->first();

        if (!$phone) {
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Phone not found.'
            ]);
        }

        $phone->model = $request->input('model');
        $phone->brand = $request->input('brand');
        $phone->save();

        if ($phone) {
            return response()->json([
                'status' => 'success',
                'result' => $phone
            ]);
        } else {
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Something wrong!'
            ]);
        }

    }

    public function destroy(Request $request)
    {
        $this->validate($request, [
            'id'        => 'required'
        ]);

        $phone = Phone::where('id', $request->input('id'))->first();

        if (!$phone) {
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Phone not found.'
            ]);
        }

        $phone->delete();

        if ($phone) {
            return response()->json([
                'status' => 'success',
                'result' => $phone
            ]);
        } else {
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Something wrong!'
            ]);
        }
    }
}
