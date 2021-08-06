<div>
    <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="storage/images/{{$user->photo}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{$user->prenom}} {{$user->nom}}</h4>
                      <p class="text-secondary mb-1">
                          @foreach ($user->roles as $role)
                              {{$role->name}}
                          @endforeach
                      </p>
                      <p class="text-muted font-size-sm">{{$user->adresse}}</p>

                    </div>
                  </div>
                </div>
              </div>

              <div class="card mt-3 p-2">
                <h4>Changer votre mot de passe</h4>
                <form wire:submit.prevent="editPassword">
                <div class="form-row align-items-center">

                    <div class="col-sm-12 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">{{__('messages.form.password')}}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">{{__('messages.btn.new')}}</div>
                            </div>
                            <input type="password" class="form-control @error('form.password') is-invalid @enderror" wire:model="form.password" id="inlineFormInputGroupUsername" placeholder="{{__('messages.form.password')}}">
                            @error('form.password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">{{__('messages.form.password_confirm')}}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">{{__('messages.btn.confirm')}}</div>
                            </div>
                            <input type="password" class="form-control @error('form.password_confirmation') is-invalid @enderror" wire:model="form.password_confirmation" id="inlineFormInputGroupUsername" placeholder="{{__('messages.form.password_confirm')}}">
                        </div>
                    </div>
                    <div class="col-auto my-1">
                    <button type="submit" class="btn btn-warning btn-rounded">{{__('messages.btn.edit')}}</button>
                    </div>
                </div>
                </form>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.username')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.username') is-invalid @enderror" wire:model="form.username" @if($role->slug === "apprenant") readonly="readonly" @endif>
                            @error('form.username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.name')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.prenom') is-invalid @enderror" wire:model="form.prenom" placeholder="Prenom">
                            @error('form.prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.surname')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom" >
                            @error('form.nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.email')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="email" class="form-control @error('form.email') is-invalid @enderror" wire:model="form.email">
                            @error('form.email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.adresse')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.adresse') is-invalid @enderror" wire:model="form.adresse" >
                            @error('form.adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.tel')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.tel') is-invalid @enderror" wire:model="form.tel" >
                            @error('form.tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.datenais')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="date" class="form-control @error('form.datenais') is-invalid @enderror" wire:model="form.datenais" >
                            @error('form.datenais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.lieunais')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.lieunais') is-invalid @enderror" wire:model="form.lieunais" >
                            @error('form.lieunais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.role')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="{{$role->name}}" readonly="readonly" >
                            </div>
                        </div>

                        <hr>
                        <button class="btn btn-outline-warning btn-rounded mt-2">{{__('messages.btn.edit')}}</button>
                  </form>
                </div>
              </div>

            </div>
    </div>

</div>

@section('js')
    <script>
        window.addEventListener('userUpdated', event =>{
            $('#add').modal('hide');

            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.users")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('passwordUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.form.password")}}', {positionClass: 'toast-top-right'});
            location.reload();
        })

        window.addEventListener('loginAlreadyExist', event =>{
            toastr.error('{{__("messages.alert.loginExist")}}', '{{__("messages.sidebar.users")}}', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
