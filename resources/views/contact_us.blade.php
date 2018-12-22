@extends('layouts.layout')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col col-md-5 col-md-offset-3">
                        <form action="{{route('contact-us')}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="post">
                            <label>Your Email</label>
                            <input class="form-control" type="email" name="from">
                            <label>Subject</label>
                            <input class="form-control" type="text" name="subject">
                            <label>Message</label>
                            <textarea class="form-control" style="height: 100px"  name="body"></textarea>
                            <br/>
                            <button type="submit" class="btn btn-primary" style="background-color: red;">Send email</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection