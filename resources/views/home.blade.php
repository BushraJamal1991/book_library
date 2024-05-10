@extends('layouts.app')

@section('content')
<h2 style="margin-left:50px;">Admin Panel </h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-body">
        <div class="panel-body">
                    <form action="{{route('create_book')}}" method="get" >
                <button  style="width: 150px; margin-left:800px;" type="submit" class="btn btn-primary">Add Book</button>
                </form>
                <br>
                  <div class="panel-body">
                  <form action="{{route('add_main_category')}}" method="get" >
                <button  style="width: 200px; margin-left:800px;" type="submit" class="btn btn-primary">Add Main Category</button>
                </form>
              <br>
              
                    <div class="panel-body">
                    <form action="{{route('add_sub_category')}}" method="get" >
                <button  style="width: 150px; margin-left:800px;" type="submit" class="btn btn-primary">Add Sub Category</button>
                </form>
            <div class="card" style="width: 700px;">
                <div  class="card-header">{{ __('All Books :') }}  
               </div>

               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                    
                      <table class="table table-striped" style="width: 650px;">
                      <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col" style="width: 75px;"></th>
                        <th scope="col" style="width: 75px;"></th>


                                              
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($book as $b)                   
                      <tr>
                        <th scope="row" style="width: 50px;">{{$b->id}}</th>
                        <td style="width: 175px;">{{$b->title}}</td>
                       
                        <td  style="width: 125px;">{{$b->category}}</td>
                                             
                        <td style="width: 75px;">
                        <form action=""  method="post">  
                        @csrf 
                        <button type="submit" class="btn btn-danger">Edit</button>
                        </form> 
                        <br>
                        </td>
                        <td style="width: 75px;">
                        <form action =""  method="post">
                        @csrf  
                        <button type="submit" class="btn btn-primary">Delete</button>    
                    </form>
                        </td>
                        
                      </tr>
                      @endforeach
                    </tbody>

                    </div>
                    
                </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
</div>

@endsection
