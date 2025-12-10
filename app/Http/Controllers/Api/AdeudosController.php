<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdeudoResource;
use App\Models\Adeudos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AdeudosController extends Controller
{
    public function index(Request $request)
    {
        $query = Adeudos::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('no_de_control', 'like', "%{$search}%")
                  ->orWhere('tipo', 'like', "%{$search}%")
                  ->orWhere('laboratorio', 'like', "%{$search}%");
            });
        }

        $query->orderBy(
            $request->get('sort_by', 'id'),
            $request->get('sort_order', 'asc')
        );

        $adeudos = $query->paginate($request->get('per_page', 15));

        return AdeudoResource::collection($adeudos);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_de_control'=> 'required|string|max:10',
            'tipo'=> 'required|string|max:255',
            'periodo'=> 'required|string|max:10',
            'laboratorio'=> 'required|string|max:50',
            'costo'=> 'required|numeric',
            'fecha'=> 'required|date',
            'descripcion'=> 'required|string|max:255',
            'clave_area'=> 'required|string|max:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $adeudo = Adeudos::create($request->all());

        return response()->json([
            'success' => true,
            'data' => new AdeudoResource($adeudo)
        ], Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $adeudo = Adeudos::find($id);

        if (!$adeudo) {
            return response()->json([
                'success' => false,
                'message' => 'Adeudo no encontrado'
            ], Response::HTTP_NOT_FOUND);
        }

        return new AdeudoResource($adeudo);
    }

    public function update(Request $request, int $id)
    {
        $adeudo = Adeudos::find($id);

        if (!$adeudo) {
            return response()->json([
                'success' => false,
                'message' => 'Adeudo no encontrado'
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'no_de_control'=> 'sometimes|string|max:10',
            'tipo'=> 'sometimes|string|max:255',
            'periodo'=> 'sometimes|string|max:10',
            'laboratorio'=> 'sometimes|string|max:50',
            'costo'=> 'sometimes|numeric',
            'fecha'=> 'sometimes|date',
            'descripcion'=> 'sometimes|string|max:255',
            'clave_area'=> 'sometimes|string|max:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $adeudo->update($request->all());

        return response()->json([
            'success' => true,
            'data' => new AdeudoResource($adeudo)
        ]);
    }

    public function destroy(int $id)
    {
        $adeudo = Adeudos::find($id);

        if (!$adeudo) {
            return response()->json([
                'success' => false,
                'message' => 'Adeudo no encontrado'
            ], Response::HTTP_NOT_FOUND);
        }

        $adeudo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Adeudo eliminado correctamente'
        ]);
    }
}
