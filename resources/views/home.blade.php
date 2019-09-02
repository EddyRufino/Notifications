@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enviar Mensaje</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('messages.store') }}">
                        @csrf
                        <div class="panel-body">

                            <div class="form-group">
                                <select name="recipient_id" id="" class="form-control @error('recipient_id') is-invalid @enderror">
                                    <option value="">Selecciona el usuario</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                @error('recipient_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- {{ $errors->has('body') ? 'has-error' : '' }} --}}
                            <div class="form-group ">
                                <textarea class="form-control @error('body') is-invalid @enderror"
                                         value="{{ old('body') }}"
                                        name="body" cols="30" rows="5">
                                </textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- {!! $errors->first('body', '<span class=help-block>:message</span>') !!} --}}
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Enviar</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
