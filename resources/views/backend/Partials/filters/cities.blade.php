@foreach($cities as $city)
    <option class="form-control" value="{{$city->id}}">{{$city->name}}</option>
@endforeach
