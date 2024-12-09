@extends('admin.layouts.admin')

@section('content')

      <!-- Main content -->
      <section class="content" id="addThisFormContainer">
        <div class="container-fluid">
          <div class="row justify-content-md-center">
            <!-- right column -->
            <div class="col-md-12">
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
                            <div class="col-lg-12">
                                <input type="hidden" class="form-control" id="codeid" name="codeid" value="{{$data->id}}">
                                <div>
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{$data->title}}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div>
                                    <label for="big_title">Long Title</label>
                                    <input type="big_title" id="big_title" name="big_title" class="form-control" value="{{$data->big_title}}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                  <label>Image (1920*1280)</label>
                                  <input class="form-control" id="image" name="image" type="file">
                                </div>
              
                                <div class="card card-outline card-info">
                                      <!-- /.card-header -->
                                      <div class="card-body">
                                          @if (isset($data->image))
                                          <img src="{{asset('images/about/'.$data->image)}}" alt="" style="width: 230px">
                                          @endif
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control ckeditor" cols="30" rows="5">{!! $data->description !!}</textarea>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
  
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="addBtn" class="btn btn-secondary" value="Update">Update</button>
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


</div>


@endsection
@section('script')

<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.versionCheck = false;
    $('.ckeditor').each(function () {
        CKEDITOR.replace(this);
    });
  </script>
  
    <script>
        $(document).ready(function () {
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
                $("#newBtn").show(100);
                clearform();
            });
            //header for csrf-token is must in laravel
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //
            var url = "{{URL::to('/admin/about')}}";
            var upurl = "{{URL::to('/admin/about-update')}}";
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
                    form_data.append("big_title", $("#big_title").val());
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
                    form_data.append("big_title", $("#big_title").val());
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

                $("#title").val(data.title);
                $("#big_title").val(data.big_title);
                $("#description").val(data.description);
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