<?php include_once 'layout/header.php';?>

        <div class="thin-panel">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Create work</h3>
                </div>
                <div>
                    <a href="index.php" class="btn btn-info">Back</a>
                </div>
            </div>
            <form action="index.php?controller=work&action=create" method="post">
              <input type="hidden" name="create" value="create"/>

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" required name="name" class="form-control" id="name" placeholder="Name">
              </div>

              <div class="form-group">
                <label for="stating-date">Starting date</label>
                <input type="datetime-local" required name="startingDate" class="form-control startingDate" id="startingDate">
              </div>

              <div class="form-group">
                <label for="ending-date">Ending date</label>
                <input type="datetime-local" required name="endingDate" class="form-control endingDate" id="endingDate">
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" required id="status" name="status">
                  <option value="Planning">Planning</option>
                  <option value="Doing">Doing</option>
                  <option value="Complete">Complete</option>
                </select>
              </div>
              <button type="submit" style="margin-left:250px" class="btn btn-success">Create</button>
            </form>
        </div>
        <script src="./assets/js/validate.js"></script>
        <?php include_once 'layout/footer.php';?>
