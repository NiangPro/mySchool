<div>
    @if ($etat === "add")
        @include('livewire.admin.note.add')
    @else
        <button class="btn btn-success btn-rounded mb-2" wire:click="new">{{__('messages.btn.new')}}</button>

        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="classSelected">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">{{__('messages.sidebar.class')}}<span class="text-danger">*</span></div>
                                </div>
                                <select  class="form-control @error('form.classe_id') is-invalid @enderror" wire:model="form.classe_id">
                                    <option value="">__{{__('messages.form.class_message')}}__</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class['id']}}">{{ $class['name']}}</option>
                                    @endforeach
                                </select>
                                    @error('form.classe_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.validation.required') }}</strong>
                                            </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">{{__('messages.sidebar.schoolyear')}}<span class="text-danger">*</span></div>
                                </div>
                                <select  class="form-control @error('form.school_year_id') is-invalid @enderror" wire:model="form.school_year_id">
                                    <option value="">__{{__('messages.sidebar.schoolyear')}}__</option>
                                    @foreach ($sy as $s)
                                        <option value="{{ $s->id}}"> @if($s->status === 1 ) {{__('messages.sidebar.currentYear')}} @else{{ $s->debut}} 	&rarr; {{ $s->fin}} @endif</option>
                                    @endforeach
                                </select>
                                        @error('form.school_year_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.validation.required') }}</strong>
                                            </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">{{__('messages.sidebar.period')}}<span class="text-danger">*</span></div>
                                </div>
                                <select  class="form-control @error('form.period_id') is-invalid @enderror" wire:model="form.period_id">
                                    <option value="">__{{__('messages.sidebar.period')}}__</option>
                                    @foreach ($periods as $p)
                                        <option value="{{ $p->id}}">{{ $p->value}}</option>
                                    @endforeach
                                </select>
                                @error('form.period_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.validation.required') }}</strong>
                                            </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">{{__('messages.sidebar.subject')}}<span class="text-danger">*</span></div>
                                </div>
                                <select  class="form-control @error('form.matiere_id') is-invalid @enderror" wire:model="form.matiere_id">
                                    <option value="">__{{__('messages.form.subject_message')}}__</option>
                                    @foreach ($matieres as $m)
                                        <option value="{{ $m['id']}}">{{ $m['name']}}</option>
                                    @endforeach
                                </select>
                                @error('form.matiere_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.validation.required') }}</strong>
                                            </span>
                                    @enderror
                            </div>
                        </div>
                        <button class="btn btn-info ml-md-3 btn-rounded btn-sm">{{__('messages.btn.search')}}</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($notes)
            @include('livewire.admin.note.searchResults')
        @endif
    @endif

</div>

@section('js')
    <script>

        window.addEventListener('noteAdded', event =>{
            toastr.succes('{{__("messages.alert.add")}}', '{{__("messages.sidebar.rating")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('classroomUpdated', event =>{
            toastr.succes("{{__('messages.alert.edit')}}", "{{__('messages.sidebar.class')}}", {positionClass: 'toast-top-right'});
        })

        window.addEventListener('noteExisted', event =>{
            toastr.warning('note existante', '{{__("messages.sidebar.rating")}}', {positionClass: 'toast-top-right'});
        })

    </script>

@endsection
