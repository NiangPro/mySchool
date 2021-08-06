<div class="container col-md-8">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    {{__('messages.form.adduser')}}
                </div>
                <div class="col-md-6 text-md-right">
                    <button class="btn btn-dark btn-rounded  float-md-right" wire:click.prevent="back" aria-pressed="true">{{__('messages.btn.back')}}</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store" method="post">
                <div class="form-group">
                            <label for="">{{__('messages.form.value')}}<span class="text-danger">*</span></label>
                            <input type="number" step="0.25" min="0" max="20" placeholder="{{__('messages.form.value')}}..." class="form-control @error('form.valeur') is-invalid @enderror" wire:model="form.valeur">
                            @error('form.valeur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{__('messages.sidebar.period')}}<span class="text-danger">*</span></label>
                                    <select  class="form-control @error('form.period_id') is-invalid @enderror" wire:model="form.period_id">
                                        <option value="">__{{__('messages.sidebar.period')}}__</option>
                                        @foreach ($periods as $p)
                                            <option value="{{$p->id}}">{{$p->value}}</option>
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
                        <div class="form-group">
                                    <label for="">{{__('messages.sidebar.class')}}<span class="text-danger">*</span></label>
                                    <select  class="form-control @error('form.classe_id') is-invalid @enderror" wire:model="form.classe_id" wire:change="getStudents">
                                        <option value="">__{{__('messages.form.class_message')}}__</option>
                                        @foreach ($classes as $c)
                                            <option value="{{$c['id']}}">{{$c['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('form.classe_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('messages.validation.required') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if ($form['classe_id'])

                                    <div class="form-group">
                                                <label for="">{{__('messages.sidebar.student')}}<span class="text-danger">*</span></label>
                                                <select  class="form-control @error('form.apprenant_id') is-invalid @enderror" wire:model="form.apprenant_id">
                                                    <option value="">__{{__('messages.sidebar.student')}}__</option>
                                                    @foreach ($students as $s)
                                                        <option value="{{$s['id']}}">{{$s['prenom']}} {{$s['nom']}} &rarr; {{$s['username']}}</option>
                                                    @endforeach
                                                </select>
                                                @error('form.apprenant_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __('messages.validation.required') }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                @endif


                <button type="submit" class="btn btn-success btn-rounded">{{__('messages.btn.add')}}</button>
            </form>
        </div>
    </div>
</div>
