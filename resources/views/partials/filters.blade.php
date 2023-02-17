<form action="{{ Request::url() }}" method="GET">
    <div class="card-body">
        <h4>{{ __('Filters') }}</h4>

        <div class="row mb-3">
            @if (in_array('company', $filters))
                <div class="col-md-3">
                    <label for="company" class="text-md-right">{{ __('Company') }}</label>

                    <select class="form-select form-control-rounded small" id="company" name="company">
                        <option value="" selected>{{ __('Select Company') }}</option>

                        @foreach($companies as $id => $company)
                            <option value="{{ $id }}" {{ $id== request('company') ? ' selected' : '' }}>{{ $company }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (in_array('season', $filters))
                <div class="col-md-3">
                    <label for="season" class="text-md-right">{{ __('Flight Season') }}</label>

                    <select class="form-select form-control-rounded small" id="season" name="season">
                        <option value="" selected>{{ __('Select Flight Season') }}</option>

                        @foreach($seasons as $season)
                            <option value="{{ $season->id }}" {{ $season->id == request('season') ? ' selected' : '' }}>
                                {{ $season->start_date?->format('d M Y') }} - {{ $season->end_date?->format('d M Y') }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (in_array('category', $filters))
                <div class="col-md-2">
                    <label for="category" class="text-md-right">{{ __('Flight Category') }}</label>

                    <select class="form-select form-control-rounded small" id="category" name="category">
                        <option value="" selected>{{ __('Select Flight Category') }}</option>

                        @foreach($flightCategories as $flightCategory)
                            <option value="{{ $flightCategory }}" {{ $flightCategory === request('category') ? ' selected' : '' }}>
                                {{ $flightCategory }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (in_array('fromDate', $filters))
                <div class="col-md-2">
                    <label for="fromDate" class="text-muted bold">{{ __('From Date') }}</label>

                    <input class="form-control" type="date" id="fromDate" name="fromDate" value="{{ request('fromDate') }}">
                </div>
            @endif

            @if (in_array('toDate', $filters))
                <div class="col-md-2">
                    <label for="toDate" class="text-muted bold">{{ __('To Date') }}</label>

                    <input class="form-control" type="date" id="toDate" name="toDate" value="{{ request('toDate') }}">
                </div>
            @endif
        </div>

        <div class="row mb-3">
            <div class="col-md-4 select-wrapper">
                <button type="submit" class="btn btn-outline-success btn-sm">{{ __('Filter') }}</button>

                <button type="button" class="btn btn-outline-success btn-sm"
                        onclick="window.location.href = window.location.href.split('?')[0];"
                >{{ __('Clear all filters') }}</button>
            </div>
        </div>
    </div>
</form>
