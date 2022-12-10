<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body style="background-color:#EEE2E2">
<?php include_once("navbar.php"); ?>


<body>
    <?php include_once("navbar.php"); ?>
    <div style="margin:10px" class="row">
        <h1>Details of <?php echo $_GET['id']; ?></h1>
        <div style="" class="col-4">
            <img src="musical-note.png" alt="Event Image" width="400" height="400">
            

        </div>
        <div style="" class="col-8">
            <h2>Name of the Event</h2>
            <h3>Time of the event</h3>
            <h3>Location of the event</h3>
            <h3>Catagories of Event</h3>
            <h3>Event Description</h3>
            <a type="button" class="btn btn-outline-danger" href="search_event.php">Purchase Ticket</a>
            <a type="button" class="btn btn-outline-danger" href="search_event.php">Add to my calendar</a>    
        </div>
    </div>
    <div style=" height:0px; left:20px; top:112px; border:1px solid #AE8181; background-color: #AE8181"><div>
    <div style="margin:10px" class="row">
        <div style="display:flex"> 
            <div class="mr-5">
                <h1>Posts</h1>
            </div>
            <div class="mx-5 mt-2">
                <a type="button" class="btn btn-outline-danger" href="search_event.php">See More</a> 
                <a type="button" class="btn btn-outline-danger" href="search_event.php">Create Post</a>   
            </div>
        </div>
        
        <div class="col-4">
            <img src="musical-note.png" alt="Event Image" width="200" height="200">
            <p>this is the string from post</p>
            <p>here is going to be rating from post</p>
        </div>
        
        <div class="col-4">
            <img src="musical-note.png" alt="Event Image" width="200" height="200">
            <p>this is the string from post</p>
            <p>here is going to be rating from post</p>
        </div>  
        <div class="col-4">
            <img src="musical-note.png" alt="Event Image" width="200" height="200">
            <p>this is the string from post</p>
            <p>here is going to be rating from post</p>
        </div>  

        
    </div>
    

    

    
    

</body>