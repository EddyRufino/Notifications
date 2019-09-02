@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notificaciones</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>No leídas</h2>
                <ul class="list-group">
                    @foreach ($unreadNotifications as $unreadNotification)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ $unreadNotification->data['link'] }}">
                                    {{ $unreadNotification->data['text'] }}
                                </a>
                                <form method="POST"
                                    action="{{ route('notifications.read', $unreadNotification->id) }}"
                                    class="float-lg-right"
                                >
                                @method('PATCH') @csrf

                                    <button class="btn btn-danger btn-xs">x</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Leídas</h2>
                <ul class="list-group">
                    @foreach ($readNotifications as $readNotification)
                        <li class="list-group-item">
                            <a href="{{ $readNotification->data['link'] }}">
                                {{ $readNotification->data['text'] }}
                            </a>
                            <form method="POST"
                                action="{{ route('notifications.destroy', $readNotification->id) }}"
                                class="float-lg-right"
                            >
                            @method('DELETE') @csrf

                                <button class="btn btn-danger btn-xs">x</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
