<section class="content">
    <h1>All Users</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">your users here</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                          <tr class="bg-info">
                              <th>Id</th>
                              <th>photo</th>
                              <th>username</th>
                              <th>email</th>
                              <th>mobile</th>
                              <th>sex</th>
                              <th>role</th>
                              <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th style="width: 10px">{{$user->id}}</th>
                            <th style="width: 10px">
                                <img style="width: 50px;height: 50px;border-radius: 100%;" src="{{asset($user->photo())}}" alt="{{$user->name}}">
                            </th>
                            <th style="width: 10px">{{$user->name}}</th>
                            <th style="width: 10px">{{$user->email}}</th>
                            <th style="width: 10px">{{$user->mobile}}</th>
                            <th style="width: 10px">{{$user->sex}}</th>
                            <th style="width: 10px">{{$user->role}}</th>
                            <th style="width: 10px">
                                the Actions
                            </th>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{$users->links()}}
                    </ul>
                </div>
            </div>
            <!-- /.box -->

        </div>
    </div>

</section>
