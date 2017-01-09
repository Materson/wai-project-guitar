<?php
require_once 'business.php';
require_once 'functions.php';

function index(&$model)
{
    return "index_view";
}

function klasyczna(&$model)
{
    return "klasyczna_view";
}

function akustyczna(&$model)
{
    return "akustyczna_view";
}

function elektryczna(&$model)
{
    return "elektryczna_view";
}

function interwaly(&$model)
{
    return "interwaly_view";
}

function dodaj_zdjecie(&$model)
{
    return "dodaj_zdjecie_view";
}

function login(&$model)
{
    $prev_site = prev_site();

    if(isset($_POST['login']))
    {
        if(isset($_SESSION['reg_success']))
        {
            unset($_SESSION['reg_success']);
        }
        $_SESSION['log_error'] = true;
        if($user = check_user($_POST['login'], $_POST["pass"]))
        {
            session_unset();
            session_regenerate_id();
            $_SESSION['user_id'] = $user['_id'];
            $_SESSION['name'] = $user['login'];
        }
    }

    return "redirect:$prev_site";
}

function register(&$model)
{
    $prev_site = prev_site();

    if(isset($_POST['login']))
    {
        session_unset();
        $_SESSION['login_reg'] = $_POST['login'];
        $_SESSION['email'] = $_POST['email'];
        if(get_login($_POST['login']) != null || $_POST['login'] == "")
        {
            $_SESSION['login_error'] = true;
        }
        else
        {
            $_SESSION['login_error'] = false;
        }
        
        if($_POST['pass'] != $_POST['pass2'] || $_POST['pass'] == "")
        {
            $_SESSION['pass_error'] = true;
        }
        else
        {
            $_SESSION['pass_error'] = false;
        }

        if($_POST['email'] == "")
        {
            $_SESSION['email_error'] = true;
        }
        else
        {
            $_SESSION['email_error'] = false;
        }

        $_SESSION['reg_success'] = false;
        if(!($_SESSION['login_error'] || $_SESSION['pass_error'] || $_SESSION['email_error']))  //no errors
        {
            save_user($_POST['login'], $_POST['pass'], $_POST['email']);
            $_SESSION['reg_success'] = true;
        }
    }

    return "redirect:$prev_site";
}

function logout(&$model)
{
    $prev_site = prev_site();
    session_destroy();

    return "redirect:$prev_site";
}

function upload_img(&$model)
{
    $prev_site = prev_site();
    $file = $_FILES['file'];
    $tmp = $file['tmp_name'];

    if($file['size'] > 8388608 || $file['size'] == "")
    {
        $_SESSION["size_error"] = true;
        return "redirect:$prev_site";
    }

    if($_POST['author'] == "")
    {
        $_SESSION["author_error"] = true;
        return "redirect:$prev_site";
    }
    $author = $_POST['author'];

    if($_POST['title'] == "")
    {
        $_SESSION["title_error"] = true;
        return "redirect:$prev_site";
    }
    $title = $_POST['title'];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $tmp);
    if($mime_type !== "image/jpeg" && $mime_type && "image/png" && $mime_type !== "image/jpg")
    {
        $_SESSION["type_error"] = true;
        return "redirect:$prev_site";
    }

    $dir = "/var/www/dev/web/web/images/";
    $filename = basename($file['name']);
    $extension = substr(strrchr($filename, "."), 1);
    $target = $dir.$title.".$extension";

    if(isset($_POST['access']))
    {
        $access = $_POST['access'];
    }
    else
    {
        $access = "public";
    }

    //miniature
    $newwidth = '200';
    $newheight = '125';
    list($width, $height) = getimagesize($tmp);
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($tmp);
    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    imagejpeg($thumb, $dir.$title."_thumb.".$extension);    //save image

    //watermark
    $watermark = $_POST['watermark'];
    $image = imagecreatefromjpeg($tmp);
    $textcolor = imagecolorallocate($image, 0, 255, 0);
    imagestring($image, 3, 0, 0, $watermark, $textcolor);
    imagejpeg($image, $dir.$title."_wm.".$extension);

    if(move_uploaded_file($tmp, $target))
    {
        $owner = null;
        if(isset($_SESSION['user_id']))
            $owner = $_SESSION['user_id'];
        save_img($title.".$extension", $extension, $access, $author, $title, $owner);
        $_SESSION['upload_success'] = true;
    }
    else
    {
        $_SESSION['upload_error'] = true;
    }

    return "redirect:$prev_site";
}

function galeria(&$model)
{
    if(isset($_SESSION['user_id']))
    {
        $imgs = get_imgs($_SESSION['user_id']);
    }
    else
    {
        $imgs = get_imgs();
    }

    $model['imgs'] = $imgs;

    return "galeria_view";
}

function ulubione(&$model)
{
    if(isset($_SESSION['favorite']))
    {
        extract($_SESSION);
        if(!empty($favorite))
        {
            foreach($favorite as $id)
            {
                $mongo_id[] = new MongoId($id);
            }

            $imgs = get_favorite($mongo_id);
            $model['imgs'] = $imgs;
        }
    }
    return "ulubione_view";
}

function save_favorite(&$model)
{
    $prev_site = prev_site();

    if(isset($_POST['favorite']))
        $_SESSION['favorite'] = $_POST['favorite'];
    
    return "redirect:$prev_site";
}

function del_favorite(&$model)
{
    $prev_site = prev_site();

    if(!empty($_POST))
        $_SESSION['favorite'] = array_diff($_SESSION['favorite'], $_POST['del_favorite']);

    return "redirect:$prev_site";
}