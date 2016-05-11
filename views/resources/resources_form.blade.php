
<!-- Notifications -->
@include('partials.notifications')
<!-- ./ notifications -->

<div style="">
{{-- Edit Data Model Form --}}
	{!! Form::open(array('route'=>'add_multimedia', 'enctype' => 'multipart/form-data', 'files'=>true, 'class'=>"form-vertical")) !!}
	
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
		<!-- ./ csrf token -->

		
<style>
  #progress_bar {
    margin: 10px 0;
    padding: 3px;
    border: 1px solid #000;
    font-size: 14px;
    clear: both;
    opacity: 0;
    -moz-transition: opacity 1s linear;
    -o-transition: opacity 1s linear;
    -webkit-transition: opacity 1s linear;
  }
  #progress_bar.loading {
    opacity: 1.0;
  }
  #progress_bar .percent {
    background-color: #99ccff;
    height: auto;
    width: 0;
  }
  .thumb {
    height: 75px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
  }
</style>

<input type="file" id="files" name="files[]" multiple />

<output id="list"></output>

<script>

var reader;
var progress = document.querySelector('.percent');

function errorHandler(evt) {
  switch(evt.target.error.code) {
    case evt.target.error.NOT_FOUND_ERR:
      alert('File Not Found!');
      break;
    case evt.target.error.NOT_READABLE_ERR:
      alert('File is not readable');
      break;
    case evt.target.error.ABORT_ERR:
      break; // noop
    default:
      alert('An error occurred reading this file.');
  };
}

function updateProgress(evt) {
  // evt is an ProgressEvent.
  if (evt.lengthComputable) {
    var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
    // Increase the progress bar length.
    if (percentLoaded < 100) {
      progress.style.width = percentLoaded + '%';
      progress.textContent = percentLoaded + '%';
    }
  }
}

function handleImage(f) {	
    
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
      return function(e) {
        // Render thumbnail.
        var span = document.createElement('span');
        span.innerHTML = ['<ul><img class="thumb" src="', e.target.result,
                          '" title="', escape(theFile.name), '"/><br>',escape(theFile.name),'</ul>'].join('');
        document.getElementById('list').insertBefore(span, null);

     // Ensure that the progress bar displays 100% at the end.
        progress.style.width = '100%';
        progress.textContent = '100%';
        setTimeout("document.getElementById('progress_bar').className='';", 2000);
        
      };
    })(f);

    // Read in the image file as a data URL.
    reader.readAsDataURL(f);	
}

  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {
    	
    	// Reset progress indicator on new file selection.
        progress.style.width = '0%';
        progress.textContent = '0%';
        
    	reader = new FileReader();

    	reader.onerror = errorHandler;
        reader.onprogress = updateProgress;

        reader.onabort = function(e) {
          alert('File read cancelled');
        };
        reader.onloadstart = function(e) {
          document.getElementById('progress_bar').className = 'loading';
        };

	      // Only process image files.
	      if (f.type.match('image.*')) {
	    	  handleImage(f);  		
	      }else if (f.type.match('video.*')) {
	    	  window.alert('video');	
	      }else{
	    	  window.alert(f.type);
	      }
    }
    
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				<button type="submit" class="btn btn-success">Create</button>
			</div>
		</div>
		<!-- ./ form actions -->
		
		<div id="progress_bar"><div class="percent">0%</div></div>
	</form>

</div>