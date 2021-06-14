<?php 
include('core/route.php');

Route::add('/',function(){
    include 'views/home.php';
});
Route::add('/copyright',function(){
    include 'views/copyright.php';
});
Route::add('/keywork-generator',function(){
    include 'views/keywork_generator.php';
});
Route::add('/post-generator',function(){
    include 'views/post_generator.php';
});
Route::add('/content-generator',function(){
    include 'views/content_generator.php';
});
Route::add('/plugin-generator',function(){
    include 'views/plugin_generator.php';
});
Route::add('/plugin-generator',function(){
    include 'views/plugin_generator.php';
},'post');
Route::add('/html-validator',function(){
    include 'views/html_validator.php';
});
Route::add('/html-validator',function(){
    include 'views/html_validator.php';
},'get');
Route::add('/chrome-extensions',function(){
    include 'views/chrome_extensions.php';
});
Route::add('/app',function(){
    include 'views/app.php';
});
Route::add('/domain',function(){
    include 'views/domain.php';
});
Route::add('/domain',function(){
    include 'views/domain.php';
},'post');
Route::add('/wp-plugins',function(){
    include 'views/wp_plugins.php';
});
Route::add('/profile',function(){
    include 'views/profile.php';
});
Route::add('/profile',function(){
    include 'views/profile.php';
},'post');
Route::add('/change-logs',function(){
    include 'views/change_logs.php';
});
Route::add('/road-map',function(){
    include 'views/road_map.php';
});
Route::add('/upload',function(){
    include 'views/upload.php';
});
Route::add('/upload',function(){
    include 'views/upload.php';
},'post');
Route::add('/users',function(){
    include 'views/users.php';
});
Route::add('/users',function(){
    include 'views/users.php';
},'post');
Route::add('/users',function(){
    include 'views/users.php';
},'get');
Route::add('/upload-post',function(){
    include 'views/upload_editor.php';
});
Route::add('/post-view',function(){
    include 'views/post_view.php';
});
Route::add('/post-del',function(){
    include 'views/post_del.php';
});
Route::add('/post-edit',function(){
    include 'views/post_edit.php';
});
Route::add('/post-edit',function(){
    include 'views/post_edit.php';
},'post');
Route::add('/post-add',function(){
    include 'views/post_add.php';
});
Route::add('/post-add',function(){
    include 'views/post_add.php';
},'post');
Route::add('/posts',function(){
    include 'views/posts.php';
});
Route::add('/posts',function(){
    include 'views/posts.php';
},'post');
Route::add('/posts',function(){
    include 'views/posts.php';
},'get');
Route::add('/create-user',function(){
    include 'views/create_user.php';
});
Route::add('/create-user',function(){
    include 'views/create_user.php';
},'post');
Route::add('/config',function(){
    include 'views/config.php';
});
Route::add('/config',function(){
    include 'views/config.php';
},'post');
Route::add('/changepass',function(){
    include 'views/changepass.php';
},'post');
Route::add('/changepass',function(){
    include 'views/changepass.php';
});
Route::add('/logout',function(){
    include 'views/logout.php';
});
Route::add('/login',function(){
    include 'views/login.php';
});
Route::add('/login',function(){
    include 'views/login.php';
},'post');
Route::add('/reset',function(){
    include 'views/reset.php';
});
Route::add('/reset',function(){
    include 'views/reset.php';
},'post');
Route::add('/forgot',function(){
    include 'views/forgot.php';
});
Route::add('/forgot',function(){
    include 'views/forgot.php';
},'post');
Route::add('/download',function(){
    include 'views/download.php';
});
Route::add('/robots-generator',function(){
    include 'views/robots_generator.php';
});
Route::add('/qr-generator',function(){
    include 'views/qr_generator.php';
});
// Route::add('/image-generator',function(){
//     include 'views/image_generator.php';
// });
Route::add('/crawler',function(){
    include 'views/crawler.php';
});
Route::add('/pagespeed',function(){
    include 'views/pagespeed.php';
});
Route::add('/pagespeed',function(){
    include 'views/pagespeed.php';
},'post');
Route::add('/ping',function(){
    include 'views/ping.php';
});
Route::add('/ping',function(){
    include 'views/ping.php';
},'post');
Route::add('/doping',function(){
    include 'views/doping.php';
},'get');
Route::add('/favicon-generator',function(){
    include 'views/favicon_generator.php';
});
Route::add('/favicon-generator',function(){
    include 'views/favicon_generator.php';
},'post');

// // Accept only numbers as parameter. Other characters will result in a 404 error
// Route::add('/foo/([0-9]*)/bar',function($var1){
//     echo $var1.' is a great number!';
// });
Route::add('/boiler',function(){
    include 'views/@boiler.php';
});

Route::run('/');