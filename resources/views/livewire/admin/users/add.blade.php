<div class="container col-md-8">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    {{__('messages.form.adduser')}}
                </div>
                <div class="col-md-6 text-md-right">
                    <button class="btn btn-outline-dark btn-rounded  float-md-right" wire:click.prevent="back" aria-pressed="true">{{__('messages.btn.back')}}</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">{{__('messages.form.name')}}<span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{__('messages.form.name')}}..." class="form-control @error('form.prenom') is-invalid @enderror" wire:model="form.prenom">
                            @error('form.prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">{{__('messages.form.surname')}}<span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{__('messages.form.surname')}}..." class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
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
                                <option value="">{{__('messages.form.gender_message')}}</option>
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
                            <label for="">{{__('messages.form.tel')}}<span class="text-danger">*</span></label>
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
                            <label for="">{{__('messages.form.username')}}<span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{__('messages.form.username')}}..." class="form-control @error('form.username') is-invalid @enderror" wire:model="form.username">
                            @error('form.username')
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
                            <label for="">{{__('messages.form.role')}}<span class="text-danger">*</span></label>
                            <select  class="form-control @error('form.role') is-invalid @enderror" wire:model="form.role" wire:change.prevent="getPermissions">
                                <option value="">{{__('messages.form.role_message')}}</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('form.role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            @if ($permissions)
                                <label for="">{{__('messages.form.permission')}}<span class="text-danger">*</span></label><br>
                                @foreach ($permissions as $key => $p)
                                    <input type="checkbox" wire:model="permissions.{{$key}}.id" >{{$permissions[$key]['name']}}
                                @endforeach

                            @endif
                            @error('form.permissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success">{{__('messages.btn.add')}}</button>
            </form>
        </div>
    </div>
</div>
