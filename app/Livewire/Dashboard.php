<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $currentView = 'index';
    public $id_company = null;

    public function render()
    {
        return view('livewire.dashboard');
    }
    public function showCompanyTable()
    {
        $this->currentView = 'index';
        $this->id_company = null;
        $this->dispatch('refreshDatatable');
    }

    public function showCreateForm()
    {
        $this->currentView = 'create';
    }

    public function showEditForm($id)
    {
        $this->currentView = 'edit';
        $this->id_company = $id;
    }
}
