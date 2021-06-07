<div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Create Account</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
        <div class="card-body">

            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Done!</strong> {{ session('success') }}
              </div>
              @endif

              @if (session()->has('error'))
              <div class="alert alert-danger alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Holy guacamole!</strong> {{ session('error') }}
              </div>
              @endif

            <form  wire:submit.prevent="add">
                <div class="form-group">
                    <label class="font-weight-bold">Account Name</label>
                    <input type="text" class="form-control" wire:model.lazy="name" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;">
                    @error('name')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Account Type</label>
                    <select class="form-control" wire:model="account_type_id" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option  selected>Select Account type</option>
                        @foreach ($account_types as $account_type)
                         <option value="{{ $account_type->id }}">{{ $account_type->name }}</option>
                        @endforeach
                    </select>
                
                    @error('account_type_id')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror                   
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Initial Balance</label>
                    <input type="number" class="form-control" wire:model.lazy="initial_balance" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                    @error('initial_balance')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">Account Number</label>
                    <input type="number" class="form-control" wire:model.lazy="account_number" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                    @error('account_number')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">Status</label>
                    <select class="form-control" wire:model="status" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>   

                    @error('status')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>




                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">
                        <span wire:loading wire:target="add">
                            <div class="spinner-border text-danger spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Loading...
                        </span>
                        <span wire:loading.remove wire:target="add">
                            Add Account
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
