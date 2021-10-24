@extends('layout.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <form method="POST" action="{{ route('PersonUpdate') }}" id="formEdit">
        <div class="form-group row">
            <label for="id"  class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
            <input  id="txt_id"  name="id" value="{{ $person->id }}" class="form-control" required readonly/>
            </div>
        </div>
        <div class="form-group row">
            <label for="name"  class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
            <input name="name" id="txt_name" value="{{ $person->name }}" class="form-control" required />
            </div>
        </div>
        <div class="form-group row">
            <label for="email"  class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-10">
            <input name="email" id="txt_email" type="email" value="{{ $person->email }}" class="form-control" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="address"  class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
            <textarea name="address" id="txt_address" class="form-control"   required >{{ $person->address }}</textarea>
            </div>
        </div>
        <div class="form-group  row">
            <label for="telephone"  class="col-sm-2 col-form-label">Telephone</label>
            <div class="col-sm-10">
            <input name="telephone" id="txt_telephone" type="number" value="{{ $person->telephone }}" class="form-control" required />
            </div>
        </div>
        <div class="form-group row">
            <label for="join_date"  class="col-sm-2 col-form-label">Join Date</label>
            <div class="col-sm-10">
            <input name="join_date" id="txt_date" type="date" class="form-control" value="{{ $person->join_date }}" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="current_route"  class="col-sm-2 col-form-label">Current Routes</label>
            <div class="col-sm-10">
            <input name="current_route" id="txt_rooute" type="text" class="form-control" value="{{ $person->current_route }}" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="comments"  class="col-sm-2 col-form-label">Comments</label>
            <textarea name="comments" id="txt_comment" class="form-control"  >{{ $person->commets }}</textarea>
        </div>
        @csrf
        @method('put')
            <input type="submit" value="Save" class="btn btn-success btn-block" />

    </form>
</div>
</body>
</html>
@endsection()
