<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index() {
        return Shift::all();
    }

    public function store(Request $request) {
        return Shift::create($request->all());
    }

    public function show(Shift $shift) {
        return $shift;
    }

    public function update(Request $request, Shift $shift) {
        $shift->update($request->all());
        return $shift;
    }

    public function destroy(Shift $shift) {
        $shift->delete();
        return response()->json(['message'=>'deleted']);
    }
}

