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
              <div class="card mb-3">
                  <div class="card-header">
                      <h1 class="card-title">{{__('messages.sidebar.tutor')}}</h1>
                    </div>
                    @if ($user->tuteur)
                        <div class="card-body">
                            <div class="card mb-4">
                                <div class="card-body bg-light">
                                    <div class="card-block">
                                        <div class="align-self-center halfway-fab text-center">
                                            <a class="profile-image">
                                                <img src="storage/images/{{$user->tuteur['photo']}}" class="rounded-circle img-border gradient-summer" height="70" alt="Card image">
                                            </a>
                                        </div>
                                        <div class="text-center">
                                            <span class="font-medium-2 text-uppercase">{{$user->tuteur->prenom}} {{$user->tuteur->nom}}</span>
                                            <p class="grey font-small-2"><i class="fa fa-phone" aria-hidden="true"></i> {{$user->tuteur->tel}}</p>
                                            <p class="grey font-small-2"><i class="fa fa-address-book" aria-hidden="true"></i> {{$user->tuteur->adresse}}</p>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    @endif
                    <div class="card-footer">
                        <form  method="post" wire:submit.prevent="editTutor">
                            <div class="row">
                                <div class="col-sm-8 text-secondary">
                                <select class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.parent.id" >
                                    @foreach ($parents as $p)
                                        <option value="{{$p->id}}">{{$p->prenom}} {{$p->nom}} {{$p->username}}</option>
                                    @endforeach
                                </select>
                                @error('form.parent.id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('messages.validation.invalid') }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-sm-4">
                                <button class="btn btn-warning form-control btn-rounded">{{__('messages.btn.edit')}}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

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
                            <input type="text" class="form-control @error('form.username') is-invalid @enderror" wire:model="form.username" readonly="readonly">
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
                            <h6 class="mb-0">{{__('messages.form.surname')}}<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.prenom') is-invalid @enderror" wire:model="form.prenom" placeholder="{{__('messages.form.username')}}">
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
                            <h6 class="mb-0">{{__('messages.form.name')}}<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom" placeholder="{{__('messages.form.name')}}">
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
                            <input type="email" class="form-control @error('form.email') is-invalid @enderror" wire:model="form.email" placeholder="{{__('messages.form.email')}}">
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
                            <input type="text" class="form-control @error('form.adresse') is-invalid @enderror" wire:model="form.adresse" placeholder="{{__('messages.form.adresse')}}" >
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
                            <input type="text" class="form-control @error('form.tel') is-invalid @enderror" wire:model="form.tel" placeholder="{{__('messages.form.tel')}}" >
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
                            <input type="date" class="form-control @error('form.datenais') is-invalid @enderror" wire:model="form.datenais" placeholder="{{__('messages.form.datenais')}}" >
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
                            <input type="text" class="form-control @error('form.lieunais') is-invalid @enderror" wire:model="form.lieunais" placeholder="{{__('messages.form.lieunais')}}" >
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
                            <h6 class="mb-0">{{__('messages.form.father_name')}}<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.father_name') is-invalid @enderror" wire:model="form.father_name" placeholder="{{__('messages.form.father_name')}}" >
                            @error('form.father_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.mother_name')}}<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('form.mother_name') is-invalid @enderror" wire:model="form.mother_name" placeholder="{{__('messages.form.mother_name')}}" >
                            @error('form.mother_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.sidebar.class')}}<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <select  class="form-control @error('form.class') is-invalid @enderror" wire:model="form.class">
                                @foreach ($classes as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('form.class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.invalid') }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.gender')}}<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <select  class="form-control @error('form.sexe') is-invalid @enderror" wire:model="form.sexe">
                                <option value="Masculin" @if($form['sexe'] === "Masculin") selected @endif>Masculin</option>
                                <option value="Feminin" @if($form['sexe'] === "Feminin") selected @endif>Feminin</option>
                            </select>
                            @error('form.sexe')
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


