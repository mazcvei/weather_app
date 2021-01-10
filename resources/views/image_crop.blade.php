@extends('layouts.app')

@section('content')
    <div class="container">
        <br />
        <h3 align="center">How to Crop And Upload Image in Laravel 6 using jQuery Ajax</h3>
        <br />
        <div class="card">
            <div class="card-header">Crop and Upload Image</div>
            <div class="card-body">
                <div class="form-group">
                    @csrf
                    <div class="row">
                        <div class="col-md-4" style="border-right:1px solid #ddd;">
                            <div id="image-preview"></div>
                        </div>
                        <div class="col-md-4" style="padding:75px; border-right:1px solid #ddd;">
                            <p><label>Select Image</label></p>
                            <input type="file" name="upload_image" id="upload_image" />
                            <br />
                            <br />
                            <button class="btn btn-success crop_image">Crop & Upload Image</button>
                        </div>
                        <div class="col-md-4" style="padding:75px;background-color: #333">
                            <div id="uploaded_image" align="center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




@endsection

