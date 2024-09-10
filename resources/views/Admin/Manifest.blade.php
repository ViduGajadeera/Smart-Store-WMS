@extends('layout.app')

@section('title', 'Upload Manifest')

@section('styles')
    <style>
        .manifest-form {
            width: 500px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid #3498db;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-left:200px;
        }


        #formFileLg {
            margin-top: 10px;
        }

        .manifest-container {
            padding: 80px;
        }

        .submit-button {
            margin-top: 20px;
            margin-left:370px;
        }

        .alert-success {
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')

<form action="{{ route('manifestController.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="manifest-container" style="min-height: 100vh;">
        <div class="manifest-form">
            <label for="formFileLg" class="form-label">
                <h4>Upload Manifest File</h4>

                @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('blSavedCount'))
    <div class="alert alert-info">
        Uploaded BL numbers: {{ session('blSavedCount') }}
    </div>
@endif


            </label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" name="file">
            <div class="submit-button">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>


@endsection
