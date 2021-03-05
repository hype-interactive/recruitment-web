        
        @extends('layouts.master_layout')
        @section('page-summary')
        <b>Edit Job Post </b>
        @endsection
        @section('body')
            <div class="add-job-post-form">
                <form action="{{route('admin.edit_job_post')}}" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Job post title</label>
                            <input type="text" name="title" class="form-control"  id="inputAddress" value="{{$post->title}}">
                        </div>
                    </div>
                    <div class="form-row">
        
                      <div class="form-group col-md-3">
                        <label for="inputState">Dead line</label>
                        <input type="date"  class="form-control" name="deadline" value="<?php  echo date('Y-m-d',strtotime($post->deadline)); ?>">
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputState">category</label>
                        <select id="inputState" name="job_category_id" class="form-control">
                          @foreach ($job_categories as $job_category)
                              <option value="{{$job_category->id}}" {{$post->job_category_id == $job_category->id ? "selected":""  }}>{{$job_category->name}}</option>
                          @endforeach
                        </select>
                      </div>             
                       <div class="form-group col-md-3">
                        <label for="inputState">Location</label>
                        <select id="inputState"  name="region" class="form-control" >
                          <option selected>Choose...</option>
                          @foreach ($regions as $region)
                              <option value={{$region->id}} {{ $post->region_id == $region->id ? "selected":""}}>{{$region->name}}</option>
                          @endforeach
                        </select>
                      </div>              
                      <div class="form-group col-md-3">
                        <label for="inputState">Job type</label>
                        <select id="inputState" name="type" class="form-control">
                          <option selected>Choose...</option>
                          <option value="Full time"{{$post->type ="Full time"?"selected":""}}>Full time</option>
                          <option value="Part time"{{$post->type ="Part time"?"selected":""}}>Part time</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Enter job description</label>
                            <textarea style="height: fit-content" class="form-control" name="description" id="exampleFormControlTextarea1" >{{$post->description}}</textarea>
                          </div>
                    </div>
                    <input type="hidden" name="job_post_id" value="{{$post->id}}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
            </div>
        
            <!DOCTYPE html>
          <script src="https://cdn.tiny.cloud/1/0c2huj8v490azntzlod6qqyv41rpgsna2ep41exubhgn627b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
          <script>
            tinymce.init({
              selector: 'textarea',
              plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
              toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
              toolbar_mode: 'floating',
              tinycomments_mode: 'embedded',
              tinycomments_author: 'Author name'
            });

          </script>
        @endsection