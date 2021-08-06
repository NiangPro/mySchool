<div>
    @if ($etat === "edit")
        @include('livewire.admin.matiere.edit')
    @else
        <div class="row py-lg-2">
                <button  class="btn btn-success btn-rounded  float-md-right" data-toggle="modal" data-target="#add" aria-pressed="true">{{__('messages.btn.add')}}</button>
        </div>
        @include('livewire.admin.matiere.add')


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{__('messages.form.name')}}</th>
                        <th>{{__('messages.form.libelle')}}</th>
                        <th>{{__('messages.sidebar.subjectType')}}</th>
                        <th>{{__('messages.sidebar.coefficient')}}</th>
                        <th>{{__('messages.form.tools')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($matieres as $m)
                            <tr>
                                <td>{{ $m['name'] }}</td>
                                <td>{{ $m['libelle'] }}</td>
                                <td>{{ $m->typeMatiere->name }}</td>
                                <td class="text-center">{{ $m->coefficient }}</td>
                                <td>
                                    <div class="popover-icon">
                                        <button class="btn btn-warning rounded-circle btn-circle font-12 popover-item"
                                            title="{{__('messages.btn.edit')}}" wire:click="edit({{$m['id']}})"><i class="fa fa-edit"></i></button>
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
        window.addEventListener('subjectAdded', event =>{
            $('#add').modal('hide');

            toastr.success('{{__("messages.alert.add")}}', '{{__("messages.sidebar.subject")}}', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('subjectUpdated', event =>{
            toastr.success('{{__("messages.alert.edit")}}', '{{__("messages.sidebar.subject")}}', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection

