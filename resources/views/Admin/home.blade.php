@extends('layout.app')

@section('title', 'Home')

@section('styles')
<style>
  .all-cards{
    margin-top:40px;
    margin-left:170px;
  }

  .second-card{
    margin-top:40px;
  }
</style>

@endsection

@section('content')
<div class="container">
  <div class="all-cards">
  <div class="card">
  
  <div class="card-body">
    <h5 class="card-title">Welcome to Smart-Store WMS</h5>
   
    
  </div>
</div>


<div class="second-card">
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Currency Rate</h5>
        <hr/>
        <p class="card-text">1 USD - LKR 303.53</p>
        
      </div>
    </div>
  </div>
</div>



</div>
</div>
@endsection