@extends('style')


<div class="row justify-conten-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{__('Change your password')}}</div>

                                <!-- for combind validation -->
                                @if(session()->has('success'))
                                <strong class="text-success">{{session()->get('success')}}</strong>
                                @endif
                                @if(session()->has('error'))
                                <strong class="text-success">{{session()->get('error')}}</strong>
                                @endif
                                <div class="card-body">
                                    <form method="post" action="{{route('update.password')}}">
                                        @csrf
                                        <div>
                                            <label>Current Password</label>
                                            <input type="password" name="current_password" class="form-control" require>
                                                @error('name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div><br>
                                        <div>
                                            <label>New Password</label>
                                            <input type="password" name="password" class="form-control" require>
                                                @error('name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div><br>
                                        <div>
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control" require>
                                                @error('name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Chang Password</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>