<div class="col">
    <div class="card">
        <div class="card-header">
            <h4>Edit Company</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update">
                @csrf
                <div class="row mb-3">
                    <div class="d-flex justify-content-between">
                        <a href="javascript:history.back()"><i class='bx bx-undo'></i> back</a>
                        <button class="btn btn-primary" type="submit">
                            <i class='bx bxs-save'></i> Save
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <h5>COMPANY INFORMATION</h5>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" wire:model="email" placeholder="example@mail.com">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Logo</label>
                        <input class="form-control" type="file" id="formFile" wire:model="logo"
                            accept=".jpg, .jpeg, .png"> <br>
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="120">
                        @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Website</label>
                        <input type="text" class="form-control" wire:model="website_link" placeholder="https://example.com">
                        @error('website_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
