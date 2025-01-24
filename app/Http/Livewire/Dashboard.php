<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Circuito as circuito;
use App\Models\Promotores as promotor;
use DB;

class Dashboard extends Component
{
    public $circuitos, $promotores, $distintos, $cargados = null;
    public $circuitoxparroquia, $circuitoxestatus, $circuitoxtipo, $circuitoxcategoria, $promotoresxcircuito = null;

    public function render()
    {
        $this->circuitos = circuito::all();
        $this->promotores = promotor::all();
        $this->cargados = DB::table('promotores')->distinct()->count('circuito_id');
        
        //dd($this->cargados);
        //$this->cargados = promotor::where('mision_id', auth()->User()->mision_id)->distint('circuito_id')->count();
        //$this->distintos = DB::select('SELECT count(DISTINCT(circuito_id)) FROM promotores where mision_id = :id', ['id' => auth()->User()->mision_id])->first();
        $this->promotoresxcircuito = DB::select('select parroquias.nombre as parroquias, circuitos.nombre as circuito, count(*) as promotores from circuitos INNER JOIN promotores ON circuitos.id = promotores.circuito_id INNER JOIN parroquias on parroquias.id = circuitos.parroquia_id and promotores.mision_id = :id GROUP BY parroquias.nombre, circuitos.nombre', ['id' => auth()->User()->mision_id]);
        // $this->circuitoxestatus = DB::select('SELECT COUNT(*) as circuitos, estatuses.nombre from consultas INNER JOIN estatuses on consultas.estatus_id = estatuses.id GROUP BY estatuses.nombre ORDER BY estatuses.nombre DESC');
        // $this->circuitoxtipo = DB::select('SELECT COUNT(*) as circuitos, tipos.nombre from consultas INNER JOIN tipos on consultas.tipo_id = tipos.id GROUP BY tipos.nombre ORDER BY tipos.nombre DESC');
        // $this->circuitoxcategoria = DB::select('SELECT COUNT(*) as circuitos, categorias.nombre from consultas INNER JOIN categorias on consultas.tipo_id = categorias.id GROUP BY categorias.nombre ORDER BY categorias.nombre DESC');
        return view('livewire.dashboard');
    }
}
