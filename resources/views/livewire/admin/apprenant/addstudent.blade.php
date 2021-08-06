<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">{{__('messages.form.surname')}}<span class="text-danger">*</span></label>
                <input type="text" placeholder="{{__('messages.form.surname')}}..." class="form-control @error('form.prenom') is-invalid @enderror" wire:model="form.prenom">
                @error('form.prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('messages.validation.required') }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">{{__('messages.form.name')}}<span class="text-danger">*</span></label>
                <input type="text" placeholder="{{__('messages.form.name')}}..." class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                @error('form.nom')
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
                <input type="text"  placeholder="{{__('messages.form.adresse')}}..." class="form-control @error('form.adresse') is-invalid @enderror" wire:model="form.adresse">
                @error('form.adresse')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('messages.validation.required') }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">{{__('messages.form.email')}}</label>
                <input type="email" placeholder="{{__('messages.form.email')}}..." class="form-control @error('form.email') is-invalid @enderror" wire:model="form.email">
                @error('form.email')
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
                <input type="text" placeholder="{{__('messages.form.nationality')}}..." class="form-control @error('form.nationalite') is-invalid @enderror" wire:model="form.nationalite">
                @error('form.nationalite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('messages.validation.required') }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">{{__('messages.form.gender')}}<span class="text-danger">*</span></label>
                <select  class="form-control @error('form.sexe') is-invalid @enderror" wire:model="form.sexe">
                    <option value="">__{{__('messages.form.gender_message')}}__</option>
                    <option value="Masculin">{{__('messages.form.gender_values.male')}}</option>
                    <option value="Feminin">{{__('messages.form.gender_values.female')}}</option>
                </select>
                @error('form.sexe')
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
                <input type="date" placeholder="{{__('messages.form.datenais')}}..." class="form-control @error('form.datenais') is-invalid @enderror" wire:model="form.datenais">
                @error('form.datenais')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('messages.validation.required') }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">{{__('messages.form.lieunais')}}<span class="text-danger">*</span></label>
                <input type="text" placeholder="{{__('messages.form.lieunais')}}..." class="form-control @error('form.lieunais') is-invalid @enderror" wire:model="form.lieunais">
                @error('form.lieunais')
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
                <label for="">{{__('messages.form.tel')}}</label>
                <input type="text" placeholder="{{__('messages.form.tel')}}..." class="form-control @error('form.tel') is-invalid @enderror" wire:model="form.tel">
                @error('form.tel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('messages.validation.invalid') }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">{{__('messages.sidebar.class')}}<span class="text-danger">*</span></label>
                <select  class="form-control @error('form.class') is-invalid @enderror" wire:model="form.class">
                    <option value="">__{{__('messages.form.class_message')}}__</option>
                    @foreach ($classes as $class)
                        <option value="{{$class['id']}}">{{$class['name']}}</option>
                    @endforeach
                </select>
                @error('form.class')
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
                <label for="">{{__('messages.form.father_name')}}<span class="text-danger">*</span></label>
                <input type="text"  placeholder="{{__('messages.form.father_name')}}..." class="form-control @error('form.father_name') is-invalid @enderror" wire:model="form.father_name">
                @error('form.father_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('messages.validation.required') }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">{{__('messages.form.mother_name')}}<span class="text-danger">*</span></label>
                <input type="text" placeholder="{{__('messages.form.mother_name')}}..." class="form-control @error('form.mother_name') is-invalid @enderror" wire:model="form.mother_name">
                @error('form.mother_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('messages.validation.required') }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-rounded">{{__('messages.btn.add')}}</button>
</div>
