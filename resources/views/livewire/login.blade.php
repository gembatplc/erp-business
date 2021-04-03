<div>
    <div class="animate form login_form">
        <section class="login_content">
          <form method="POST"  wire:submit.prevent="login">
            @csrf
            <h1>Login Form</h1>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div>
              <input type="email" class="form-control @error('email') text-danger bad-item @enderror" wire:model="email" placeholder="email" name="email" required="" />
              @error('email')
                   <span class="text-danger float-left" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
               @enderror
            </div>
              
            <div>
              <input type="password" class="form-control @error('password') text-danger bad-item @enderror" wire:model="password" placeholder="Password" name="password" required="" />
                @error('password')
                    <span class="text-danger float-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="checkbox text-left">
              <label>
                <input type="checkbox" wire:model="remember" class="flat" checked="checked"> Remember Me
              </label>
            </div>
              
            <div>
              <button class="btn btn-success submit float-left" type="submit">
                  <span wire:loading.remove wire:.target="login">
                      Login
                  </span>
                  <span wire:loading wire:target="login">
                      Processing...
                  </span>
              </button>
              {{-- @if (Route::has('password.request'))
              <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
               @endif --}}
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link text-left">New to site?
                <a href="#signup" class="to_register"> Create Account </a>
              </p>

              {{-- <div class="clearfix"></div>
              <br /> --}}

              {{-- <div>
                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
              </div> --}}
            </div>
          </form>
        </section>
      </div>
</div>
