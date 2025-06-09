
    @if(Session::has('success'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-group alert-success bg-success alert-icon alert-dismissible fade show" role="alert">
                
                <div class="alert-content">
                    {{ Session::get('success') }}
                </div>
               
            </div>
        </div>
    </div>
    @endif
