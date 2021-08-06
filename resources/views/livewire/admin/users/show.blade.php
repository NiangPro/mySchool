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
                      <button class="btn btn-outline-dark btn-rounded" wire:click.prevent="back">{{__('messages.btn.back')}}</button>
                      <button class="btn btn-outline-success btn-rounded">Message</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fas fa-envelope" aria-hidden="true"></i></h6>
                    <span class="text-secondary">{{$user->email}}</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.username')}}</h6>
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
                            <select class="form-control @error('form.role') is-invalid @enderror" wire:model="form.role"  wire:change.prevent="getPermissions">
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">{{__('messages.form.permission')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @foreach ($permissions as $key => $p)
                                    @if ($permissions)
                                        <input type="checkbox" wire:model="permissions.{{$key}}.id" >{{$permissions[$key]['name']}}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-outline-warning btn-rounded mt-2">{{__('messages.btn.edit')}}</button>
                  </form>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>
