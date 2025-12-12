<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyCreate extends Component
{
    use WithFileUploads;
    public $email = '', $name = '', $logo = null, $website_link = '';
    protected $rules = [
        'email' => 'required|email|unique:companies,email',
        'name' => 'required',
        'logo' => 'required|image|mimes:jpg,jpeg,png',
        'website_link' => 'required|url|unique:companies,website_link',
    ];
    protected $messages = [
        'email.required' => "*Company's email is required.",
        'email.email' => '*Please insert the valid email.',
        'email.unique' => "*Company's email is already used.",
        'name.required' => "*Company's name is required.",
        'logo.required' => "*Company's logo is required.",
        'logo.image' => "*File must be an image (.jpg/.jpeg/.png).",
        'logo.mimes' => "*File must be in format .jpg/.jpeg/.png.",
        'website_link.required' => "*Company's website link is required.",
        'website_link.unique' => "*Company's website link is already used.",
        'website_link.url' => "*Please fill in the correct website link."
    ];

    public function render()
    {
        return view('livewire.company-create')->layout('master');
    }

    public function save()
    {
        $this->validate();

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
            $path = $this->logo->storeAs('logos', $fileName, 'public');
        }
        Company::create([
            'name' => $this->name,
            'email' => $this->email,
            'website_link' => $this->website_link,
            'logo' => $path,
        ]);
        session()->flash('toast', [
            'status' => 'success',
            'title' => 'Success',
            'message' => 'Company created successfully'
        ]);
        $this->clear();
        return $this->redirect('/');
    }

    public function clear()
    {
        $this->email = '';
        $this->name = '';
        $this->logo = null;
        $this->website_link = '';
    }
}
