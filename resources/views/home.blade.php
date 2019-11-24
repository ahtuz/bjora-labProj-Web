@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

        <form method="GET" class="mb-3 w-50" action="{{ route('home') }}">
            <div class="input-group ">
                <input type="text" class="form-control" placeholder="Search by username or question...">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

            <div class="card">
                <div class="card-header">Questions</div>

                <div class="card-body">
                    <!-- @//foreach($questions as question) -->
                        <!-- <div></div> -->
                    <!-- @//endforeach -->
                    <span>testo</span>
                    
                </div>

                <!-- {//{ $questions->links() }} -->

            </div>
        </div>
    </div>
</div>
@endsection
