@if(count($errors)>0)
    @foreach ($errors->all() as $error)
        
    @endforeach
@endif

  

@if(session('success'))
    <div class="alert alert-success" id="success">
        {{session('success')}}
    </div>
@endif


<script>

setTimeout(function() {
    $('#success').fadeOut("slow","swing")
}, 2000);
</script>