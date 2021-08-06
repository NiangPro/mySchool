<div>
    @include('livewire.admin.classes.notes-classes')
    <div class="card mb-3">
            <div class="card-body">
                <h2 class="alert alert-success">Cliquez sur une classe pour voir les élèves et leurs notes</h2>
                <div class="row">
                    @foreach ($courses as $cours)
                        <div class="col-md-3">
                            <div class="card" wire:click="selectClasse({{$cours->classe['id']}}, {{$cours->matiere['id']}})" data-toggle="modal" data-target="#add" aria-pressed="true">
                                <div class="card-body">
                                    <h5 class="card-title">{{$cours->classe['name']}}</h5>
                                    <p class="card-text">{{$cours->matiere['name']}}</p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
    </div>
    @if ($classe)
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('messages.form.surname')}} & {{__('messages.form.name')}}</th>
                                <th>{{__('messages.form.matricule')}}</th>
                                <th>{{__('messages.sidebar.subject')}}</th>
                                <th>{{__('messages.sidebar.period')}}</th>
                                <th>{{__('messages.sidebar.rating')}}</th>
                                <th>{{__('messages.sidebar.class')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classe->students as $student)
                                <tr>
                                    <td>
                                        <div class="d-flex no-block align-items-center">
                                            <div class="mr-3"><img
                                                    src="storage/images/{{ $student['photo'] }}"
                                                    alt="user" class="rounded-circle" width="45"
                                                    height="45" /></div>
                                            <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">{{ $student['prenom'] }}
                                                    {{ $student['nom'] }}
                                                </h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $student['username'] }}</td>
                                    <td>{{$matiere_name->name}}</td>
                                    <td>{{$period_name->value}}</td>
                                    <td>@if($this->getMark($student['id'])) {{$this->getMark($student['id'])->valeur}}/20 @endif</td>
                                    <td>{{$classe['name']}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</div>
    @endif
</div>

@section('js')
    <script>
        window.addEventListener('classeAdded', event =>{
            $('#add').modal('hide');

            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.class")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('classeSelected', event =>{
            $('#add').modal('hide');
        })

        window.addEventListener('classeUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.class")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('classeDeleted', event =>{
            toastr.success('{{__("messages.alert.delete")}}', '{{__("messages.sidebar.class")}}', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
