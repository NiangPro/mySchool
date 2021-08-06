<!-- Signup modal content -->
<div id="add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <span class="text-capitalize">{{__('messages.form.addsubject')}}</span>
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
                        <label for="libelle">{{__('messages.form.libelle')}}</label>
                        <input type="text" name="libelle" class="form-control @error('form.libelle') is-invalid @enderror" id="libelle" placeholder="{{__('messages.form.libelle')}}..."  wire:model="form.libelle" >
                        @error('form.libelle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="coefficient">{{__('messages.sidebar.coefficient')}}</label>
                        <input type="number" name="coefficient" class="form-control @error('form.coefficient') is-invalid @enderror" id="coefficient" placeholder="{{__('messages.sidebar.coefficient')}}..."  wire:model="form.coefficient" >
                        @error('form.coefficient')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="libelle">{{__('messages.sidebar.subjectType')}}</label>
                        <select   class="form-control @error('form.type_matiere_id') is-invalid @enderror"   wire:model="form.type_matiere_id" >
                            <option value="">{{__('messages.form.subject_message')}}</option>
                            @foreach ($tms as $tm)
                                <option value="{{$tm->id}}">{{$tm->name}}</option>
                            @endforeach
                        </select>
                        @error('form.libelle')
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

