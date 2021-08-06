<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered table-responsive-sm">
            <thead>
                <th>Heures/Jours</th>
                @foreach ($data["jours"] as $item)
                    <th>{{$item}}</th>
                @endforeach
            </thead>
            <tbody>
                @foreach ($data["hours"] as $item)
                    <tr>
                        <th>{{$item["debut"]}}h &rarr; {{$item["fin"]}}h</th>
                        @if ($item["courses"])
                            @for ($i = 0; $i < 7; $i++)
                                @foreach ($item["courses"] as $cours)
                                        @if ($data["jours"][$i] == $cours->jour)
                                        <td class="bg-warning">
                                                <h5>{{$cours->matiere->libelle}}</h5>
                                                <span class="text-center">{{$cours->classe->name}} &rarr; {{$cours->salle->name}}</h1>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                @endforeach
                            @endfor
                        @else
                            @for ($i = 0; $i < 7; $i++)
                                <td></td>
                            @endfor
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
