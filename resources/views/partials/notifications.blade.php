<div class="btn-group">
    <button type="button" class="btn btn-outline-secondary rounded" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell"></i>
        @if (!$notifications->isEmpty())
            <span class="text-secondary">•</span>
        @endif
    </button>

    <ul class="dropdown-menu">
        @if ($notifications->isEmpty())
            {{ __('There are no incoming flights!') }}
        @else
            @foreach($notifications as $notification)
                <li>
                    <a class="dropdown-item" href="{{ $notification->data['url'] }}">
                        <div class="fw-semibold notification-title">
                            {{ $notification->data['title'] }}
                        </div>
                        <span class="fw-medium text-muted small" style="font-size: 12px;">
                            {{ $notification->data['subtitle'] }}
                        </span>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
