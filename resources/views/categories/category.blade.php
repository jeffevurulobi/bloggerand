@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach

            @endif

            @if(session('response'))

            <div class="alert alert-sucess" style="background-color:green; color:yellow;">{{ session('response')}}</div>

            @endif
            <div class="card">
                <div class="card-header">category</div>

                <div class="card-body">              
                  <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                        <div class="card">
                        
                            <div class="card-body">
                                <form method="POST" action="{{ url('/addCategory') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="category" class="col-md-4 col-form-label text-md-right">category</label>

                                        <div class="col-md-6">
                                            <input id="category" type="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>

                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>                 
                                    
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                            Add To Categories
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection