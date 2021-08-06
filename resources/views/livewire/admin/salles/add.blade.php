<!-- Signup modal content -->
<div id="add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <span class="text-capitalize">{{__('messages.form.addsalle')}}</span>
                    <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
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
                        <label for="capacity">{{__('messages.form.capacity')}}</label>
                        <input type="number" name="capacity" class="form-control @error('form.capacity') is-invalid @enderror" id="capacity" placeholder="{{__('messages.form.capacity')}}..."  wire:model="form.capacity" >
                        @error('form.capacity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <button class="btn btn-success btn-rounded">{{__('messages.btn.add')}}</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

