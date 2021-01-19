@extends('layouts.base')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h2>Hello {{$user['name']}}</h2>

                <div class="spacer1"></div>

                @if ($synced)
                    <p>Your account settings are now <strong>up to date</strong> with your Cryptonaut420 Account.</p>

                    <p>To make changes to your account, please <a target="_blank" href="https://hazah.tokenly.com">edit your Cryptonaut420 Account</a> and then Sync your account again.</p>

                    <div class="spacer1"></div>

                    <p>
                        <a href="/account/sync" class="btn btn-success">Sync My Account</a>
                        <a href="/account/welcome" class="btn btn-default">Return</a>

                    </p>
                @else
                    <p>Please authorize Hazah to sync your information with this application by clicking the button below.</p>

                    <p>
                        <a href="/account/authorize" class="btn btn-success">Sync My Account</a>
                        <a href="/account/welcome" class="btn btn-default">Return</a>

                    </p>

                @endif

            </div>
        </div>
    </div>


@stop
