<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ping;
use Carbon\Carbon;

class Pinggraphic extends Component
{
    public $pingData;

    public function mount()
    {
        $this->pingData = $this->fetchPingData();
    }

    public function render()
    {
        return view('livewire.pinggraphic', [
            'pingData' => $this->pingData,
        ]);
    }
    
    public function refresh()
    {
                // Actualiza los datos de ping
            $this->pingData = $this->fetchPingData();
        
            // Envía los datos actualizados al frontend para refrescar el gráfico
            $this->dispatchBrowserEvent('updateChartData', ['pingData' => $this->pingData]);
    }

    private function fetchPingData($startDate = null)
    {
        $query = Ping::query();
        
        if ($startDate) {
            $query->where('date', '>=', $startDate);
        }
        
        $data = $query->get(['date', 'ptime']); // Ajusta según tus columnas
        return $data;
    }
}
