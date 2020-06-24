
{{-- @if(count($errors) >0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<br>
         @endforeach
    </div>
@endif --}}
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
@if(session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
@endif

