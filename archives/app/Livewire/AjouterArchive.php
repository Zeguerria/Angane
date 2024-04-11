<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Archive;
use Exception;

class AjouterArchive extends Component
{
    public function save(){
        // try{
        //     Archive::create([

        //     ]);
        // }catch(Exception $e){

        // }
        toast('Your Post as been submited!','success');

        sleep(3);
    }
    public function render()
    {
        return view('livewire.ajouter-archive');
    }
}
