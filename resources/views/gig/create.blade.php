@extends('layouts.base')

@section('content')
    <div class="panel panel-danger">
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('gigs.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">GIG TITLE</label>
                    <div class="col-sm-10">
                        <textarea rows="3" id="title" class="form-control" name="title"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">CATEGORY</label>
                    <div class="col-sm-10">
                        <select id="category" name="category" class="form-control">
                            <option value="GD">Graphis & Design</option>
                            <option value="DM">Digital & Marketing</option>
                            <option value="VA">Video & Animation</option>
                            <option value="MA">Music & Video</option>
                            <option value="PT">Programming & Tech</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">DESCRIPTION</label>
                    <div class="col-sm-10">
                        <textarea rows="5" class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">PRICE ($)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="5" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">PHOTO</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">STATUS</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Publish Gig</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection