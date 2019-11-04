<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getAll()
    {
        $data = [
            ["id" => 1, "title" => "title 1", "message" => "message 1"],
            ["id" => 2, "title" => "title 2", "message" => "message 2"],
            ["id" => 3, "title" => "title 3", "message" => "message 3"],
            ["id" => 4, "title" => "title 4", "message" => "message 4"],
            ["id" => 5, "title" => "title 5", "message" => "message 5"],
        ];
        return $this->ok(["data" => $data]);
    }

    public function find($id)
    {
        $data = ["id" => $id, "title" => "title $id", "message" => "message $id"];
        return $this->ok(["data" => $data]);
    }

    public function  create()
    {
        $data = [
            "id" => "6",
            "title" => $this->request->input('tittle'),
            "message" => $this->request->input('message')
        ];
        return $this->ok(["data" => $data]);
    }

    public function  update($id)
    {
        $data = [
            "id" => $id,
            "title" => $this->request->input('tittle'),
            "message" => $this->request->input('message')
        ];
        return $this->ok(["data" => $data]);
    }

    public function delete($id)
    {
        $data = [
            "id" => $id,
            "title" => "title $id",
            "message" => "message $id"
        ];
        return $this->ok(["data" => $data]);
    }



    protected function ok($payload = [])
    {
        $defaultPayload = ['ok' => true];
        return response()->json(array_merge($defaultPayload, $payload), 200);
    }

    protected function badRequest($error)
    {
        $payload = [
            'ok' => 'false',
            'error' => $error,
        ];
        return response()->json($payload, 400);
    }
}
