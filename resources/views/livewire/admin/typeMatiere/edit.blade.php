<div class="container col-md-6">
    <div class="card mb-3">
            <div class="card-body">
                <div class="row mt-2 mb-4">
                    <div class="col-md-8">
                        <span class="text-capitalize">{{__('messages.form.editsubjecttype')}}</span>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <button class="btn btn-dark btn-rounded" wire:click="back">{{__('messages.btn.back')}}</button>
                    </div>

                </div>

                <form method="POST" wire:submit.prevent="store">
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
                        <button class="btn btn-warning btn-rounded">{{__('messages.btn.edit')}}</button>
                    </div>
                </form>

            </div>
    </div>
</div>

