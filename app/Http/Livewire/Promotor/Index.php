<?php

namespace App\Http\Livewire\Promotor;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Circuito as circuito;
use App\Models\Promotores as promotor;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $modal=false;
    public $promotores, $nombre, $nombre_completo, $telefono, $cedula, $idPromotor, $circuito_id= null;

    public function render()
    {
        $circuitos = circuito::query()->paginate(10);
        return view('livewire.promotor.index', ['circuitos' => $circuitos]);
    }
    public function editar($id)
    {
        $circuito = circuito::findOrFail($id);
        $this->promotores = promotor::where('circuito_id', $id)->get();

        $this->circuito_id = $id;
        $this->nombre = $circuito->nombre;
        $this->modal = true;
    }
    public function cerrarModal() 
    {
        $this->modal = false;
        // $this->integranteModal = false;
    }
    public function guardarPromotor()
    {
        $promotor = promotor::updateOrCreate(['id' => $this->idPromotor],
            [
                'cedula' => $this->cedula,
                'nombre_completo' => $this->nombre_completo,
                'circuito_id' => $this->circuito_id,
                'telefono' => $this->telefono,
        ]);
         
         session()->flash('integranteGuardado', 'success');
         $this->resetPage($this->editar($this->circuito_id));
    }
}
