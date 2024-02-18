<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class ShowCharts extends Component
{
    public $chartProduct = 'sellingDesc';
    public $chartSales = 'year';

    public function render()
    {
        return view('livewire.dashboard.show-charts');
    }
}
