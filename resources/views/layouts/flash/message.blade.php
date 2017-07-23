@foreach (session('flash_notification', collect())->toArray() as $message)
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="alert
                    alert-{{ $message['level'] }}
                {{ $message['important'] ? 'alert-important' : '' }}"
                     role="alert"
                >
                    @if ($message['important'])
                        <button type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-hidden="true"
                        >&times;</button>
                    @endif

                    {!! $message['message'] !!}
                </div>
            </div>
        </div>
    </div>
@endforeach

{{ session()->forget('flash_notification') }}
