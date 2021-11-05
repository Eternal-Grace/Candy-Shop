@extends('layouts.app')

@section('title')
    @lang('pages.settings')
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">@lang('pages.settings')</div>
                <div class="card-body">
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#deleteUserModal" data-whatever="{{ $username }}">
                                @lang('user.account.delete')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Important</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="fas fa-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.delete') }}">
                    @csrf
                    <div class="form-group row mb-0">
                        <div class="col col-12 text-center py-3">
                            <strong>
                                @lang('user.account.delete_message')
                            </strong>
                        </div>

                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-danger">Continue</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
