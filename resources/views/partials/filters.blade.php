<form action="{{ Request::url() }}" method="GET">
    <div class="card-body">
        <h4>{{ __('general.filters') }}</h4>

        <div class="row mb-3">
            @if (in_array('company', $filters))
                <div class="col-md-2">
                    <label for="company" class="text-md-right">{{ __('general.company') }}</label>

                    <select class="form-select form-control-rounded small" id="company" name="company">
                        <option value="" selected>{{ __('general.choose_company') }}</option>

                        @foreach($companies as $id => $company)
                            <option value="{{ $id }}" {{ $id== request('company') ? ' selected' : '' }}>{{ $company }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (in_array('season', $filters))
                <div class="col-md-2">
                    <label for="season" class="text-md-right">{{ __('general.season') }}</label>

                    <select class="form-select form-control-rounded small" id="season" name="season">
                        <option value="" selected>{{ __('general.choose_season') }}</option>

                        @foreach($seasons as $season)
                            <option value="{{ $season->id }}" {{ $season->id == request('season') ? ' selected' : '' }}>
                                {{ $season->start_date?->format('d/m/Y') }} - {{ $season->end_date?->format('d/m/Y') }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (in_array('fromDate', $filters))
                <div class="col-md-2">
                    <label for="fromDate" class="text-muted bold">{{ __('general.from_date') }}</label>

                    <input class="form-control" type="date" id="fromDate" name="fromDate" value="{{ request('fromDate') }}">
                </div>
            @endif

            @if (in_array('toDate', $filters))
                <div class="col-md-2">
                    <label for="toDate" class="text-muted bold">{{ __('general.to_date') }}</label>

                    <input class="form-control" type="date" id="toDate" name="toDate" value="{{ request('toDate') }}">
                </div>
            @endif

            @if (in_array('day', $filters))
                <div class="col-md-2">
                    <label for="day" class="text-md-right">{{ __('general.day') }}</label>

                    <select class="form-select form-control-rounded small" id="day" name="day">
                        <option value="" selected>{{ __('general.choose_day') }}</option>
                        <option value="Monday" {{ 'Monday' === request('day') ? ' selected' : '' }}>{{ __('general.monday') }}</option>
                        <option value="Tuesday" {{ 'Tuesday' === request('day') ? ' selected' : '' }}>{{ __('general.tuesday') }}</option>
                        <option value="Wednesday" {{ 'Wednesday' === request('day') ? ' selected' : '' }}>{{ __('general.wednesday') }}</option>
                        <option value="Thursday" {{ 'Thursday' === request('day') ? ' selected' : '' }}>{{ __('general.thursday') }}</option>
                        <option value="Friday" {{ 'Friday' === request('day') ? ' selected' : '' }}>{{ __('general.friday') }}</option>
                        <option value="Saturday" {{ 'Saturday' === request('day') ? ' selected' : '' }}>{{ __('general.saturday') }}</option>
                        <option value="Sunday" {{ 'Sunday' === request('day') ? ' selected' : '' }}>{{ __('general.sunday') }}</option>
                    </select>
                </div>
            @endif
        </div>

        <div class="row mb-3">
            <div class="col-md-4 select-wrapper">
                <button type="submit" class="btn btn-outline-success btn-sm">{{ __('general.filter') }}</button>

                <button type="button" class="btn btn-outline-danger btn-sm"
                        onclick="window.location.href = window.location.href.split('?')[0];"
                >{{ __('general.clear_filters') }}</button>
            </div>
        </div>
    </div>
</form>
