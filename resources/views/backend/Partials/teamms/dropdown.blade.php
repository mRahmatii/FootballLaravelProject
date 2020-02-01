@isset($old)
    <select class="form-control selectpicker" name="team_ids{{$multiple ? '[]' :''}}" {{$multiple ? 'multiple' :''}} required>
        @foreach($teams as $team)
            <option class="form-control" value="{{$team->id}}" {{in_array($team->id,$old) ? 'selected' : ''}}>{{$team->name}}</option>
        @endforeach
    </select>
@else
    <select class="form-control selectpicker" name="team_ids{{$multiple ? '[]' :''}}" {{$multiple ? 'multiple' :''}} required>
        @foreach($teams as $team)
            <option class="form-control" value="{{$team->id}}">{{$team->name}}</option>
        @endforeach
    </select>
@endisset
