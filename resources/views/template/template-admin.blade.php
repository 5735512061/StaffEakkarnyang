<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
    	<meta name="csrf-token" content="{{ csrf_token() }}">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>ระบบพนักงานเอกการยาง</title>
		@include("/template/css")
	</head>
	<body>
		<div class="main-content">
		@include("/template/navbar-admin")
			<div class="container-fluid mt--7">
				@yield("content")
				@include("/template/footer")
			</div>
	    </div>
		@include("/template/script")
	</body>
</html>