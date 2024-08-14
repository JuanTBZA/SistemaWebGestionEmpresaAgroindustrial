<?php

namespace App\View\Components;

use Illuminate\View\Component;

class buscarParcela extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $search = request('search');
        $parcelas = Parcela::where('NombreParcela', 'LIKE', "%$search%")
            ->orWhere('Ubicacion', 'LIKE', "%$search%")
            ->get();

        return view('components.buscar-parcela', compact('parcelas'));

    }
}
