@extends('layout.US-app')
@section('title','Task Allocation')
@section('styles')
<style>
.all-cards{
    margin-top:40px;
    margin-left:170px;
  }

  .second-card{
    margin-top:40px;
    max-width:800px;
    margin-left:320px;
    margin-top:100px;
    
  }
</style>
@endsection

@section('content')







<div class="container">
<div class="all-cards">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5>Container Operation</h5>
            </div>
            
        </div>
    </div>
</div>



<div class="card second-card">
  <div class="card-header">
   <i> Container In & Grant Permissions </i>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    <table class="table table-bordered border-primary">
                <thead> <th>Container Number</th>
                <th>Vessel Reference</th>
                <th>Size</th>
                <th>Action</th>
                
                </thead>

          
            </table>
        
    </blockquote>
  </div>
</div>





@endsection
