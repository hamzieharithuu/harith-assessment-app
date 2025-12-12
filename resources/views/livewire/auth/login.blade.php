<div class="form-signin w-100 m-auto">
    <form wire:submit.prevent="login">
        @csrf
        <h3 class="mb-3 fw-bold">Please sign in</h3>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" wire:model="email"
                placeholder="name@example.com" />
            <label for="floatingInput"><i class='bx bx-envelope' ></i> Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" wire:model="password"
                placeholder="Password" />
            <label for="floatingPassword"><i class='bx bx-key' ></i> Password</label>
        </div>
        @error('email')
            <span class="text-danger">{{ $message }} <br></span>
        @enderror
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mb-3"></div>
        <button class="btn btn-primary w-100 py-2" type="submit">
            Sign in
        </button>
        <div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4 border-top" style="margin-bottom: 0rem !important; padding-bottom:0rem !important">
            <p>Muhammad Harith Hamzie Bin Abdul Latif &copy; 2025</p>
        </div>

    </form>
</div>
