<div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Create Expense</h2>
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
                    <label class="font-weight-bold">Date</label>
                    <input type="date" class="form-control" wire:model.lazy="date" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;">
                    @error('date')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Expense Type</label>
                    <select class="form-control" wire:model="expense_type_id" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option  selected>Select Expense Type</option>
                        @foreach ($expense_types as $expense_type)
                         <option value="{{ $expense_type->id }}">{{ $expense_type->name }}</option>
                        @endforeach
                    </select>
                
                    @error('expense_type_id')
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
                    <label class="font-weight-bold">Reference</label>
                    <input type="reference" class="form-control" wire:model.lazy="reference" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;">
                    @error('reference')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">Expense Reason</label>
                    <textarea class="form-control" wire:model.lazy="expense_reason" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                    @error('expense_reason')
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
                            Add Expense
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
