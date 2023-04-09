<!-- resources/views/layouts/app.blade.php -->
<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/table-detail/css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{ ('styler/css/modal.css') }}">
    <link rel="stylesheet" href="{{ ('styler/css/ui.css') }}">
   
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content */
        .modal-content {
          position: relative;
          background-color: #fefefe;
          margin: auto;
          padding: 0;
          border: 1px solid #888;
          width: 80%;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
          -webkit-animation-name: animatetop;
          -webkit-animation-duration: 0.4s;
          animation-name: animatetop;
          animation-duration: 0.4s
        }
        
        /* Add Animation */
        @-webkit-keyframes animatetop {
          from {top:-300px; opacity:0} 
          to {top:0; opacity:1}
        }
        
        @keyframes animatetop {
          from {top:-300px; opacity:0}
          to {top:0; opacity:1}
        }
        
        /* The Close Button */
        .close {
          color: white;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
        
        .modal-header {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }
        
        .modal-body {padding: 2px 16px;}
        
        .modal-footer {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }
        <style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.pagination a:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.pagination a:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}
        </style>
    </head>
    <body>
       
 
        <div class="container">
            @yield('content')
        </div>
    </body>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
        <script>
            (function(fn) {
	'use strict';
	fn(window.jQuery, window, document);
}(function($, window, document) {
	'use strict';
	
	$(function() {
		$('.sort-btn').on('click', '[data-sort]', function(event) {
			event.preventDefault();
			
			var $this = $(this),
				sortDir = 'desc';
			
			if ($this.data('sort') !== 'asc') {
				sortDir = 'asc';
			}
			
			$this.data('sort', sortDir).find('.fa').attr('class', 'fa fa-sort-' + sortDir);
			
			// call sortDesc() or sortAsc() or whathaveyou...
		});
	});
}));
        </script>
            <script>
                //message with toastr
                @if(session()->has('success'))
                
                    toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        
                @elseif(session()->has('error'))
        
                    toastr.error('{{ session('error') }}', 'GAGAL!'); 
                    
                @endif
            </script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
              <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
              <script scr="{{ ('styler/js/script.js') }}"></script>
</html>