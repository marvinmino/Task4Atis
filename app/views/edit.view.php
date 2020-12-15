<?php require('partials/head.php'); ?>
<?php session_start();
            if (isset($_SESSION['error'])) {
                ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']);
            }  ?>
<form action="edit" method="post" >
            <div class="form-group">
                <label for="name">Select Task Name:
                </label>
                <input class="form-control" type="text"  placeholder="Name..." value="<?php echo $task[0]->name?>" name="taskName" id="taskName">
                <label for="description">Select Task Description:
                </label>
                <textarea class="form-control"  rows="4"placeholder="Description..." name="taskDescription" id="taskDescription"><?php echo $task[0]->description?></textarea>
                <label for="priority">Select Task Priority:
                </label>
                <select  name="taskPriority" class="form-control">
                    <option value='low'>Low</option>
                    <option value='medium'>Medium</option>
                    <option value='high'>High</option>
                </select>
                <input class="form-control" type="text" style="display:none;" placeholder="Name..." value="<?php echo $task[0]->id?>" name="id">
                <label for="Deadline">Select Task Deadline:
                </label>
                <input class="form-control" type="date" placeholder="Deadline..." value="<?php echo $task[0]->deadline?>" name="taskDeadline" id="taskDeadline">
            </div>
            <input class="form-control" type="submit" value="Update task" name='task_frm'>

</form>

<?php require('partials/footer.php'); ?>
