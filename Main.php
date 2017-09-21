<?php
session_start();
$username = $_SESSION["USERNAME"];
if(strcmp($username,"") == 0){
  header('Location: ./error.html');
  exit();
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<html>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Upload Blog</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="video-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos">Upload Video</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="projects-tab" data-toggle="tab" href="#projects" role="tab" aria-controls="projects">Upload Projects</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Settings
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" id="dropdown1-tab" href="#dropdown1" role="tab" data-toggle="tab" aria-controls="dropdown1">Change Password</a>
      <a class="dropdown-item text-danger" id="dropdown2-tab" href="#dropdown2" role="tab" data-toggle="tab" aria-controls="dropdown2">logout</a>
    </div>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active container" id="home" role="tabpanel" aria-labelledby="home-tab">
    <h1 class="display-3">
  <?php
    print 'Hello, '.$username .'.';
  ?>
</h1>
  <p class="lead">What do you want to do today?</p>
</div>

  <div class="tab-pane fade container" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <h1 class="display-3">Blog</h1>
    <p class="lead">Add a new blog</p>
    <form method="post" action="./blogupdate.php">
      <div class="form-group">
        <label class="form-control-label" for="formGroupExampleInput">Title</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title" name="BlogTitle">
      </div>
      <div class="form-group">
        <label class="form-control-label" for="formGroupExampleInput">File Title</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="File Title" name="BlogFileTitle">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="Content" name="BlogContent"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-secondary" name="preview_blog">Preview</button>
      <button type="submit" class="btn btn-primary" name="submit_blog">Submit</button>
    </div>
    </form>
  </div>

  <div class="tab-pane fade container" id="videos" role="tabpanel" aria-labelledby="video-tab">
    <h1 class="display-3">Videos</h1>
    <p class="lead">Add new video</p>
    <form method="post" action="./videoupdate.php">
      <div class="form-group">
        <label class="form-control-label" for="formGroupExampleInput">Title</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title" name="VideoTitle">
      </div>
      <div class="form-group">
  <label for="exampleFormControlSelect1">Videos for</label>
  <select class="form-control" id="exampleFormControlSelect1">
    <option>IT Lab</option>
    <option>Life with Musical</option>
  </select>
</div>
      <div class="form-group">
        <label class="form-control-label" for="formGroupExampleInput">Caption</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Caption" name="VideoCaption">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="A brief description" name="VideoDescription"></textarea>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="formGroupExampleInput">URL</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Caption" name="VideoURL">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">TextPDF</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <div class="form-group">
      <button type="button" class="btn" name="videopreview" data-toggle="modal" data-target="#exampleModal">Preview</button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card col-md-12" style="width: 20rem;">
                <div class="card-body">
                  <h4 class="card-title1">Video and text</h4>
                  <h6 class="card-subtitle mb-2 text-muted">Caption</h6>
                  <p class="card-text">A brief description about this video</p>
                  <a href="#" class="card-link">Video link</a>
                  <a href="#" class="card-link">Text link</a>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="videosubmit">Submit</button>
    </div>
    </form>
  </div>

  <div class="tab-pane fade container" id="projects" role="tabpanel" aria-labelledby="projects-tab">
    <h1 class="display-3">Projects</h1>
    <p class="lead">Add new projects</p>
    <form>
      <div class="form-group">
        <label class="form-control-label" for="formGroupExampleInput">Title</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title" name="BlogTitle">
      </div>
      <div class="form-group">
        <label class="form-control-label" for="formGroupExampleInput">Caption</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Caption" name="BlogFileTitle">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="A brief description" name="BlogContent"></textarea>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="formGroupExampleInput">URL</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Caption" name="BlogFileTitle">
      </div>
      <div class="form-group">
      <button type="submit" class="btn btn-secondary" target="_blank">Preview</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
  </div>

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Two</div>
  <div class="tab-pane fade" id="dropdown1" role="tabpanel" aria-labelledby="dropdown1-tab">Three</div>
  <div class="tab-pane fade" id="dropdown2" role="tabpanel" aria-labelledby="dropdown2-tab">Four</div>
</div>

</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
