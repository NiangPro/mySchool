<!-- Signup modal content -->
<div id="info" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <span class="text-capitalize">{{__('messages.form.info')}}</span>
                    <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3>{{__('messages.form.role')}}: {{$role['name']}}</h3>
                        <h4>{{__('messages.form.slug')}}: {{$role['slug']}}</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{__('messages.form.permission')}}s</h5>
                        <p class="card-text">
                            @if ($role->permissions != null)

                                @foreach ($role->permissions as $permission)
                                <span class="badge badge-secondary btn-rounded">
                                    {{ $permission->name }}
                                </span>
                                @endforeach

                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

