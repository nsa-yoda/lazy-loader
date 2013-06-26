LazyLoader
==========

A fast, strict lazy loader 


++ Usage

The LazyLoader class is already initialized in the `$LazyLoader` 
variable. You must explicitly call `$LazyLoader::Register()` to init 
the loader. 

    require("LazyLoader.php");
    $LazyLoader->Register();

There we go, all done! This is the basic usage. 

++ Setting a subdirectory for your classes

Let's say you have all your classes in a directory "Classes/". You
can assign this so that LazyLoader searches in that directory by 
doing the following:

    require("LazyLoader.php");
    $LazyLoader::SetBaseDirectory("Classes");
    $LazyLoader::Register();

