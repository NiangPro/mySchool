<div class="container col-md-5">
    <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                {{__('messages.form.editclasse')}}
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
                        <label for="libelle">{{__('messages.form.libelle')}}</label>
                        <input type="text" name="libelle" class="form-control @error('form.libelle') is-invalid @enderror" id="libelle" placeholder="{{__('messages.form.libelle')}}..."  wire:model="form.libelle" >
                        @error('form.libelle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <button class="btn btn-success btn-rounded">{{__('messages.btn.edit')}}</button>
                    </div>
                </form>
    </div>
</div>
</div>
