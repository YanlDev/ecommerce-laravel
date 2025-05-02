<?php

namespace App\Http\Controllers\Admin;

use App\Models\Family;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::orderBy('id', 'desc')->paginate(10);
        return view('admin.families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.families.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validateData = $request->validate([
            'name' => 'required|string',

        ]);
        $family = Family::create($validateData);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'Familia creada correctamente',
            'draggable' => true,
        ]);
        return redirect()->route('admin.families.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        return view('admin.families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
//        dd($request->all());
        $validateData = $request->validate([
            'name' => 'required|string',
        ]);
        $family->update($validateData);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho',
            'text' => 'Familia actualizada exitosamente!',
            'draggable' => true,
        ]);

        return redirect()->route('admin.families.edit', $family);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        if ($family->categories->count() > 0) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Ups!',
                'text' => 'No se puede eliminar este Familia porque tiene productos asociados.',
            ]);
            return redirect()->route('admin.families.edit', $family);
        } else {
            $family->delete();
            session()->flash('swal', [
                'icon' => 'success',
                'title' => 'Bien Hecho',
                'text' => 'Familia eliminada correctamente!',
            ]);
            return redirect()->route('admin.families.index');
        }
    }
}
