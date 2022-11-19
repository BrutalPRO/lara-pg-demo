<div class="">
    <form action="{{route('point.add')}}" method="post">
        @csrf
        <label>Latitude*:<br>
            <input type="number" name="latitude" step="0.000001" min="-90" max="90" required="required" /></label>
        <label>Longitude*:<br>
            <input type="number" name="longitude" step="0.000001" min="-180" max="180" required="required" /></label>
        <label>Label:<br>
            <input type="text" name="label"></label>
        <input type="submit" value="add">
    </form>
</div>
