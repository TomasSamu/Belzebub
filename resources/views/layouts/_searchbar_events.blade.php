<div class="search-bar-events">
    <form action="{{action('EventController@eventsByParam')}}" method="get">
        <div class="search-bar-events-inputs">
            <div class="container eventSelector">  
                <div class="form-group">
                    @csrf
                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                        <input type="text" name="dateFilter" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>            
                    </div>
                </div>
            </div>

        {{--new style ---should be adjusted so it works as per above--}}
{{--             <div class="date input-group input-group-sm" id="datetimepicker4" data-target-input="nearest">
            <input type="text" name="dateFilter" class="form-control datetimepicker-input" aria-label="Small"
                aria-describedby="inputGroup-sizing-sm" data-target="#datetimepicker4" placeholder="Pick a date" />
            <div class="input-group-prepend" data-target="#datetimepicker4" data-toggle="datetimepicker">
                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-calendar"></i></span>
            </div>
        </div> --}}

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
