<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\Parroquia;
use App\Models\Mision;
use App\Models\Nivel;

use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $modal, $estado, $mostrar, $integranteModal, $showPassword = false;
    public $search = "";
    public $id = null;
    public $parroquias  = null; // Lista de parroquias
    public $misiones, $niveles = null; //Areas
    public $name = null; //usuario
    public $email = null; //Correo
    public $password = null; //Contrasena
    public $parroquiaId, $misionId, $nivelId = null; //Id que recibo de los campos

    public function render()
    {
        $this->misiones = Mision::all();
        $this->niveles = Nivel::all();
        $usuarios = User::query()->paginate(5);
        return view('livewire.usuario.index', ['usuarios' => $usuarios]);
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->showPassword = true;
        $this->abrirModal();
    }
    public function abrirModal() 
    {
        $this->modal = true;
    }
    public function cerrarModal() 
    {
        $this->modal = false;
    }
    public function editar($id)
    {
        $usuario = User::findOrFail($id);

        $this->parroquias = Parroquia::all();

        // dd(decrypt($usuario->password));

        $this->id = $id;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->areaId = $usuario->area_id;
        $this->nivelId = $usuario->nivel_id;
        $this->estadoId = $usuario->estado_id;
        $this->municipioId = $usuario->municipio_id;
        $this->parroquiaId = $usuario->parroquia_id;
        $this->password = $usuario->password;

        $this->modal = true;
        
    }
    public function guardar()
    {
        if ($this->nivelId = 1) {
            $this->estadoId = 25;
        }
        if ($this->showPassword) {
            $this->password = bcrypt($this->password);
        }

        $usuario = User::updateOrCreate(['id' => $this->id],
        [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'area_id' => $this->areaId,
            'nivel_id' => $this->nivelId,
            'estado_id' => $this->estadoId,
            'municipio_id' => $this->municipioId,
            'parroquia_id' => $this->parroquiaId,
        ]);
     
        session()->flash('success', 'success');
        
        $this->cerrarModal();
        $this->limpiarCampos();
    }
    public function cerrarFormulario()
    {
        $this->limpiarCampos();
        $this->mostrar = false;
    }
    public function limpiarCampos()
    {
        $this->name = null;
        $this->email = null;
        $this->areaId = null;
        $this->nivelId = null;
        $this->estadoId = null;
        $this->municipioId = null;
        $this->parroquiaId = null;
        $this->password = null;
    }
    public function updatedNivelId($id)
    {
        if ($id == 3)
        {
            $this->parroquiaId = null;
            $this->parroquias = Parroquia::where('parroquia_id', '<', '20000')->get();
        }else
        {
            $this->parroquiaId = null;
            $this->parroquias = null;
        }
    }
    public function borrar($id)
    {
        User::find($id)->delete();
        session()->flash('integranteEliminado', 'success');
    }   
}
