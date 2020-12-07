 @if(session()->has('success_message'))
    <div class="alert alert-success alert-dismissible bg-primary" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Thank You!</strong> {{ session()->get('success_message') }}
    </div>
@endif
@if(session()->has('error_message'))
    <div class="alert alert-danger alert-dismissible bg-dagner" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sorry!</strong> {{ session()->get('error_message') }}
    </div>
@endif