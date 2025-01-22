<?php

namespace App\Http\Livewire\Promotor;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Circuito as circuito;
use App\Models\Promotores as promotor;

class Index extends Component
{
    use WithPagination;

    public $modal=false;

    public function render()
    {
        $circuitos = circuito::query()->paginate(10);
        return view('livewire.promotor.index', ['circuitos' => $circuitos]);
    }
    public function editar($id)
    {
        $circuito = circuito::findOrFail($id);
        $promotores = promotor::where('circuito_id', $id)->get();

        $this->id = $id;
        $this->nombre = $circuito->nombre;
        $this->proyecto_uno = $circuito->proyecto_uno;
        $this->codigo_centro = $circuito->codigo_centro;
        $this->centro = $circuito->centro;
        $this->codigo_comuna = $circuito->codigo_comuna;
        $this->parroquia_id = $circuito->parroquia_id;

        session()->flash('success', 'success');

        $this->modal = true;
    }
}
