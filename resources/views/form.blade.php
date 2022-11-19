<div class="">
    <form action="{{route('point.add')}}" method="post">
        @csrf
        <div>
            <label>Latitude*:<br>
            <input type="number" name="latitude" step="0.000001" min="-90" max="90" required="required" /></label>
        </div>
        <div>
            <label>Longitude*:<br>
            <input type="number" name="longitude" step="0.000001" min="-180" max="180" required="required" /></label>
        </div>
        <div>
        <label>Label:<br>
            <input type="text" name="label"></label>
        </div>
        <div>
            <input type="submit" value="add">
        </div>
    </form>
</div>
