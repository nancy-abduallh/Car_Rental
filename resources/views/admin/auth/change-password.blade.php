@extends('admin.layouts.app')

@section('title', 'Change Password')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="page-title">Change Password</h2>

        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Form fields</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.change.password.submit') }}" name="chngpwd" class="form-horizontal">
                            @csrf

                            @if(session('success'))
                                <div class="succWrap">
                                    <strong>SUCCESS</strong>: {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="errorWrap">
                                    <strong>ERROR</strong>: {{ $errors->first() }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Current Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                            </div>
                            <div class="hr-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                                </div>
                            </div>
                            <div class="hr-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Confirm Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
                                </div>
                            </div>
                            <div class="hr-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function valid() {
    if(document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
        alert("New Password and Confirm Password Field do not match !!");
        document.chngpwd.confirmpassword.focus();
        return false;
    }
    return true;
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').onsubmit = valid;
});
</script>
@endsection