

<div class="card-body" wire:ignore.self>
    <div class="btn-group mb-3" role="group" aria-label="Button group">
        <button class="btn btn-success btn-rounded" @if ($etatParent === "new")disabled @endif wire:click="newParent">{{__('messages.btn.new')}}</button>
        <button class="btn btn-info btn-rounded" @if ($etatParent === "exist")disabled @endif wire:click="existingParent">{{__('messages.btn.exist')}}</button>
    </div>

    @if ($etatParent === "exist")
        <div class="form-group">
                            <label for="">{{__('messages.sidebar.tutor')}}</label>
                            <select  class="form-control" wire:model="form.parent.id">
                                <option value="">__{{__('messages.form.tutor_message')}}__</option>
                                @foreach ($parents as $parent)
                                    <option value="{{$parent['id']}}">{{$parent['prenom']}} {{$parent['nom']}}</option>
                                @endforeach
                            </select>
                        </div>
    @elseif ($etatParent === "new")
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">{{__('messages.form.surname')}}<span class="text-danger">*</span></label>
                                                            <input type="text" placeholder="{{__('messages.form.surname')}}..." class="form-control @error('form.parent.prenom') is-invalid @enderror" wire:model="form.parent.prenom">
                                                            @error('form.parent.prenom')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ __('messages.validation.required') }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">{{__('messages.form.name')}}<span class="text-danger">*</span></label>
                                                            <input type="text" placeholder="{{__('messages.form.name')}}..." class="form-control @error('form.parent.nom') is-invalid @enderror" wire:model="form.parent.nom">
                                                            @error('form.parent.nom')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ __('messages.validation.required') }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">{{__('messages.form.adresse')}}<span class="text-danger">*</span></label>
                                                            <input type="text"  placeholder="{{__('messages.form.adresse')}}..." class="form-control @error('form.parent.adresse') is-invalid @enderror" wire:model="form.parent.adresse">
                                                            @error('form.parent.adresse')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ __('messages.validation.required') }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">{{__('messages.form.email')}}</label>
                                                            <input type="email" placeholder="{{__('messages.form.email')}}..." class="form-control @error('form.parent.email') is-invalid @enderror" wire:model="form.parent.email">
                                                            @error('form.parent.email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ __('messages.validation.required') }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">{{__('messages.form.nationality')}}<span class="text-danger">*</span></label>
                                                            <input type="text" placeholder="{{__('messages.form.nationality')}}..." class="form-control @error('form.parent.nationalite') is-invalid @enderror" wire:model="form.parent.nationalite">
                                                            @error('form.parent.nationalite')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ __('messages.validation.required') }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">{{__('messages.form.gender')}}<span class="text-danger">*</span></label>
                                                            <select  class="form-control @error('form.parent.sexe') is-invalid @enderror" wire:model="form.parent.sexe">
                                                                <option value="">__{{__('messages.form.gender_message')}}__</option>
                                                                <option value="Masculin">{{__('messages.form.gender_values.male')}}</option>
                                                                <option value="Feminin">{{__('messages.form.gender_values.female')}}</option>
                                                            </select>
                                                            @error('form.parent.sexe')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ __('messages.validation.required') }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">{{__('messages.form.datenais')}}<span class="text-danger">*</span></label>
                                                            <input type="date" placeholder="{{__('messages.form.datenais')}}..." class="form-control @error('form.parent.datenais') is-invalid @enderror" wire:model="form.parent.datenais">
                                                            @error('form.parent.datenais')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ __('messages.validation.required') }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">{{__('messages.form.lieunais')}}<span class="text-danger">*</span></label>
                                                            <input type="text" placeholder="{{__('messages.form.lieunais')}}..." class="form-control @error('form.parent.lieunais') is-invalid @enderror" wire:model="form.parent.lieunais">
                                                            @error('form.parent.lieunais')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ __('messages.validation.required') }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">{{__('messages.form.tel')}}<span class="text-danger">*</span></label>
                                                            <input type="text" placeholder="{{__('messages.form.tel')}}..." class="form-control @error('form.parent.tel') is-invalid @enderror" wire:model="form.parent.tel">
                                                            @error('form.parent.tel')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>

