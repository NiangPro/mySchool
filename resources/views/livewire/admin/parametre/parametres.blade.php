
<div>
    @include('livewire.admin.parametre.addAs')
    <div class="card">
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <form enctype="multipart/form-data" wire:submit.prevent="changeVars">
                        <div class="row">
                            <div class="form-group col-md-4 ">
                                <label for="">{{__('messages.sidebar.sitename')}}</label>
                                <input type="text"  class="form-control" wire:model="form.name">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="">Logo</label>
                                <div class="row">
                                    <div class="custom-file col-8 ">
                                        <input type="file" class="custom-file-input" wire:model="logo">
                                        <label for="image" class="custom-file-label">{{__('messages.form.image_message')}}</label>
                                        <div wire:loading wire:target="logo">{{__('messages.sidebar.download')}}...</div>
                                    </div>
                                    <div class="text-center col-4" style="margin-top:-30px;">
                                        @if ($logo)
                                            <img src="{{$logo->temporaryUrl()}}"class="figure-img img-fluid rounded" alt="" style="max-height:80px;">
                                        @else
                                            <img src="storage/images/{{$form['logo']}}"class="figure-img rounded-circle" alt="" style="max-height:80px;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="">Icon</label>
                                <div class="row">
                                    <div class="custom-file col-8 ">
                                        <input type="file" class="custom-file-input" wire:model="icon">
                                        <label for="image" class="custom-file-label">{{__('messages.form.image_message')}}</label>
                                        <div wire:loading wire:target="icon">{{__('messages.sidebar.download')}}...</div>
                                    </div>
                                    <div class="text-center col-4" style="margin-top:-30px;">
                                        @if ($icon)
                                            <img src="{{$icon->temporaryUrl()}}"class="figure-img img-fluid rounded" alt="" style="max-height:80px;">
                                        @else
                                            <img src="storage/images/{{$form['icon']}}"class="figure-img rounded-circle" alt="" style="max-height:80px;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right mt-2">
                                <button class="btn btn-warning text-right btn-rounded">{{__('messages.btn.save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h2 class="card-title">{{__('messages.sidebar.school')}}</h2>

                    </div>
                    <hr>
                    <form >
                        <div class="form-group">
                                <label for="">{{__('messages.form.name')}}</label>
                                <input type="text" class="form-control @error('school.name') is-invalid @enderror" wire:model="school.name">
                                @error('school.name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('messages.validation.required') }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">{{__('messages.form.adresse')}}</label>
                                <input type="text" class="form-control @error('school.adresse') is-invalid @enderror" wire:model="school.adresse">
                                 @error('school.adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('messages.validation.required') }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">{{__('messages.form.email')}}</label>
                                <input type="email" class="form-control @error('school.email') is-invalid @enderror" wire:model="school.email">
                                 @error('school.email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('messages.validation.required') }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">{{__('messages.form.tel')}}</label>
                                <input type="text" class="form-control @error('school.tel') is-invalid @enderror" wire:model="school.tel">
                                 @error('school.tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('messages.validation.required') }}</strong>
                                        </span>
                                @enderror
                            </div>
                        @if ($school['id'])
                            <button class="btn btn-warning btn-rounded" wire:click.prevent="saveSchool">{{__('messages.btn.edit')}}</button>
                        @else
                            <button class="btn btn-success btn-rounded" wire:click.prevent="saveSchool">{{__('messages.btn.add')}}</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="card-title">{{__('messages.sidebar.schoolyear')}}</h2>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <button class="btn btn-warning btn-rounded">{{__('messages.btn.select')}}</button>
                                <button class="btn btn-success btn-rounded" data-toggle="modal" data-target="#add" aria-pressed="true">{{__('messages.btn.add')}}</button>
                            </div>
                        </div>
                        <hr>
                        <form >
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">{{__('messages.sidebar.opening')}}</label>
                                    <input type="date" class="form-control @error('anSco.debut') is-invalid @enderror" wire:model="anSco.debut">
                                    @error('anSco.debut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.validation.required') }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{__('messages.sidebar.closure')}}</label>
                                    <input type="date" class="form-control @error('anSco.fin') is-invalid @enderror" wire:model="anSco.fin">
                                    @error('anSco.fin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.validation.required') }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            @if ($anSco['id'])
                                <button class="btn btn-warning btn-rounded" wire:click.prevent="saveAnSco">{{__('messages.btn.edit')}}</button>
                            @else
                                <button class="btn btn-success btn-rounded" wire:click.prevent="saveAnSco">{{__('messages.btn.add')}}</button>
                            @endif
                        </form>
                    </div>
                </div>

            </div>
            @include('livewire.admin.parametre.initial_setting')

        </div>
    </div>
</div>

@section('js')
    <script>
        window.addEventListener('updateSetting', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.setting")}}', {positionClass: 'toast-top-right'});
            location.reload();
        })

        window.addEventListener('schoolYearAdded', event =>{
            $('#add').modal('hide');

            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.schoolyear")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('schoolYearUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.schoolyear")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('schoolAdded', event =>{
            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.school")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('schoolUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.school")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('appreciationAdded', event =>{
            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.appreciation")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('appreciationUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.appreciation")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('appreciationDeleted', event =>{
            toastr.warning('{{__("messages.alert.delete")}}', '{{__("messages.sidebar.appreciation")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('coefficientAdded', event =>{
            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.coefficient")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('coefficientUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.coefficient")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('coefficientDeleted', event =>{
            toastr.warning('{{__("messages.alert.delete")}}', '{{__("messages.sidebar.coefficient")}}', {positionClass: 'toast-top-right'});
        })

         window.addEventListener('periodAdded', event =>{
            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.period")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('periodUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.period")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('periodDeleted', event =>{
            toastr.warning('{{__("messages.alert.delete")}}', '{{__("messages.sidebar.period")}}', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
