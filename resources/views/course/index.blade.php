@extends('layouts.app')

@section('content')
<a href="/course/create" class="btn btn-primary">Create</a>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Course Table</h3><br/>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          
           <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Body</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @if(@$results)
             <?php $sn=1; ?>
             @foreach($results as $row)
             <tr>
              <td>{{$sn}}</td>
              <td>{{$row->title}}</td>
              <td>{{$row->body}}</td>
              
              <td> <a href="{{ URL::to('/course/edit') }}/{{$row->id}}"  class="btn-floating waves-effect edit">
                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
              </a>                

              <a href="{{ URL::to('/course/delete') }}/{{$row->id}}"  class="btn-floating waves-effect delete">
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
              </a> 
              </td>
            </tr>
            <?php $sn++ ?>
            @endforeach
            @endif
          </tbody>

        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->


  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
  </section>

@endsection

