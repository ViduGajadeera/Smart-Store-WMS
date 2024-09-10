@extends('layout.app')

@section('title', 'Uploaded Manifest Details')

@section('styles')
<style>
    body {
        margin: 0;
        padding: 0;
        overflow: hidden; /* Prevent body from scrolling */
    }

    .manifest-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100vh; /* Full viewport height */
    }

    .manifest-table {
        width: 75%;
        padding: 20px;
        text-align: center;
        overflow-y: auto; /* Enable vertical scrolling */
        max-height: 80vh; /* Set maximum height for scrolling */
       margin-left:250px;
       margin-top:50px;
        
    }

    .manifest-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .manifest-table th,
    .manifest-table td {
        padding: 10px;
        text-align: left;
    }

    .manifest-table th {
        background-color: #3498db;
        color: #fff;
        
    }

    .manifest-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .manifest-table tr:hover {
        background-color: #ddd;
    }
</style>

@endsection

@section('content')
<div class="manifest-container">
    @isset($data)
        <div class="manifest-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $value)
                        @if (is_array($value))
                            @foreach ($value as $subKey => $subValue)
                                @if (is_array($subValue))
                                    @foreach ($subValue as $subSubKey => $subSubValue)
                                        <tr>
                                            <td>{{ $subSubKey }}</td>
                                            <td>{{ is_array($subSubValue) ? json_encode($subSubValue) : $subSubValue }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>{{ $subKey }}</td>
                                        <td>{{ $subValue }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No data found in the uploaded XML file.</p>
    @endisset
</div>
@endsection
