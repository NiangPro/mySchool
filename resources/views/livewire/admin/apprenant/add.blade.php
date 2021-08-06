<div class="row mb-3">
                            <div class="col-md-6 h3">
                                {{__('messages.form.addstudent')}}
                            </div>
                            <div class="col-md-6 text-md-right">
                                <button class="btn btn-dark btn-rounded" wire:click="back">{{__('messages.btn.back')}}</button>
                            </div>
                        </div>
<div class="row gutters-sm">
                <div class="col-md-6 mb-3">

                  <div class="card h-100">
                    <div class="card-body">
                      <h3 class="d-flex align-items-center mb-3">{{__('messages.sidebar.student')}}</h3>
                      <form wire:submit.prevent="store" method="post">
                            @include('livewire.admin.apprenant.addstudent')
                        </form>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h3 class="d-flex align-items-center mb-3 text">{{__('messages.sidebar.tutor')}}</h3>
                        @include('livewire.admin.apprenant.addparent')
                    </div>
                  </div>
                </div>
              </div>
