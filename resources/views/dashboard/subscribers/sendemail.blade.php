@extends('dashboard.layouts.layout')

@section('body')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">{{ __('words.dashboard') }}</li>
    <li class="breadcrumb-item"><a href="#">{{ __('words.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('words.dashboard') }}</li>
</ol>

<h1 class="text-center">Subscribers Data To Sent </h1>

<form action=<?= "/dashboard/Store/email/" . $data->id ?> method="post">
    <div class="container mt-2 mb-2 pd-2">
        @csrf
        <div class="form-group mt-2 mb-2 pd-2">
            <label for="Greeting">Greeting</label>
            <input type="text" class="form-control" name="greeting" required placeholder="Greeting">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="Body">Body</label>
            <input type="text" class="form-control" name="body" required placeholder="Body">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="actiontext">Action text</label>
            <input type="text" class="form-control" name="actiontext" required placeholder="Action text">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="actionurl">Action url</label>
            <input type="text" class="form-control" name="actionurl" required placeholder="Action url">
        </div>

        <div class="form-group mt-2 mb-2 pd-2">
            <label for="endText">End text</label>
            <input type="text" class="form-control" name="endtext" required placeholder="End text">
        </div>


        <button type="submit" class="btn btn-success">Submit</button>

</form>
</div>
@endsection
