<?php

$return = [
    "#^$#" => ["Page1", "render"],
    "#^index.php$#" => ["Page1", "render"],
    "#^PromoAll/(\d+)$#" => ["PromoAll", "render", 1],
    "#^Authorization$#" => ["Authorization", "render"],
    "#^Registration$#" => ["Registration", "render"],
    "#^AjaxRegistr$#" => ["AjaxRegistr", "render"],
    "#^LogIn$#" => ["Authorization", "logIn"],
    "#^LogOut$#" => ["Authorization", "LogOut"],
    "#^InsertAdmin$#" => ["Admin", "insert"],
    "#^PreviewInsert$#" => ["Admin", "previewInsert"],
    "#^AdminDelit$#" => ["Admin", "delit"],
    "#^CardProduct/(\d+)$#" => ["CardProduct", "render", 1],
  //"#^PageCategoryListRender/(\d+)$#" => ["PageCategoryList", "render", 1],
    "#^PageCategoryListRender/(\d+)/(\d+)$#" => ["PageCategoryList", "render", 1],
    "#^AjaxAuthorization$#" => ["AjaxAuthorization", "send" ],
    "#^Admin$#" => ["Admin", "render" ],
    "#^User$#" => ["User", "render" ],
    "#^Search$#" => ["Search", "render"]
   
];



