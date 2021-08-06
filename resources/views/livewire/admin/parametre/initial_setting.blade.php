<!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="card col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h4 class="card-title">{{__('messages.sidebar.period')}}</h4>
                                    </div>
                                    <div class="col-4 text-right">
                                        @if ($etatPeriod === "add")
                                            <button class="btn btn-dark btn-rounded btn-sm" wire:click.prevent="backPeriod">{{__('messages.btn.back')}}</button>
                                        @else
                                        <button class="btn btn-success btn-rounded btn-sm" wire:click.prevent="newPeriod">{{__('messages.btn.add')}}</button>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                @if ($etatPeriod === "add")
                                    <form method="POST" wire:submit.prevent="storePeriod">
                                        <div class="form-group">
                                            <label >{{__('messages.form.value')}}</label>
                                            <input type="text"  class="form-control @error('formPeriod.value') is-invalid @enderror"  placeholder="Examen, Devoir..."  wire:model="formPeriod.value" >
                                            @error('formPeriod.value')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ __('messages.validation.required') }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        @if ($formPeriod['id'])
                                            <button class="btn btn-warning btn-rounded btn-sm">{{__('messages.btn.edit')}}</button>
                                        @else
                                            <button class="btn btn-success btn-rounded btn-sm">{{__('messages.btn.add')}}</button>
                                        @endif
                                    </form>
                                @else
                                    <table class="table table-light mt-2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="2">{{__('messages.form.value')}}</th>
                                                <th>{{__('messages.form.tools')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($periods as $period)
                                            <tr>
                                                <td colspan="2">{{$period->value}}</td>
                                                <td>
                                                    <div class="popover-icon">
                                                        <button class="btn btn-warning rounded-circle btn-circle font-12 popover-item" wire:click="editPeriod({{$period->id}})"
                                                            title="{{__('messages.btn.edit')}}"><i class="fa fa-edit"></i></button>
                                                        <button class="btn btn-danger rounded-circle btn-circle font-12 popover-item" wire:click="deletePeriod({{$period->id}})" title="{{__('messages.btn.delete')}}"><i class="fas fa-trash-alt"></i></button>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Sales Charts Section -->
                <!-- *************************************************************** -->
