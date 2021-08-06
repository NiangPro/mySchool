<!-- Signup modal content -->
<div id="add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <span class="text-capitalize">{{__('messages.sidebar.period')}}</span>
                    <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                </div>

                <form method="POST" wire:submit.prevent="searchMark">
                    <div class="form-group">
                        <label for="name">{{__('messages.sidebar.period')}}</label>
                        <select class="form-control @error('form.period_id') is-invalid @enderror" wire:model="form.period_id">
                            <option value="">{{__('messages.sidebar.period')}}</option>
                            @foreach ($periodes as $item)
                            <option value="{{$item['id']}}">{{$item['value']}}</option>

                            @endforeach
                        </select>
                        @error('form.period_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <button class="btn btn-success btn-rounded">{{__('messages.btn.search')}}</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

