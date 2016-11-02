@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <form action="/user/edit-address" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="address" class="col-sm-4 control-label">Address</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-4 control-label">City</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pin_code" class="col-sm-4 control-label">Pin Code</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="pin_code" name="pin_code" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-4 control-label">Phone</label>
                    <div class="col-sm-8">
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Address</button>
            </form>
        </div>
    </div>
@endsection