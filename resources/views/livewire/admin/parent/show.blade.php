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
                      <button class="btn btn-dark btn-rounded" wire:click.prevent="back">{{__('messages.btn.back')}}</button>
                      <button class="btn btn-success btn-rounded">Message</button>
                    </div>
                  </div>
                </div>
              </div>
              @if ($user->email)
                  <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fas fa-envelope" aria-hidden="true"></i></h6>
                            <span class="text-secondary">{{$user->email}}</span>
                        </li>
                        </ul>
                    </div>
              @endif

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                    <form wire:submit.prevent="update" method="post">
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.username')}}<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.username') is-invalid @enderror" wire:model="form.username" >
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
                            <h6 class="mb-0">{{__('messages.form.name')}}<span class="text-danger">*</span></h6>
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
                            <h6 class="mb-0">{{__('messages.form.surname')}}<span class="text-danger">*</span></h6>
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
                            <h6 class="mb-0">{{__('messages.form.adresse')}}<span class="text-danger">*</span></h6>
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
                            <h6 class="mb-0">{{__('messages.form.tel')}}<span class="text-danger">*</span></h6>
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
                            <h6 class="mb-0">{{__('messages.form.datenais')}}<span class="text-danger">*</span></h6>
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
                            <h6 class="mb-0">{{__('messages.form.lieunais')}}<span class="text-danger">*</span></h6>
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

                        <button class="btn btn-warning btn-rounded mt-2">{{__('messages.btn.edit')}}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

@if ($user->enfants)
  <div class="card mb-3">
      <div class="card-header">
          <h1 class="card-title">{{__('messages.sidebar.children')}}</h1>
      </div>
            <div class="card-body">
                <div class="row">
            @foreach ($user->enfants as $enfant)

                <div class="col-xl-3 col-lg-12">
                <div class="card mb-4">
                    <div class="card-body bg-light">
                        <div class="card-block">
                            <div class="align-self-center halfway-fab text-center">
                                <a class="profile-image">
                                    <img src="storage/images/{{$enfant['photo']}}" class="rounded-circle img-border gradient-summer" height="70" alt="Card image">
                                </a>
                            </div>
                            <div class="text-center">
                                <span class="font-medium-2 text-uppercase">{{$enfant->prenom}} {{$enfant->nom}}</span>
                                <p class="grey font-small-2">{{$enfant->classes[0]->name}}</p>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="card-footer">

                        <div class="row">
                            <div class="col">
                            <button class="btn btn-success rounded-circle btn-circle font-12"
                                            wire:click="show({{$enfant->id}})" aria-pressed="true" title="{{__('messages.btn.info')}}"><i class="fa fa-eye"></i></button>
                        </div>
                        <div class="col text-md-right">
                            <button class="btn btn-danger rounded-circle btn-circle font-12 popover-item"  title="{{__('messages.btn.delete')}}"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            @endforeach
                </div>
            </div>
        </div>
@endif
