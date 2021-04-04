<div>
    <div class="card">
        <div class="card-header">
            Create New Depertment
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            <form  wire:submit.prevent="add">
                <div class="form-group">
                    <input class="form-control" wire:model.lazy="name" type="text" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
                    @error('name')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control" wire:model.lazy="description" rows="3" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                    @error('description')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">
                        <span wire:loading wire:target="add">
                            Processing..
                        </span>
                        <span wire:loading.remove wire:target="add">
                            Add Department
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
