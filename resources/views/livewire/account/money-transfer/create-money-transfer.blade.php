<div>
    <div class="x_panel">
        <div class="x_title">
            <h2>New Money Transfer</h2>
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
                    <label class="font-weight-bold">From Account</label>
                    <select class="form-control" wire:model="from_account_id" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option  selected>Select From Account</option>
                        @foreach ($from_accounts as $from_account)
                         <option value="{{ $from_account->id }}">{{ $from_account->name }} ({{ $from_account->balance }})</option>
                        @endforeach
                    </select>
                
                    @error('from_account_id')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror                   
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">To Account</label>
                    <select class="form-control" wire:model="to_account_id" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option  selected>Select To Account</option>
                        @foreach ($to_accounts as $to_account)
                         <option value="{{ $to_account->id }}">{{ $to_account->name }} ({{ $to_account->balance }})</option>
                        @endforeach
                    </select>
                
                    @error('to_account_id')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror                   
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Amount</label>
                    <input type="number" class="form-control" wire:model.lazy="amount" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;">
                    @error('amount')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">Date</label>
                    <input type="date" class="form-control" wire:model.lazy="date" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;">
                    @error('date')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">Reference</label>
                    <input type="text" class="form-control" wire:model.lazy="reference" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;">
                    @error('reference')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">Transfer method</label>
                    <select class="form-control" wire:model="transfer_method" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option value="cash">Cash</option>
                        <option value="bank">Bank</option>
                        <option value="check">Check</option>
                        <option value="credit card">Credit Card</option>
                        <option value="debit card">Debit Card</option>
                        <option value="visa">Visa</option>
                        <option value="mastercard">Mastercard</option>
                        <option value="other">Other</option>
                    </select>   

                    @error('transfer_method')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>



                <div class="form-group">
                    <label class="font-weight-bold">Status</label>
                    <select class="form-control" wire:model="status" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option value="1">Cleared</option>
                        <option value="0">Uncleared</option>
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
                            Add Money Transfer
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
