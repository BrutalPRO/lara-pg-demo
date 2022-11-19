<div class="form">
    <form action="{{route('point.add')}}" method="post">
        @csrf
        <div>
            <label><span class="label">Latitude*:</span>
            <input type="number" name="latitude" step="0.000001" min="-90" max="90" required="required" /></label>
        </div>
        <div>
            <label><span class="label">Longitude*:</span>
            <input type="number" name="longitude" step="0.000001" min="-180" max="180" required="required" /></label>
        </div>
        <div>
            <label><span class="label">Label:</span>
            <input type="text" name="label"></label>
        </div>
        <div>
            <input type="submit" value="add">
        </div>
    </form>
</div>
