@extends('layouts.home')

@section('title', 'Create A Video')

@section('content')
<div class="gt_main_content_wrap">
    <section class="gt_about_bg">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h2>
                            Create Video
                        </h2>
                    </div>
                    <div class="ibox-content create_video_wizard">
                        <div id="wizard" class = "" >
                            <h1>Enter Project Title</h1>
                            <div class="step-content">
                                <div class="text-center m-t-md">
                                  <div class = "col-lg-3"></div>            
                                  <div class = "col-lg-6">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-group"><label>Project title</label> <input type="text" required placeholder="Enter Project title" class="form-control" id="projecttitle" aria-required="true"></div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                  </div>
                                  <div class = "col-lg-3"></div>            
                                </div>
                            </div>

                            <h1>Choose a Video Template</h1>
                            <div class="step-content">
                              <div class = "col-lg-3" >
                                <div class="file-managesr">
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="template_search_keyword"> <span class="input-group-btn"> <button type="button" class="btn btn-primary" id="gotemplatesearch"><i class = "fa fa-search"></i></button> </span>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <h5>CATEGORIES</h5>
                                    <div class="i-checks"><label> <input type="checkbox" value=""> <i></i> eCom </label></div>
                                    <div class="i-checks"><label> <input type="checkbox" value=""> <i></i> Custom Images </label></div>
                                    <div class="i-checks"><label> <input type="checkbox" value=""> <i></i> Health </label></div>
                                    <div class="i-checks"><label> <input type="checkbox" value=""> <i></i> Restaurant </label></div>
                                    <div class="i-checks"><label> <input type="checkbox" value=""> <i></i> Countdown </label></div>
                                    <div class="hr-line-dashed"></div>
                                    <h5 class="tag-title">Tags</h5>
                                    <ul class="tag-list" style="padding: 0">
                                        <li><a href="#">Family</a></li>
                                        <li><a href="#">Work</a></li>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Children</a></li>
                                        <li><a href="#">Holidays</a></li>
                                        <li><a href="#">Music</a></li>
                                        <li><a href="#">Photography</a></li>
                                        <li><a href="#">Film</a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>            
                              </div>
                              <div class="col-lg-9" >
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class = "pull-right" >
                                      <select class="form-control m-b" id="sorttemplate">
                                          <option value='name'>Sort by Name</option>
                                          <option value='date'>Sort by Date</option>
                                      </select>
                                    </div>
                                  </div>
                                  <input type="hidden" id="choosed_template"/>
                                  <input type="hidden" id="choosed_template_url"/>
                                  <div class="new-table-content">
                                    <div class="col-lg-12 video-template-lists">
                                      @if(count($template_videos)==0)
                                      <div class="text-center">There is no template videos now.</div>
                                      @endif
                                      @foreach($template_videos as $template_video)
                                        <div class="file-box video-template">
                                          <div class="file">
                                              <span class="corner"></span>
                                              <div class="image choose-template" template-url="{{$template_video->url}}" template-type="Alpha_{{str_replace("YouTube_Preview_","",$template_video->name)}}">
                                                  <img alt="image" class="img-responsive" src="{{ asset('assets/theme-new/img/p1.jpg') }}">
                                              </div>
                                              <div class = "description" >
                                                <div class="file-name text-center">
                                                    <a class="preview-video-template" video-url="{{$template_video->url}}"><span>{{str_replace("YouTube_Preview_","",$template_video->name)}}</span><i class="fa fa-play-circle" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                              </div>
                                          </div>
                                        </div>
                                      @endforeach
                                    </div>
                                    <div class="temp-pagination text-center">
                                      {{$template_videos->links()}}
                                    </div>
                                  </div>
                                </div>            
                              </div>
                            </div>

                            <h1>Enter your data</h1>
                            <div class="step-content">
                                <!--div class="text-left m-t-md create_video-step3-1">
                                  <div class = "col-lg-4"></div>            
                                  <div class = "col-lg-5">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="i-checks"><label> <input type="radio" value="step3-1" name="rd-step3"> <i></i> Enter your custom data </label></div>
                                    <div class="i-checks"><label> <input type="radio" checked="" value="step3-2" name="rd-step3"> <i></i>  Open a file with multiple rows of data<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><a href = "#">Download a CSV template of the data file</a></small>  </label></div>
                                    <br>
                                    <a class="btn btn-success btn-rounded btn-create_video-step-3-selection" href="#">Enter/Upload Data&nbsp;<i class = "fa fa-long-arrow-right"></i></a>
                                    <br>
                                    <br>
                                    <br>
                                  </div>
                                  <div class = "col-lg-3"></div>            
                                </div-->
                                <div class="text-left m-t-md create_video-step3-1">
                                  <div class = "col-lg-8">
                                    <div class="form-group">
                                      <label>Customer Name</label><input type="text" placeholder="John" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label>Customer Domain</label><input type="text" placeholder="www.internet.com" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label>Main Text</label><input type="text" placeholder="This video is created to show you how my company can grow your business using the power of video marketing..." class="form-control">
                                    </div>
                                    <!--div class="form-group">
                                      <label>Image #1</label><input type="text" placeholder="Enter Url" class="form-control">
                                      or 
                                    </div-->
                                    <div class="btn-group">
                                      <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                          <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                                          Upload Logo
                                      </label>
                                    </div>
                                    <div class="image-crop create_video-image-crop">
                                        <img src="#">
                                    </div>
                                    <div class="img-preview img-preview-sm"></div>
                                  </div>
                                  <div class = "col-lg-4" >
                                    <label>Preview</label>
                                    <div class = "create_video-previewbox" id="create_video_previewbox">
                                    </div>
                                  </div>
                                </div>
                                <div class="text-left m-t-md create_video-step3-3">
                                  <div class = "col-lg-8">
                                    <div class="form-group">
                                      <label>Upload your file</label>
                                      <div class="input-group">
                                        <input type="file" accept="image/*" name="file" id="create_video-inpute-file" class="hide">
                                        <input type="text" class="form-control" id = "create_video-inpute-file-text" >
                                        <span class="input-group-btn"> 
                                          <label class="btn btn-primary" for = "create_video-inpute-file">Browse</label> 
                                        </span>
                                      </div>                  
                                    </div>
                                    <button class="btn btn-primary" type="button">Upload</button>
                                    <p class = "text-success" >File format is OK. 3 data rows parsed successfully.</p>
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                            <th>TEXT 1</th>
                                            <th>TEXT 2</th>
                                            <th>TEXT 3</th>
                                            <th>IMAGE</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                            <td>Lorem ipsum 1a</td>
                                            <td>Lorem ipsum 2a</td>
                                            <td>Lorem ipsum 3a</td>
                                            <td>http://images.com/1a</td>
                                        </tr>
                                        <tr>
                                            <td>Lorem ipsum 1a</td>
                                            <td>Lorem ipsum 2a</td>
                                            <td>Lorem ipsum 3a</td>
                                            <td>http://images.com/1a</td>
                                        </tr>
                                        <tr>
                                            <td>Lorem ipsum 1a</td>
                                            <td>Lorem ipsum 2a</td>
                                            <td>Lorem ipsum 3a</td>
                                            <td>http://images.com/1a</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  <div class = "col-lg-4" >
                                    <label>Preview</label>
                                    <div class = "create_video-previewbox" >
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>  
                        <div id="videotemplateModal" class="modal fade">
                          <div class="modal-dialog" style="top:25%">
                            <div class="modal-content">
                              <div class="modal-body" style="background:black;">
                              </div>
                            </div>
                          </div>
                        </div>  
                    </div>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>

@endsection