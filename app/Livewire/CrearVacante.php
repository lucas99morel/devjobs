<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{   
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads; //para permitir alzar imagenes

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:2048'
    ];

    public function crearVacante(){
        $datos = $this->validate();

        $img = $this->imagen->store('vacantes', 'public');
        $datos['imagen'] = str_replace('vacantes/','',$img);
        
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('vacantes.index')
            ->with('mensaje','Vacante creada con exito!');
    }

    public function render()
    {   
        $salarios = Salario::all();
        $categorias = Categoria::all();
        
        return view('livewire.crear-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
