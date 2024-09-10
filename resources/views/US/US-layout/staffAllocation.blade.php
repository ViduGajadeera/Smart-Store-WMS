@extends('layout.US-app')
@section('title','Staff Allocation')

@section('styles')
<style>
  .all-cards {
    margin-top: 40px;
    margin-left: 170px;
    width: 80%; 
  }
  .search-button {
    margin-top: 20px;
  }

  .table-container {
    margin-top: 40px;
    width: 50%; 
    margin-left: 170px;
  }

  .table-container .card {
    width: 100%; 
  }
</style>
@endsection

@section('content')

<div class="container">
<form id="staffForm" method="GET" action="{{ route('Allocation') }}">

  <div class="all-cards">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h5>Daily Staff Allocation</h5>

          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  Date: <input type="text" class="form-control" name="date" placeholder="{{ \Carbon\Carbon::today()->format('d-m-Y') }}" disabled>
                </div>
              </div>
            </div>
            <div class="col-sm-6 role-card">
              <div class="card">
                <div class="card-body">
                  Role: 
                  <select class="form-control" name="role">
                  <option value="">SELECT</option>
                    <option value="LDC">LDC</option>
                    <option value="Test">Test</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="d-grid gap-2 search-button">
            <input type="submit" class="btn btn-primary" value="Search">
           
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

 
  <div id="staffTableContainer" style="display: none; margin-top: 20px;">
  <div class="table-container">
    <div class="card">
      <div class="card-body">
      
        <h4 class="card-title">Staff Allocation Table</h4>
        <h5>Date : {{ \Carbon\Carbon::today()->format('d-m-Y') }}</h5>
        <table class="table">
          <thead>
            <tr>
            
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($staff as $member)
            <tr>
             
              <td>{{$member->first_name}}</td>
              <td>{{$member->last_name}}</td>
              <td>{{$member->Role}}</td>
              <td> 
                @if($member->daily_allocation==0)
                <form action="{{route('allocate', $member->id)}}" method="POST">
                  @csrf
                <button class="btn btn-primary btn-sm" value="$member->id">Allocate</button>
                </form>
                @else
                <form action="{{route('deallocate', $member->id)}}" method="POST">
                  @csrf 
                <button class="btn btn-danger btn-sm">Deallocate</button>
                </form>
                @endif
              </td>
            </tr>
            @empty
                    <tr>
                        <td colspan="2"><i>No staff found for the selected role.</i></td>
                    </tr>
            @endforelse
           
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const role = "{{ request()->get('role') }}";

        if (role) {
            document.getElementById('staffTableContainer').style.display = 'block';
        }
    });
</script>

@endsection
