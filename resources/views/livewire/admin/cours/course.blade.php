<div>
    @if ($etat === "edit")
        @include('livewire.admin.cours.edit')
    @else
        <div class="row py-lg-2">
                <button  class="btn btn-success btn-rounded  float-md-right" data-toggle="modal" data-target="#add" aria-pressed="true">{{__('messages.btn.add')}}</button>
        </div>
        @include('livewire.admin.cours.add')


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{__('messages.form.day')}}</th>
                        <th>{{__('messages.form.duration')}}</th>
                        <th>{{__('messages.sidebar.teacher')}}</th>
                        <th>{{__('messages.sidebar.class')}}</th>
                        <th>{{__('messages.sidebar.classroom')}}</th>
                        <th>{{__('messages.sidebar.subject')}}</th>
                        <th>{{__('messages.form.tools')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($cours as $c)
                            <tr>
                                <td>{{ $c['jour'] }}</td>
                                <td>{{ $c['debut'] }} - {{ $c['fin'] }}</td>
                                <td>
                                    <div class="d-flex no-block align-items-center">
                                        <div class="mr-3"><img
                                                src="storage/images/{{ $c->enseignant->photo }}"
                                                alt="user" class="rounded-circle" width="45"
                                                height="45" /></div>
                                        <div class="">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">{{ $c->enseignant->prenom }} {{ $c->enseignant->nom }}
                                            </h5>
                                        </div>
                                    </div>

                                </td>
                                <td>{{ $c->classe->name }}</td>
                                <td>{{ $c->salle->name }}</td>
                                <td>{{ $c->matiere->name }}</td>
                                <td>
                                    <div class="popover-icon">
                                        <button class="btn btn-warning rounded-circle btn-circle font-12 popover-item"
                                            title="{{__('messages.btn.edit')}}" wire:click.prevent="edit({{$c->id}})"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger rounded-circle btn-circle font-12 popover-item" title="{{__('messages.btn.delete')}}"><i class="fas fa-trash-alt"></i></button>

                                    </div>
                                </td>
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
        window.addEventListener('courseAdded', event =>{
            $('#add').modal('hide');

            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.course")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('courseUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.course")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('courseDeleted', event =>{
            toastr.warning('{{__("messages.alert.delete")}}', '{{__("messages.sidebar.course")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('conflict', event =>{
            toastr.warning('{{__("messages.alert.conflict")}}', '{{__("messages.sidebar.course")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('conflictProfessor', event =>{
            toastr.warning('{{__("messages.alert.conflictProfessor")}}', '{{__("messages.sidebar.course")}}', {positionClass: 'toast-top-right'});
        })

    </script>
@endsection
