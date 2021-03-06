<div class="search-bar-events">
    <form action="{{action('EventController@eventsByParam')}}" method="get">
        <div class="search-bar-events-inputs">

                @csrf
                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                    <input type="text" name="dateFilter" class="form-control datetimepicker-input"
                        data-target="#datetimepicker4" placeholder="Pick a date" />
                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>

                <div class="location input-group input-group-sm" id="locationpicker4">
                    <select name="location_id" class="form-control">
                        <option value="">All locations</option>
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <button type="submit" class="btn btn-icon btn-amber"><i class="fas fa-search"></i></button>
    </form>
</div>
