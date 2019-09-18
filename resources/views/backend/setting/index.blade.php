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
        <form action="" method="post">
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
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                </div>
            </div>
        </form>
    </div>
@endsection