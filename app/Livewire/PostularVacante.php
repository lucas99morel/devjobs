<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    use WithFileUploads;
    public function postularme(){
        $datos = $this->validate();

        $cv = $this->cv->store('cv', 'public');
        $datos['cv'] = str_replace('cv/','',$cv);

        $this->vacante->candidatos()->create([
            'user_id' => Auth::user()->id,
            'cv' => $datos['cv']
        ]);
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, Auth::user()->id));

        return redirect()->back()
            ->with('mensaje','Informacion enviada, Mucha Suerte!');
    }

    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
