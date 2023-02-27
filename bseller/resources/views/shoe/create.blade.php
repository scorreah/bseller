@extends('layouts.app')
@section('title', 'Home Page - BSeller')
@section('content')
<div class="container">        
    <h1>Add a new Shoe</h1>
    <p>Here you can add a new shoe to the available list</p>        
    <form method="POST" action="{{ route('shoe.save') }}" enctype="multipart/form-data">            
        @csrf
            <div class="form-group">                
                <label for="price">Price:</label>                
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>            
            </div>            
            <div class="form-group">                
                <label for="image">Image:</label>                
                <input type="file" class="form-control" id="image" name="image_shoe" accept="image/*" required>            
            </div>            
            <div class="form-group">                
                <label for="status">Size</label>                
                <input type="number" class="form-control" id="size" name="size" value="{{ old('size') }}" required>        
            </div>            
            <div class="form-group">                
                <label for="brand">Brand:</label>                
                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>            
            </div>            
            <div class="form-group">                
                <label for="model">Model:</label>                
                <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>            
            </div>            
            <button type="submit" class="btn btn-primary">Create</button>        
    </form>    
</div>
@endsection
