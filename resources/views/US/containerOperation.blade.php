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
                <th>Container In</th>
                <th>Permission</th>
                </thead>

                @foreach($container as $unit)
                <tr>
                <td style="text-align: center;">{{$unit->containerNo}}</td>
                <td style="text-align: center;">{{$unit->vesselName}}</td>
                <td style="text-align: center;">{{$unit->type_of_container}}</td>
                
                <form action="{{route('containerIn', $unit->containerNo)}}" method="POST">
                  @csrf
                  @if($unit->status=='not_arrived')
                <td style="text-align: center;"><button class="btn btn-primary btn-sm" value="$unit->containerNo">Container in</button></td>
                @else
                <td style="text-align: center;">Arrived</td>
                
                @endif
                </form>

                <form action="{{route('permission', $unit->containerNo)}}" method="POST">
                  @csrf 
                  @if($unit->permission=='hold')
                <td style="text-align: center;"><button class="btn btn-primary btn-sm" value="$unit->containerNo">Grant Permission</button></td></tr>
                @else
                <td style="text-align: center;">Permission Granted</td>
                
                @endif
              </form>
                @endforeach
            </table>
        
    </blockquote>
  </div>
</div>





@endsection
