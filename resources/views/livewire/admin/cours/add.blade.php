<!-- Signup modal content -->
<div id="add" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <span class="text-capitalize">{{__('messages.form.addcours')}}</span>
                    <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                </div>

                <form method="POST" wire:submit.prevent="store">
                    <div class="form-group">
                        <label for="">{{__('messages.form.day')}}<span class="text-danger">*</span></label>
                        <select  class="form-control @error('form.jour') is-invalid @enderror" wire:model="form.jour">
                            <option value="">__{{__('messages.form.day_message')}}__</option>
                            @foreach ($days as $day)
                                <option value="{{$day}}">{{$day}}</option>
                            @endforeach
                        </select>
                        @error('form.jour')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ __('messages.validation.required') }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Debut</label>
                            <input type="time" name="name" class="form-control @error('form.debut') is-invalid @enderror" id="libelle" placeholder="{{__('messages.form.debut')}}..."  wire:model="form.debut" >
                            @error('form.debut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('messages.validation.required') }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fin">Fin</label>
                            <input type="time" name="fin" class="form-control @error('form.fin') is-invalid @enderror" id="fin" placeholder="{{__('messages.form.fin')}}..."  wire:model="form.fin" >
                            @error('form.fin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('messages.validation.required') }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">{{__('messages.sidebar.subject')}}<span class="text-danger">*</span></label>
                        <select  class="form-control @error('form.matiere_id') is-invalid @enderror" wire:model="form.matiere_id">
                            <option value="">__{{__('messages.form.subject_message')}}__</option>
                            @foreach ($matieres as $m)
                                <option value="{{$m['id']}}">{{$m['name']}}</option>
                            @endforeach
                        </select>
                        @error('form.matiere_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ __('messages.validation.required') }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">{{__('messages.sidebar.class')}}<span class="text-danger">*</span></label>
                            <select  class="form-control @error('form.classe_id') is-invalid @enderror" wire:model="form.classe_id">
                                <option value="">__{{__('messages.form.class_message')}}__</option>
                                @foreach ($classes as $class)
                                    <option value="{{$class['id']}}">{{$class['name']}}</option>
                                @endforeach
                            </select>
                            @error('form.classe_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">{{__('messages.sidebar.classroom')}}<span class="text-danger">*</span></label>
                            <select  class="form-control @error('form.classroom_id') is-invalid @enderror" wire:model="form.classroom_id">
                                <option value="">__{{__('messages.form.classroom_message')}}__</option>
                                @foreach ($classrooms as $class)
                                    <option value="{{$class['id']}}">{{$class['name']}}</option>
                                @endforeach
                            </select>
                            @error('form.classroom_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">{{__('messages.sidebar.teacher')}}<span class="text-danger">*</span></label>
                        <select  class="form-control @error('form.user_id') is-invalid @enderror" wire:model="form.user_id">
                            <option value="">__{{__('messages.form.teacher_message')}}__</option>
                            @foreach ($teachers as $t)
                                <option value="{{$t['id']}}">{{$t['prenom']}} {{$t['nom']}} - {{$t['username']}}</option>
                            @endforeach
                        </select>
                        @error('form.user_id')
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

