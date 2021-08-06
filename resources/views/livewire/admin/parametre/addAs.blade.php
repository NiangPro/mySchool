<!-- Signup modal content -->
<div id="add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <span class="text-capitalize">{{__('messages.sidebar.schoolyear')}}</span>
                    <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                </div>

                <form method="POST" wire:submit.prevent="storeAnSco">
                    <div class="form-group">
                        <label for="">{{__('messages.sidebar.opening')}}</label>
                                    <input type="date" class="form-control @error('formAs.debut') is-invalid @enderror" wire:model="formAs.debut">
                                    @error('formAs.debut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.validation.required') }}</strong>
                                            </span>
                                    @enderror
                    </div>
                     <div class="form-group">
                        <label for="">{{__('messages.sidebar.closure')}}</label>
                                    <input type="date" class="form-control @error('formAs.fin') is-invalid @enderror" wire:model="formAs.fin">
                                    @error('formAs.fin')
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

