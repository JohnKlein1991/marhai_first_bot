<?php
/**
 *
 * @var $settings \Illuminate\Support\Collection
 */

?>
@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Settings</h1>
        @if(\Illuminate\Support\Facades\Session::has('status'))
        <div class="alert alert-danger">
            <span>{{ \Illuminate\Support\Facades\Session::get('status') }}</span>
        </div>
        @endif
        <form action="{{ route('admin.setting.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Webhook URL for TelegramBot</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary">Action</button>
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"
                               onclick="document.getElementById('url_callback_bot').value = '{{ url('') }}'"
                            >Insert URL</a>
                            <a class="dropdown-item"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('setwebhook').submit()"
                            >Set URL</a>
                            <a class="dropdown-item"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit()"
                            >Get information</a>
                        </div>
                    </div>
                    <input
                            type="url"
                            class="form-control"
                            id="url_callback_bot"
                            name="url_callback_bot"
                            value="{{ isset($settings['url_callback_bot']) ? $settings['url_callback_bot'] : '' }}"
                    >
                </div>
            </div>
            <button class="btn btn-primary" type="submit" >Save</button>
        </form>
        <form action="{{ route('admin.setting.setwebhook') }}" method="post" id="setwebhook" style="display: none;">
            @csrf
            <input
                    type="hidden"
                    name="url"
                    value="{{ isset($settings['url_callback_bot']) ? $settings['url_callback_bot'] : '' }}"
            >
        </form>
        <form action="{{ route('admin.setting.getwebhookinfo') }}" method="post" id="getwebhookinfo" style="display:none;">
            @csrf
            <input
                    type="hidden"
                    name="url"
                    value="{{ isset($settings['url_callback_bot']) ? $settings['url_callback_bot'] : '' }}"
            >
        </form>
    </div>
@endsection