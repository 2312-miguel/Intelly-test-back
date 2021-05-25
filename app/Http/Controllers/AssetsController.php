<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class AssetsController extends Controller
{
    public function index()
    {
        $modelUser = Auth::user();
        return Assets::where('id_user', $modelUser->id)->get();
    }

    public function show(Assets $assets, $id)
    {
        $result = Assets::select(
            'assets.name',
            'assets.date_purchase',
            'assets.date_register',
            'assets.description',
            'assets.value',
            'assets.image',
            'users.name as name_business'
        )->where('assets.id', $id)->join('users', 'users.id', '=', 'assets.id_user')->first();

        $imageData = Storage::get($result->image);

        $result->image = base64_encode($imageData);

        $result->makeHidden(['created_at', 'updated_at']);
        return response()->json($result, 200);
    }

    public function store(Request $request)
    {
        $path = $request->image->store('images');

        $modelUser = Auth::user();

        $model = new Assets();
        $model->attributes = $request->request->all();
        $model->id_user = $modelUser->id;
        $model->image = $path;
        $model->date_register = date("Y-m-d");
        $model->save();

        return response()->json($model, 201);
    }

    public function update(Request $request, $id)
    {
        $path = $request->image ? $request->image->store('images') : '';
        $modelUser = Auth::user();

        $model = Assets::find($id);

        $image = $model->image;

        $model->attributes = $request->request->all();
        $model->image = $path ? $path : $image;

        $model->id_user = $modelUser->id;
        $model->save();

        return response()->json(["status" => $model, "id" => $id], 200);
    }

    public function delete(Assets $assets)
    {
        $assets->delete();

        return response()->json(null, 204);
    }

    public function sendMail2(Request $request)
    {

        $modelUser = Auth::user();
        $email = $modelUser->email;
        $qr = $request->getContent();
        $qr = base64_decode(str_replace('data:image/png;base64,', '', $qr));
        $to_name = $email;
        $to_email = $email;
        $data = array("name" => "Escanea codigo", "code" => $qr);
        $response = Mail::send("codeQr", $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject("Intellytest - codigo IQ");
            $message->from("migueal.77210@gmail.com");
        });


        return response()->json(["status" => $response], 201);
    }
}
