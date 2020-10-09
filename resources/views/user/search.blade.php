{{-- <br>
    <div class="row">
        <div class="col">
            <div class="card card-body">
    
                <form method="get">		
                        
    
                <button class="btn btn-primary" type="submit">Search</button>
              </form>
    
            </div>
        </div>
        
    </div>
<br> --}}


<div>
<form action="{{ route('user.order') }}" method="get" class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-4" >
    <i class="fa fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-nd ml-3 w-50" name='query' id ='query' value="{{request()->input('query')}}" type="text" placeholder="  Search for Status of Product">
     
</form>
</div>
<br>