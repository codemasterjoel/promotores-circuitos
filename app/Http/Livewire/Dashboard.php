<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Circuito as circuito;
use App\Models\Promotores as promotor;
use DB;

class Dashboard extends Component
{
    public $circuitos, $promotores, $distintos, $cargados = null;
    public $circuitoxparroquia, $circuitoxestatus, $generos, $circuitoxcategoria, $promotoresxcircuito, $promotoresxmisiones = null;

    public function render()
    {
        $this->circuitos = circuito::all();
        $this->promotores = promotor::all();
        $this->cargados = DB::table('promotores')->distinct()->count('circuito_id');
        
        $this->promotoresxmisiones = DB::select('select misions.nombre, count(*) as total from misions inner join promotores on misions.id = promotores.mision_id group by misions.nombre order by total DESC');
        $this->promotoresxcircuito = DB::select('select parroquias.nombre as parroquias, circuitos.nombre as circuito, count(*) as promotores from circuitos INNER JOIN promotores ON circuitos.id = promotores.circuito_id INNER JOIN parroquias on parroquias.id = circuitos.parroquia_id and promotores.mision_id = :id GROUP BY parroquias.nombre, circuitos.nombre', ['id' => auth()->User()->mision_id]);
        $this->generos = DB::select('select genero, count(*) as total from promotores group by genero');
        // $this->circuitoxtipo = DB::select('SELECT COUNT(*) as circuitos, tipos.nombre from consultas INNER JOIN tipos on consultas.tipo_id = tipos.id GROUP BY tipos.nombre ORDER BY tipos.nombre DESC');
        // $this->circuitoxcategoria = DB::select('SELECT COUNT(*) as circuitos, categorias.nombre from consultas INNER JOIN categorias on consultas.tipo_id = categorias.id GROUP BY categorias.nombre ORDER BY categorias.nombre DESC');
        return view('livewire.dashboard');
    }
}
