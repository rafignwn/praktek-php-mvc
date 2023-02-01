<?php include DIR_OF_APP . "/views/layouts/header.php" ?>

<div id="carousel-container">
    <div>
        <ul id="carousel" class="animate">
            <li class="slide animate">
                <img src="https://images.unsplash.com/photo-1506057213367-028a17ec52e5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60" alt="" />
            </li>
            <li class="slide animate">
                <img src="https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MzR8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" />
            </li>
            <li class="slide animate">
                <img src="https://images.unsplash.com/photo-1539689816072-86231273b4d6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NzF8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" />
            </li>
            <li class="slide animate">
                <img src="https://images.unsplash.com/photo-1539673433035-50b0c3110f1b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NzV8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" />
            </li>
            <li class="slide animate">
                <img src="https://images.unsplash.com/photo-1472212712724-0f9997e1fe6b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8OTZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="" />
            </li>
        </ul>
    </div>
</div>

<div class="pop-up">
    <div class="greeting">
        <span>Hi,</span>
        <h2><?= !empty($user) ? $user["nama"] : "Guest"; ?></h2>
        <p>Have a nice day!</p>
    </div>
    <button class="close">
        <ion-icon name="close-outline"></ion-icon>
    </button>
</div>