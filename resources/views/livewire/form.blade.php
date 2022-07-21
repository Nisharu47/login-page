
{{-- login form --}}
<div>
    <div class="container" style="margin-top: 50px">
        <div class="d-flex justify-content-between">
            <button wire:click='showFrom' class="btn btn-success">Create</button>
        </div>
        
        
        @if ($createData == true)
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Details Form</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-wrap p-4 p-md-5">
                      <div class="icon d-flex align-items-center justify-content-center">
                          <span class="fa fa-user-o"></span>
                      </div>
                      <h3 class="text-center mb-4">Enter Your Details Here</h3>
                            <form action="#" class="login-form">
                          <div class="form-group">
                              <input type="text" name="username" class="form-control rounded-left" placeholder="Username" wire:model='username'>
                              <br>
                                 @error('username')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                 @enderror
                          </div>
                          <div class="form-group">
                            <input type="email" name="email" class="form-control rounded-left" placeholder="Email" wire:model='email'>
                            <br>
                                 @error('email')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                 @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="nic" class="form-control rounded-left" placeholder="NIC" wire:model='nic'>
                            <br>
                                 @error('nic')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                 @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" class="form-control rounded-left" placeholder="Mobile" wire:model='mobile'>
                            <br>
                                 @error('mobile')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                 @enderror
                        </div>
                        
                    <div class="form-group">
                        <div class="col text-center">
                        <button type="submit" class="btn btn-outline-success" wire:click='saveData'>Submit</button>
                        </div>
        
                        @if (session()->has('add_message'))
                            
                                {{session('add_message')}}
                        @endif
                    </div>
                  </form>
                </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        
        <br>
        <br>
        
       
        
        
        @if ($selectData == true)
        {{-- <div class="d-flex justify-content-end">
            <input type="text" wire:model='search' name="search" id="search" placeholder="Search Here ...." class="form-control form-control-lg mt-2 w-50">
        </div>
        {{$search}} --}}
        <div class="table-responsive mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>NIC</th>
                        <th>Mobile</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
        
                    @forelse ($customers as $customer)
                    <tr class="bg-white text-dark">
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->nic}}</td>
                        <td>{{$customer->mobile}}</td>
                        <td><button wire:click='edit({{$customer->id}})' class="btn btn-success">Edit</button>
                            <button wire:click='delete({{$customer->id}})' class="btn btn-danger">Delete</button></td>
                    </tr>
                    @empty
                    <h1>Record not found</h1>
                    @endforelse
                </tbody>
            </table>
        
            {{-- <div class="text-center">
                {{$students->links()}}
            </div> --}}
        </div>
        
        @endif


        @if ($updateData == true)
        {{-- update data --}}
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Update Form</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-wrap p-4 p-md-5">
                      <div class="icon d-flex align-items-center justify-content-center">
                          <span class="fa fa-user-o"></span>
                      </div>
                      <h3 class="text-center mb-4">Enter Your Details Here</h3>
                            <form action="#" wire:submit.prevent='update({{$ids}})' class="login-form">
                          <div class="form-group">
                              <input type="text" name="edit_username" class="form-control rounded-left" placeholder="Username" wire:model='edit_username'>
                          </div>
                          <div class="form-group">
                            <input type="email" name="edit_email" class="form-control rounded-left" placeholder="Email" wire:model='edit_email'>
                        </div>
                        <div class="form-group">
                            <input type="text" name="edit_nic" class="form-control rounded-left" placeholder="NIC" wire:model='edit_nic'>
                        </div>
                        <div class="form-group">
                            <input type="text" name="edit_mobile" class="form-control rounded-left" placeholder="Mobile" wire:model='edit_mobile'>
                        </div>
                        
                    <div class="form-group">
                        <div class="col text-center">
                        <button type="submit" class="btn btn-outline-success" >Submit</button>
                        </div>
        
                        @if (session()->has('add_message'))
                            
                                {{session('add_message')}}
                        @endif
                    </div>
                  </form>
                </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        
    </div>
</div>