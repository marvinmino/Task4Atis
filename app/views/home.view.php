
    <?php require 'partials/head.php'; ?>

<div class="float-md-none">
        <button style="width: 30%;align-self:center; margin-left:34.5%;margin-right:20%;" href="#" id='insForm' class="btn btn-outline-dark btn-lg btn-block">Add task</button>
        </br>
        <?php session_start();
            if (isset($_SESSION['error'])) {
                ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']);
            }  ?>
        <form  action="home" method="post" class='form-popup form'>
            <div class="form-group">
                <label for="name">Select Task Name:
                </label>
                <input class="form-control"  type="text" placeholder="Name..." name="taskName" id="taskName">
                <label for="description">Select Task Description:
                </label>
                <textarea class="form-control"  rows="4" placeholder="Description..." name="taskDescription" id="taskDescription"></textarea>
                <label for="priority">Select Task Priority:
                </label>
                <select  name="taskPriority" class="form-control">
                    <option value='low'>Low</option>
                    <option value='medium'>Medium</option>
                    <option value='high'>High</option>
                </select>

                <label for="Deadline">Select Task Deadline:
                </label>
                <input class="form-control" type="date" placeholder="Deadline..." name="taskDeadline" id="taskDeadline">
            </div>
            <input class="form-control" type="submit" value="Create task" name='task_frm'>
        </form>
    </div>


<div>
    <table style="height:600px;" class="table table-secondary">
        <thead>
            <th>Name</th>
            <th>Priority</th>
            <th>Deadline</th>
            <th>Done</th>
            <th>Date Created</th>
        </thead>
        <tbody id="sortable">
            <?php foreach ($tasks as $ta) : ?>
            
            <tr data-task-id='<?=$ta->id?>'
            <?php 
            switch($ta->priority){
                case 'low':
                echo 'class="table-success"';
                break;
                case 'medium': 
                echo 'class="table-warning"';
                break;
                case 'high':
                echo 'class="table-danger"';
                break;          
            }
            ?>>
                <td><?php echo $ta->name; ?></td>

                <td><?php echo $ta->priority; ?></td>
                <td><?php echo $ta->deadline; ?></td>
                <td>
                <label class="switch">
                        <?php if($ta->done==0) echo '<input type="checkbox" id="'.$ta->id.'"class="checkDone" >';
                        else
                        echo '<input type="checkbox" class="checkDone" id="'.$ta->id.'" checked>';?>
                 <span class="slider round"></span>
                 </label></td>
                <td><?php echo $ta->date; ?></td>
                <td><a id='<?php echo $ta->id?>' class="modalPop"><i class="fas fa-list"></i></a></td>
            </tr>
            <div id="myModal" class="modal m<?php echo $ta->id?>" style="font-family: 'Amiri', serif;font-family: 'Miriam Libre', sans-serif;">
                    <div class="modal-content">
                 <h3><p class="text-capitalize"><?php echo $ta->name?></p></h3>
                 <hr>
                 <h5>Description:</h5>
                 <p class="text-capitalize"><?php echo $ta->description?><p>
                     <hr>
                 <p class="text-capitalize">Priority: <?php echo $ta->priority?></p>
                 <p class="text-capitalize">Deadline: <?php echo $ta->deadline?></p> 
                 <div>
                 
                 <form action="delete" method="post"><input class="form-control" type="text" style="display:none;" placeholder="Name..." value="<?php echo $ta->id?>" name="deleteTask">
                 <a href="delete?id=<?php echo $ta->id?>" style=";float:right"><button class='btn btn-secondary'>Delete</button></a></form>
                 <a href="edit?id=<?php echo $ta->id?>"><button class='btn btn-secondary' name="deleteTask" value="<?php echo $ta->id?>">Edit</button></a>
                 </div>
            </div>
        </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<script src="../../public/js/home.js" type="text/javascript"></script>
<?php require 'partials/footer.php'; ?>

