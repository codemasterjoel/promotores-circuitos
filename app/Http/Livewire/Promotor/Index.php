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

    public $modal, $formulario = false;
    public $promotores = null;
    public $nombre, $idPromotor = null;
    public $nombres, $apellidos, $telefono, $cedula, $email, $direccion, $genero, $fecha, $edad, $profesion, $circuito_id = null;

    public function render()
    {
        $circuitos = circuito::query()->paginate(10);
        return view('livewire.promotor.index', ['circuitos' => $circuitos]);
    }
    public function editar($id)
    {
        $this->limpiardatos();
        $circuito = circuito::findOrFail($id);
        $this->promotores = promotor::where('circuito_id', $id)->get();

        $this->circuito_id = $id;
        $this->nombre = $circuito->nombre;
        $this->formulario = false;
        $this->modal = true;
    }
    public function cerrarModal() 
    {
        $this->limpiardatos();
        $this->modal = false;
        // $this->integranteModal = false;
    }
    public function guardarPromotor()
    {
        // $this->validate([
        //     'nombres' =>'required',
        //     'apellidos' =>'required',
        // ]);

        $promotor = promotor::updateOrCreate(['id' => $this->idPromotor],
            [
                'cedula' => $this->cedula,
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'direccion' => $this->direccion,
                'genero' => $this->genero,
                'fecha' => $this->fecha,
                'edad' => $this->edad,
                'profesion' => $this->profesion,
                'circuito_id' => $this->circuito_id,
        ]);
         
         session()->flash('promotorGuardado', 'success');
         $this->resetPage($this->editar($this->circuito_id));

    }
    public function borrarPromotor($id)
    {
        promotor::find($id)->delete();
        session()->flash('promotorEliminado', 'success');
        $this->resetPage($this->editar($this->circuito_id));
    }
    public function consultarPromotor()
    {
        $existePromotor = promotor::where('cedula', '=', $this->cedula)->get();

        if (count($existePromotor) > 0)
        {
            session()->flash('yaregistrado', 'success');
            $this->limpiardatos();
            $this->formulario = false;
        }
        else {
            $this->formulario = true;
            session()->flash('noregistrado', 'success');
        }
    }
    public function limpiardatos()
    {
        $this->cedula = null;
        $this->nombres = null;
        $this->apellidos = null;
        $this->telefono = null;
        $this->email = null;
        $this->direccion = null;
        $this->genero = null;
        $this->fecha = null;
        $this->edad = null;
        $this->profesion = null;
        $this->circuito_id = null;
    }
}
