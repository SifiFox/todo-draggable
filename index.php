<?php
require "dbconnect.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do list</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main__section">
    <div class="add__section">
        <form action="app/add.php" method="POST" autocomplete="off">
            <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                <input type="text"
                       name="title"
                       style="border-color: #ff6666;"
                       placeholder="Enter something"/>
                <button type="submit">Add</button>
            <?php } else { ?>
            <input type="text"
                   name="title"
                   placeholder="What do you need to do?"/>
            <button type="submit">Add</button>
            <?php } ?>
        </form>
    </div>

    <?php
    $todos = $conn->query ("SELECT * FROM todos ORDER BY id DESC")
    ?>

    <div class="show__todo__section">
        <?php if ($todos->rowCount () <= 0) { ?>
            <div class="todo__item">
                <div class="empty" style="text-align: center;">
                    <p>TodoList is empty</p>
                </div>
            </div>
        <?php } ?>

        <?php while ($todo = $todos->fetch (PDO::FETCH_ASSOC)) { ?>
            <div class="todo__item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove__todo">x</span>
                <?php if ($todo['checked']) { ?>
                    <div class="todo__item__title">
                        <input type="checkbox"
                               data_todo_id = <?php echo $todo['id']; ?>
                               class="check-box"
                               checked>
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    </div>
                <?php } else { ?>
                    <div class="todo__item__title">
                        <input type="checkbox"
                               data_todo_id = <?php echo $todo['id']; ?>
                               class="check-box">
                        <h2><?php echo $todo['title'] ?></h2>
                    </div>
                <?php } ?>

                <small>created <?php echo $todo['data_time'] ?></small>
            </div>
        <?php } ?>

    </div>
</div>
    <script src="js/jquery-3.2.1.min.js"> </script>

    <script>
        $(document).ready(function (){
            $('.remove__todo').click(function (){

                const id = $(this).attr('id');
                $.post("app/remove.php",
                    {
                        id:id
                    },
                    (data) => {
                        if(data){
                            $(this).parent().hide(400);
                        }
                    }
                );
            });

            $(".check-box").click(function (e){
               const id = $(this).attr('data_todo_id');

               $.post('app/check.php',
                   {
                       id:id,
                   },
                   (data) =>{
                        if(data != 'err'){
                            const h2 = $(this).next();
                            if(data === '1'){
                                h2.removeClass('checked');
                            }else{
                                h2.addClass('checked');
                            }
                        }
                   }
               );
            });
        });
    </script>

    <script>
        const tasksListElement = document.querySelector(`.show__todo__section`);
        const taskElements = tasksListElement.querySelectorAll(`.todo__item`);

        for(const task of taskElements){
            task.draggable = true;
        }

        tasksListElement.addEventListener(`dragstart`, (event) =>{
            event.target.classList.add(`selected`);
        });
        tasksListElement.addEventListener(`dragend`, (event) => {
            event.target.classList.remove(`selected`);
        });

        tasksListElement.addEventListener(`dragover`, (event) => {
            event.preventDefault();

            const activeElement = tasksListElement.querySelector(`.selected`);
            const currentElement = event.target;

            const isMoveable = activeElement !== currentElement &&
                currentElement.classList.contains(`todo__item`);

            if(!isMoveable){
                return;
            }

            const nextElement = (currentElement === activeElement.nextElementSibling) ?
                currentElement.nextElementSibling :
                currentElement;

            tasksListElement.insertBefore(activeElement, nextElement)
            
        })





    </script>


</body>
</html>