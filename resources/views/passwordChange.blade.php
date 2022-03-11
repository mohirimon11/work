@extends('style')


<div class="row justify-conten-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    {{__('Change your password')}}<br>
                                    <a href="{{url('/')}}">Back Home</a>
                                </div>
                                
                                <!-- For Validitation -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- for combind validation -->
                                @if(session()->has('success'))
                                <strong class="text-success">{{session()->get('success')}}</strong>
                                @endif
                                @if(session()->has('error'))
                                <strong class="text-success">{{session()->get('error')}}</strong>
                                @endif
                                <div class="card-body">
                                    <form action="{{Route('update.password')}}" method="POST" >
                                        @csrf
                                        <div>
                                            <label>Current Password</label>
                                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" require value="{{old('current_password')}}">
                                                @error('current_password')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div><br>
                                        <div>
                                            <label>New Password</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" require>
                                                @error('password')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div><br>
                                        <div>
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" require>
                                                @error('confirm_password')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Chang Password</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>