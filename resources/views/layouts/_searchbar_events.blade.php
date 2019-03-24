<div class="search-bar-events">
    <form action="{{action('EventController@eventsByParam')}}" method="get">

        <div class="search-bar-events-inputs">
            <div class="date input-group input-group-sm" id="datetimepicker" data-target-input="nearest">
                <input type="text" name="dateFilter" class="form-control datetimepicker-input" aria-label="Small"
                    aria-describedby="inputGroup-sizing-sm" data-target="#datetimepicker" placeholder="Pick a date" />
                <div class="input-group-prepend" data-target="#datetimepicker" data-toggle="datetimepicker">
                    <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-calendar"></i></span>
                </div>
            </div>

            <div class="location input-group input-group-sm">
                <select name="location_id" class="form-control">
                    <option value="">All locations</option>
                    @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-amber"><i class="fas fa-search"></i></button>
    </form>
</div>
