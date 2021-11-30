<?php include_once 'layout/header.php';?>

    <body>
        <div class="container">
            <a class="btn btn-primary btn-nueva" style="margin-left:790px" href="index.php?controller=work&action=create-view"><i class="fa fa-plus"></i>&nbsp;Create</a>
            <a class="btn btn-info btn-nueva" href="index.php?controller=work&action=show-calendar"><i class="fa fa-calendar"></i>&nbsp;Calendar</a>
            <div class="card-deck">
                <div class="card">
                    <div class="card-body bg-faded">
                        <h5 class="card-title text-center">Planning</h5>
                        <?php foreach($data["works"] as $work) {
                            if ($work["status"] == "Planning") {?>
                        <div class="card text-black bg-info mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $work["name"]; ?></h5>
                                <p class="card-text"><strong>Starting date: </strong> <?php echo $work["starting_date"]; ?> </p>
                                <p class="card-text"><strong>Ending date: </strong> <?php echo $work["ending_date"]; ?> </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">
                                    <div class="text-center">
                                        <a class="btn btn-outline-primary" href="index.php?controller=work&action=detail&id=<?php echo $work['id']; ?>">
                                            <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Detail</a>
                                        <a class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this work?');" href="index.php?controller=work&action=delete&id=<?php echo $work['id'] ?>">
                                            <i class="fa fa-trash-o" aria-hidden="true" ></i>&nbsp;&nbsp;Delete</a>
                                    </div>
                                </small>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body bg-faded">
                        <h5 class="card-title text-center">Doing</h5>
                        <?php foreach($data["works"] as $work) {
                        if ($work["status"] == "Doing") {?>
                        <div class="card text-black bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $work["name"]; ?></h5>
                                <p class="card-text"><strong>Starting date:</strong> <?php echo $work["starting_date"]; ?> </p>
                                <p class="card-text"><strong>Ending date:</strong> <?php echo $work["ending_date"]; ?> </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">
                                    <div class="text-center">
                                        <a class="btn btn-outline-primary" href="index.php?controller=work&action=detail&id=<?php echo $work['id']; ?>">
                                            <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Detail</a>
                                        <a class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this work?');" href="index.php?controller=work&action=delete&id=<?php echo $work['id'] ?>">
                                            <i class="fa fa-trash-o" aria-hidden="true" ></i>&nbsp;&nbsp;Delete</a>
                                    </div>
                                </small>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body bg-faded">
                        <h5 class="card-title text-center">Complete</h5>
                        <?php foreach($data["works"] as $work) {
                        if ($work["status"] == "Complete") {?>
                        <div class="card text-black bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $work["name"]; ?></h5>
                                <p class="card-text"><strong>Starting date: </strong> <?php echo $work["starting_date"]; ?> </p>
                                <p class="card-text"><strong>Ending date: </strong> <?php echo $work["ending_date"]; ?> </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">
                                    <div class="text-center">
                                        <a class="btn btn-outline-primary" href="index.php?controller=work&action=detail&id=<?php echo $work['id']; ?>">
                                            <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Detail</a>
                                        <a class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this work?');" href="index.php?controller=work&action=delete&id=<?php echo $work['id'] ?>">
                                            <i class="fa fa-trash-o" aria-hidden="true" ></i>&nbsp;&nbsp;Delete</a>
                                    </div>
                                </small>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
          <?php include_once 'layout/footer.php';?>


