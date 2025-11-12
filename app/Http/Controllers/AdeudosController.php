<?php

namespace App\Http\Controllers;

use App\Models\Adeudos;
use Illuminate\Http\Request;

class AdeudosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $adeudos = Adeudos::all();
        
        // Retornar la vista con los datos
        return view('adeudos.index', compact('adeudos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adeudos.create');
    }

    /**
     * Store a newly created resource in storage.
     * Función CREATE - Guardar nuevo adeudo
     */
    public function store(Request $request)
    {
       
        //
        $validatedData = $request->validate([
            'no_de_control'=> 'required|string|max:10',
            'tipo'=> 'required|string|max:255',
            'periodo'=> 'required|string|max:10',
            'laboratorio'=> 'required|string|max:50',
            'costo'=> 'required|numeric',
            'fecha'=> 'required|date',
            'descripcion'=> 'required|string|max:255',
            'clave_area'=> 'required|string|max:6',
        ],[
            'no_de_control.required'=> 'El numero de control es obligatorio',
            'tipo.required'=> 'El tipo es obligatorio',
            'periodo.required'=> 'El periodo es obligatorio',
            'laboratorio.required'=> 'El laboratorio es obligatorio',
            'costo.required'=> 'El costo es obligatorio',
            'fecha.required'=> 'La fecha es obligatoria',
            'descripcion.required'=> 'La descripcion es obligatoria',
            'clave_area.required'=> 'La clave area es obligatoria',
        ]);
        try {
            
            Adeudos::create($validatedData);

            return redirect()
                ->route('adeudos.index')
                ->with('success', 'Adeudo creado con exito');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear el adeudo:' . $e->getMessage());
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $adeudos = Adeudos::findOrFail($id);
        return view('adeudos.show', compact('adeudos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $adeudos = Adeudos::findOrFail($id);
        return view('adeudos.edit', compact('adeudos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $adeudos = Adeudos::findOrFail($id);

        // Validar los datos (id no se puede modificar)
        $validatedData = $request->validate([
            'no_de_control'=> 'required|string|max:10',
            'tipo'=> 'required|string|max:255',
            'periodo'=> 'required|string|max:10',
            'laboratorio'=> 'required|string|max:50',
            'costo'=> 'required|numeric',
            'fecha'=> 'required|date',
            'descripcion'=> 'required|string|max:255',
            'clave_area'=> 'required|string|max:6',
        ],[
            'no_de_control.required'=> 'El numero de control es obligatorio',
            'tipo.required'=> 'El tipo es obligatorio',
            'periodo.required'=> 'El periodo es obligatorio',
            'laboratorio.required'=> 'El laboratorio es obligatorio',
            'costo.required'=> 'El costo es obligatorio',
            'fecha.required'=> 'La fecha es obligatoria',
            'descripcion.required'=> 'La descripcion es obligatoria',
            'clave_area.required'=> 'La clave area es obligatoria',
        ]);

        try {
            // Actualizar la Adeudos
            $adeudos->update($validatedData);

            return redirect()
                ->route('adeudos.index')
                ->with('success', 'Adeudos actualizado exitosamente');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al actualizar el Adeudo: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $adeudos = Adeudos::findOrFail($id);
            $no_de_control = $adeudos->no_de_control;

            $adeudos->delete();

                        return redirect()
                ->route('adeudos.index')
                ->with('success', "El adeudo '$no_de_control' fue eliminado exitosamente");
        } catch (\Exception  $e) {
            return redirect()
            ->route('adeudos.index')
            ->with('error', 'Error al eliminar el adeudo: ' . $e->getMessage());
        }
    }
}
