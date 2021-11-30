<?php include_once 'layout/header.php';?>
    <div class="thin-panel">
        <div class="">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Work detail</h3>
                </div>
                <div>
                    <a href="#" id="editarBtn" class="btn btn-outline-warning"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;Edit</a>
                    <a href="index.php" class="btn btn-outline-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back</a>
                    <a href="index.php?controller=work&action=delete&id=<?php echo $data['work']->id ?>" class="btn btn-outline-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Delete</a>
                </div>
            </div>
            <hr/>
            <form action="index.php?controller=work&action=update" method="post">
                <input type="hidden" name="id" value="<?php echo $data["work"]->id ?>"/>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input disabled type="text" name="name" class="form-control" id="name" value="<?php echo $data["work"]->name ?>">
                </div>

                <div class="form-group">
                    <label for="stating-date">Starting date</label>
                    <input disabled type="datetime-local" required name="startingDate" class="form-control startingDate" id="startingDate" value="<?php echo date('Y-m-d\TH:i:s', strtotime($data["work"]->starting_date)); ?>">
                </div>

                <div class="form-group">
                    <label for="ending-date">Ending date</label>
                    <input disabled type="datetime-local" required name="endingDate" class="form-control endingDate" id="endingDate" value="<?php echo date('Y-m-d\TH:i:s', strtotime($data["work"]->ending_date)); ?>">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select disabled class="form-control" required id="status" name="status">
                        <option value="Planning" <?php echo (($data["work"]->status == "Planning") ? "selected" : "") ?>>Planning</option>
                        <option value="Doing" <?php echo (($data["work"]->status == "Doing") ? "selected" : "") ?>>Doing</option>
                        <option value="Complete" <?php echo (($data["work"]->status == "Complete") ? "selected" : "") ?>>Complete</option>
                    </select>
                </div>
                <button hidden type="submit" class="btn btn-primary hide">Update</button>
            </form>
        </div> 
    </div>

    <script src="./assets/js/validate.js"></script>
    <?php include_once 'layout/footer.php';?>
