<div class="container col-md-6">
    <div class="card mb-3">
            <div class="card-body">
                <div class="row mt-2 mb-4">
                    <div class="col-md-8">
                        <span class="text-capitalize">{{__('messages.form.editsubject')}}</span>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <button class="btn btn-dark btn-rounded" wire:click="back">{{__('messages.btn.back')}}</button>
                    </div>

                </div>
                <form method="POST" wire:submit.prevent="store">
                    <div class="form-group">
                        <label for="name">{{__('messages.form.name')}}</label>
                        <input type="text" name="name" class="form-control @error('form.name') is-invalid @enderror" id="libelle" placeholder="{{__('messages.form.name')}}..."  wire:model="form.name" >
                        @error('form.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="libelle">{{__('messages.form.libelle')}}</label>
                        <input type="text" name="libelle" class="form-control @error('form.libelle') is-invalid @enderror" id="libelle" placeholder="{{__('messages.form.libelle')}}..."  wire:model="form.libelle" >
                        @error('form.libelle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="coefficient">{{__('messages.sidebar.coefficient')}}</label>
                        <input type="number" name="coefficient" class="form-control @error('form.coefficient') is-invalid @enderror" id="coefficient" placeholder="{{__('messages.sidebar.coefficient')}}..."  wire:model="form.coefficient" >
                        @error('form.coefficient')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="libelle">{{__('messages.sidebar.subjectType')}}</label>
                        <select   class="form-control @error('form.type_matiere_id') is-invalid @enderror"   wire:model="form.type_matiere_id" >
                            <option value="">{{__('messages.form.subject_message')}}</option>
                            @foreach ($tms as $tm)
                                <option value="{{$tm->id}}">{{$tm->name}}</option>
                            @endforeach
                        </select>
                        @error('form.libelle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.validation.required') }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group pt-2">
                        <button class="btn btn-warning btn-rounded">{{__('messages.btn.edit')}}</button>
                    </div>
                </form>
            </div>
    </div>
</div>

