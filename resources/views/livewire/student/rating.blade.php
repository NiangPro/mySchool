<div>
    @include('livewire.student.modal')
    <div class="card">
            <div class="card-body">
                <h2 class="alert alert-success">Cliquez sur une classe pour voir vos notes</h2>
                <div class="row">
                    @foreach ($user->classes as $class)
                        <div class="col-md-2">
                            <div class="card" wire:click="checkClass({{$class['id']}})"  data-toggle="modal" data-target="#add" aria-pressed="true">
                                <div class="card-body">
                                    <h1 class="card-title">{{$class['name']}}</h1>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
    </div>

    @if ($notes)
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('messages.sidebar.subject')}}</th>
                                <th>{{__('messages.sidebar.rating')}}</th>
                                <th>{{__('messages.sidebar.appreciation')}}</th>
                                <th>{{__('messages.sidebar.period')}}</th>
                                <th>{{__('messages.sidebar.class')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td>{{ $note->matiere->name }}</td>
                                    <td><span class="@if ($note->valeur < 10)text-danger @else text-success @endif"> {{ $note->valeur }}</span> /<strong>20</strong> </td>
                                    <td>
                                    {{ $note->appreciation }}
                                    </td>
                                    <td>
                                    {{ $note->period->value }}
                                    </td>
                                    <td>
                                    {{ $note->classe->name }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</div>
    @elseif($search === true)
        <div class="container col-md-4 alert alert-warning alert-dismissible fade show" role="alert">
            <h2>Aucune note trouvée !</h2>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>

@section('js')
    <script>
        window.addEventListener('mark', event =>{
            $('#add').modal('hide');
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
