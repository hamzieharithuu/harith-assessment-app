<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyEdit extends Component
{
    use WithFileUploads;
    public $id = null, $email = '', $name = '', $logo = null, $website_link = '', $path = '';
    public $company;
    public function render()
    {
        return view('livewire.company-edit')->layout('master');
    }
    public function mount($id)
    {
        $this->company = Company::where('id', $id)->first();
        $this->id = $this->company->id;
        $this->name = $this->company->name;
        $this->email = $this->company->email;
        $this->path = $this->company->logo;
        $this->website_link = $this->company->website_link;
    }

    public function update()
    {
        $this->validate([
            'email' => 'required|email|unique:companies,email' . $this->company->id,
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png',
            'website_link' => 'required|url|unique:companies,website_link' . $this->company->id,
        ], [
            'email.required' => "*Company's email is required.",
            'email.email' => '*Please insert the valid email.',
            'email.unique' => "*Company's email is already used.",
            'name.required' => "*Company's name is required.",
            'logo.image' => "*File must be an image (.jpg/.jpeg/.png).",
            'logo.mimes' => "*File must be in format .jpg/.jpeg/.png.",
            'website_link.required' => "*Company's website link is required.",
            'website_link.unique' => "*Company's website link is already used.",
            'website_link.url' => "*Please fill in the correct website link."
        ]);

        if ($this->logo != null) {
            $img = getimagesize($this->logo->getRealPath());
            $width = $img[0];
            $height = $img[1];

            $originalName = pathinfo($this->logo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $this->logo->getClientOriginalExtension();
            $fileName = $originalName . '_' . time() . '.' . $extension;

            if ($width < 100 || $height < 100) {
                $this->addError('logo', 'Logo must be at least 100x100 pixels.');
                return;
            } else {
                if(Storage::disk('public')->exists($this->path)){
                    Storage::disk('public')->delete($this->path);
                }
                $this->path = $this->logo->storeAs('logos', $fileName, 'public');
            }
        }

        Company::where('id', $this->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'logo' => $this->path,
            'website_link' => $this->website_link,
        ]);

        session()->flash('toast', [
            'status' => 'success',
            'title' => 'Success',
            'message' => 'Company updated successfully'
        ]);
        return $this->redirect('/');
    }
}
