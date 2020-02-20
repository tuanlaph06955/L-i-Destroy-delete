@extends('./../layouts')

@section('contents')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
            <a class="btn btn-success" href="{{ route('users.create') }}">Create</a>
          </div>
          
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Birth day</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-primary col-nd-1" href="#">Update</a>
                                <a class="btn btn-danger col-nd-1" href="#" onclick="document.getElementById('delete-form').submit();">Detele</a>
                                <form id="delete-form" action="{{ route('users.delete') }}" method="POST" style="display:none">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                </form>
                            </td>
                        </tr>
                      @endforeach                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection