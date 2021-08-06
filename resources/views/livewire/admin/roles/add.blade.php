<!-- Signup modal content -->
<div id="add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <span class="text-capitalize">{{__('messages.form.addrole')}}</span>
                    <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                </div>

                <form method="POST" wire:submit.prevent="store">
                    <div class="form-group">
                        <label for="role_name">{{__('messages.form.role')}}</label>
                        <input type="text" name="role_name" class="form-control @error('form.role_name') is-invalid @enderror" id="role_name" placeholder="{{__('messages.form.role')}}..."  wire:model="form.role_name" >
                        @error('form.role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label for="roles_permissions">{{__('messages.form.permission')}}</label>
                        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" wire:model="form.roles_permissions" >
                        @error('form.roles_permissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <button class="btn btn-outline-success">{{__('messages.btn.add')}}</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

