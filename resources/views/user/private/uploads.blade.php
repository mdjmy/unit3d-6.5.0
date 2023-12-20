@extends('layout.default')

@section('title')
    <title>{{ $user->username }} {{ __('user.uploads') }} - {{ config('other.title') }}</title>
@endsection

@section('breadcrumbs')
    <li class="breadcrumbV2">
        <a href="{{ route('users.show', ['username' => $user->username]) }}" class="breadcrumb__link">
            {{ $user->username }}
        </a>
    </li>
    <li class="breadcrumb--active">
        {{ __('user.uploads') }}
    </li>
@endsection

@section('nav-tabs')
    @include('user.buttons.user')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block">
            <div class="button-holder some-padding">
                <div class="button-left">

                </div>
                <div class="button-right">
                    <span class="badge-user"><strong>{{ __('user.total-download') }}:</strong>
                        <span class="badge-extra text-red">{{ App\Helpers\StringHelper::formatBytes($his_downl, 2) }}</span>
                        <span class="badge-extra text-orange" data-toggle="tooltip"
                              data-original-title="{{ __('user.credited-download') }}">{{ App\Helpers\StringHelper::formatBytes($his_downl_cre, 2) }}</span>
                    </span>
                    <span class="badge-user"><strong>{{ __('user.total-upload') }}:</strong>
                        <span class="badge-extra text-green">{{ App\Helpers\StringHelper::formatBytes($his_upl, 2) }}</span>
                        <span class="badge-extra text-blue" data-toggle="tooltip"
                              data-original-title="{{ __('user.credited-upload') }}">{{ App\Helpers\StringHelper::formatBytes($his_upl_cre, 2) }}</span>
                    </span>
                </div>
            </div>
            <hr class="some-padding">
            @livewire('user-uploads', ['userId' => $user->id])
        </div>
@endsection
