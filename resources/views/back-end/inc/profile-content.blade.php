<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <h2>My Profile</h2>
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset($user->photo()) }}"
                             alt="User profile picture">

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b> <a class="pull-right">{{$user->mobile}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Sex</b> <a class="pull-right">{{$user->sex}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b> <a class="pull-right">{{$user->role}}</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block my-5"><b>Welcome</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-6">
                <h2>Update User Profile</h2>
                @if($msg = session()->get('success'))
                   <div class="alert alert-success">{{$msg}}</div>
                @endif
                <div class="box box-primary">
                    <div class="box-body box-profile">
                    <form action="{{route('admin.profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Photo</label>
                                    <input type="file" class="form-control" name="photo" id="name">
                                </div>
                                <div class="col-md-6">
                                    <img src="{{asset($user->photo())}}" style="border-radius: 100%;" width="100" height="100" class="rounded-circle" alt="{{$user->name}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control border " name="email" id="email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" name="mobile" id="email" value="{{$user->mobile}}">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <label for="sex">Sex</label>
                                            <select name="sex" class="form-control text-danger text-bold" id="sex">
                                                <option  selected>{{$user->sex}}</option>
                                                @foreach($user_sex as $sex)
                                                    <option value="{{$sex}}">{{$sex}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <label for="sex">Role</label>
                                            <select name="role" class="form-control text-danger text-bold" id="sex">
                                                <option  selected>{{$user->role}}</option>
                                                @foreach($user_roles as $role)
                                                  <option value="{{$role}}">{{$role}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-success" value="Update Profile">
                        </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


</section>
