
<select name="{{$name}}">
    <option selected value="">
        Choose {{$name}}
    </option>
    @foreach ($dataList as $item)
    
        <option value="{{$item->id}}" {{$item->id == $value ? 'selected' : '' }}>
            {{$item[$col]}}
        </option>
    @endforeach
</select>
