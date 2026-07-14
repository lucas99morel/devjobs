<?php

namespace App\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class MostrarVacante extends Component
{
    #[On('eliminarVacante')]
    public function eliminarVacante($id)
    {   
        $vacante = Vacante::find($id);
        if($vacante){
            $vacante->delete();
            $this->dispatch('vacanteEliminada'); // avisa al frontend que SÍ se eliminó
        }
        // $this->authorize('delete', $this->vacante);
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id',Auth::user()->id)->paginate(5);
        return view('livewire.mostrar-vacante',[
            'vacantes' => $vacantes
        ]);
    } 
}
