@if(Session::has('message'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                    <p>{{Session('message')}}</p>
            </div>
        </div>
    </div>

@endif
