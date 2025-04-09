@extends('admin.layouts.admin')

@section('content')

<!-- Main content -->
<section class="content mt-3" id="newBtnSection">
    <div class="container-fluid">
      <div class="row">
        <div class="col-2">
            <button type="button" class="btn btn-secondary my-3" id="newBtn">Add new</button>
        </div>
      </div>
    </div>
</section>
  <!-- /.content -->

  
      <!-- Main content -->
      <section class="content" id="addThisFormContainer">
        <div class="container-fluid">
          <div class="row justify-content-md-center">
            <!-- right column -->
            <div class="col-md-10">
              <!-- general form elements disabled -->
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Add new </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="ermsg"></div>

                    <form id="createThisForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <input type="hidden" class="form-control" id="codeid" name="codeid">
                                <div>
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div>
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-lg-4">
                                <div>
                                    <label for="image">Image</label>
                                    <input class="form-control" id="image" name="image" type="file">
                                </div>

                            </div>

                            
                            <div class="col-lg-12">
                                <div>
                                    <label for="link">Link</label>
                                    <input type="text" id="link" name="link" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div>
                                    {{-- <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control ckeditor" cols="30" rows="5"></textarea> --}}

                                    <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter your description"></textarea>

                                </div>

                            </div>

                        </div>
                    </form>
                </div>
  
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="addBtn" class="btn btn-secondary" value="Create">Create</button>
                  <button type="submit" id="FormCloseBtn" class="btn btn-default">Cancel</button>
                </div>
                <!-- /.card-footer -->
                <!-- /.card-body -->
              </div>
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->



      
<!-- Main content -->
<section class="content" id="contentContainer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">All Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="container" style="max-width: 1400px;">
                    <table class="table table-bordered table-hover table-responsive" id="example" style="width: 100%">
                        <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Title</th>
                            <th style="text-align: center">Category</th>
                            <th style="text-align: center">Image</th>
                            <th style="text-align: center">Link</th>
                            <th style="text-align: center">Description</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $key => $data)
                            <tr>
                                <td style="text-align: center">{{ $key + 1 }}</td>
                                <td style="text-align: center">{{$data->title}}</td>
                                <td style="text-align: center">{{$data->category->name}}</td>
                                <td style="text-align: center">
                                    @if ($data->image)
                                    <img src="{{asset('images/gallery/'.$data->image)}}" height="120px" width="220px" alt="">
                                    @endif
                                </td>
                                <td style="text-align: center">{{$data->link}}</td>
                                <td style="text-align: center">
                                    {!! Str::limit($data->description, 200) !!}
                                </td>
        
                                <td style="text-align: center">
                                    
                                {{-- <a href="{{route('admin.transactionView',$data->id)}}" ><i class="fa fa-eye" style="color: #548058;font-size:16px;"></i></a> --}}
        
                                <a id="EditBtn" rid="{{$data->id}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                <a id="deleteBtn" rid="{{$data->id}}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        
                        </tbody>
                      </table>
                </div>

              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
        
</div>


@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
{{-- <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script> --}}

<!-- Summernote -->
{{-- <script src="../../plugins/summernote/summernote-bs4.min.js"></script> --}}
    <script>
        $(document).ready(function () {
            $("#addThisFormContainer").hide();
            $("#newBtn").click(function(){
                $("#description").addClass("ckeditor");
                for ( instance in CKEDITOR.instances ) {
                    CKEDITOR.instances[instance].updateElement();
                } 
                 CKEDITOR.replace( 'description' );
                clearform();
                $("#newBtn").hide(100);
                $("#addThisFormContainer").show(300);

            });
            $("#FormCloseBtn").click(function(){
                window.setTimeout(function(){location.reload()},100)
                $("#addThisFormContainer").hide(200);
                $("#newBtn").show(100);
                clearform();
            });
            //header for csrf-token is must in laravel
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //
            var url = "{{URL::to('/admin/gallery')}}";
            var upurl = "{{URL::to('/admin/gallery-update')}}";
            // console.log(url);
            $("#addBtn").click(function(){
            //   alert("#addBtn");
                if($(this).val() == 'Create') {

                    for ( instance in CKEDITOR.instances ) {
                    CKEDITOR.instances[instance].updateElement();
                    } 

                    var file_data = $('#image').prop('files')[0];
                    if(typeof file_data === 'undefined'){
                        file_data = 'null';
                    }

                    var form_data = new FormData();
                    form_data.append('image', file_data);
                    form_data.append("title", $("#title").val());
                    form_data.append("link", $("#link").val());
                    form_data.append("category_id", $("#category_id").val());
                    form_data.append("description", $("#description").val());
                    $.ajax({
                      url: url,
                      method: "POST",
                      contentType: false,
                      processData: false,
                      data:form_data,
                      success: function (d) {
                          if (d.status == 303) {
                              $(".ermsg").html(d.message);
                          }else if(d.status == 300){
                                $(".ermsg").html(d.message);
                                window.setTimeout(function(){location.reload()},2000)
                          }
                      },
                      error: function (d) {
                          console.log(d);
                      }
                  });
                }
                //create  end
                //Update
                if($(this).val() == 'Update'){

                    for ( instance in CKEDITOR.instances ) {
                    CKEDITOR.instances[instance].updateElement();
                    } 
                    var file_data = $('#image').prop('files')[0];
                    if(typeof file_data === 'undefined'){
                        file_data = 'null';
                    }
                    var form_data = new FormData();
                    form_data.append('image', file_data);
                    form_data.append("title", $("#title").val());
                    form_data.append("link", $("#link").val());
                    form_data.append("category_id", $("#category_id").val());
                    form_data.append("description", $("#description").val());
                    form_data.append("codeid", $("#codeid").val());
                    $.ajax({
                        url:upurl,
                        type: "POST",
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        data:form_data,
                        success: function(d){
                            console.log(d);
                            if (d.status == 303) {
                                $(".ermsg").html(d.message);
                                pagetop();
                            }else if(d.status == 300){
                                $(".ermsg").html(d.message);
                                window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error:function(d){
                            console.log(d);
                        }
                    });
                }
                //Update
            });
            //Edit
            $("#contentContainer").on('click','#EditBtn', function(){
                //alert("btn work");
                codeid = $(this).attr('rid');
                //console.log($codeid);
                info_url = url + '/'+codeid+'/edit';
                //console.log($info_url);
                $.get(info_url,{},function(d){
                    populateForm(d);
                    pagetop();
                    window.scrollTo(0, 300);
                });
            });
            //Edit  end

            //Delete
            $("#contentContainer").on('click','#deleteBtn', function(){
                if(!confirm('Sure?')) return;
                codeid = $(this).attr('rid');
                info_url = url + '/'+codeid;
                $.ajax({
                    url:info_url,
                    method: "GET",
                    type: "DELETE",
                    data:{
                    },
                    success: function(d){
                        if(d.success) {
                            alert(d.message);
                            location.reload();
                        }
                    },
                    error:function(d){
                        console.log(d);
                    }
                });
            });
            //Delete

            function populateForm(data){
                for ( instance in CKEDITOR.instances ) {
                    CKEDITOR.instances[instance].updateElement();
                    } 
                    
                $("#description").val(data.description);
                CKEDITOR.replace( 'description' );

                $("#title").val(data.title);
                $("#link").val(data.link);
                $("#category_id").val(data.category_id);
                $("#codeid").val(data.id);
                $("#addBtn").val('Update');
                $("#addThisFormContainer").show(300);
                $("#newBtn").hide(100);
            }
            function clearform(){
                $('#createThisForm')[0].reset();
                $("#addBtn").val('Create');
            }
            
        });

        $(document).ready(function () {
            $('#exdatatable').DataTable();
        });

            
    </script>
      <script>
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
            swal("Copied!");
        }
    </script>
@endsection