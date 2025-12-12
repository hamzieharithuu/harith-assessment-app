<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CompanyList extends Component
{
    public $companies;
    public $id_company;
    public function render()
    {
        return view('livewire.company-list')->layout('master');
    }
    public function mount()
    {
        $this->getCompanies();
        $this->id_company = null;
    }
    public function getCompanies()
    {
        $this->companies = Company::all();
    }
    public function confirmDelete($id)
    {
        $this->id_company = $id;
        $this->dispatch('refreshDatatable');
        $this->dispatch('confirm-delete', id: $id);
    }
    public function delete()
    {
        $company = Company::find($this->id_company);
        if ($company) {
            if ($company->logo && Storage::disk('public')->exists($company->logo)) {
                Storage::disk('public')->delete($company->logo);
            }
            $company->delete();
        }
        $this->dispatch(
            'toastMagic',
            status: 'success',
            title: 'Success',
            message: "Company deleted successfully",
            options: [
                'showCloseBtn' => true
            ],
        );
        $this->mount();
        $this->dispatch('refreshDatatable');
    }
}
