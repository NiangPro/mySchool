<div class="container col-md-5">
    <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                {{__('messages.form.editsale')}}
            </div>
            <div class="col-md-6 text-md-right">
                <button class="btn btn-dark btn-rounded" wire:click.prevent="back">{{__('messages.btn.back')}}</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" wire:submit.prevent="update">
                    <div class="form-group">
                        <label for="name">{{__('messages.form.name')}}</label>
                        <input type="text" name="name" class="form-control @error('form.name') is-invalid @enderror" id="libelle" placeholder="{{__('messages.form.name')}}..."  wire:model="form.name" >
                        @error('form.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="capacity">{{__('messages.form.capacity')}}</label>
                        <input type="number" name="capacity" class="form-control @error('form.capacity') is-invalid @enderror" id="capacity" placeholder="{{__('messages.form.capacity')}}..."  wire:model="form.capacity" >
                        @error('form.capacity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <button class="btn btn-success">{{__('messages.btn.edit')}}</button>
                    </div>
                </form>
    </div>
</div>
</div>
