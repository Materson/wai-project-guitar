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

    if(move_uploaded_file($tmp, $target))
    {
        save_img($title.".$extension", $access, $author, $title);
        $_SESSION['upload_success'] = true;
    }
    else
    {
        //blad
    }

    return "redirect:$prev_site";
}

function galeria(&$model)
{
    $imgs = get_imgs();
    $model['imgs'] = $imgs;

    return "galeria_view";
}

function ulubione(&$model)
{

    return "ulubione_view";
}

function products(&$model)
{
    $products = get_products();
    $model['products'] = $products;

    return 'products_view';
}

function product(&$model)
{
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        if ($product = get_product($id)) {
            $model['product'] = $product;
            return 'product_view';
        }
    }

    http_response_code(404);
    exit;
}

function edit(&$model)
{
    $product = [
        'name' => null,
        'price' => null,
        'description' => null,
        '_id' => null
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['name']) &&
            !empty($_POST['price']) /* && ...*/
        ) {
            $id = isset($_POST['id']) ? $_POST['id'] : null;

            $product = [
                'name' => $_POST['name'],
                'price' => (int)$_POST['price'],
                'description' => $_POST['description']
            ];

            if (save_product($id, $product)) {
                return 'redirect:products';
            }
        }
    } elseif (!empty($_GET['id'])) {
        $product = get_product($_GET['id']);
    }

    $model['product'] = $product;

    return 'edit_view';
}

function delete(&$model)
{
    if (!empty($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            delete_product($id);
            return 'redirect:products';

        } else {
            if ($product = get_product($id)) {
                $model['product'] = $product;
                return 'delete_view';
            }
        }
    }

    http_response_code(404);
    exit;
}

function cart(&$model)
{
    $model['cart'] = get_cart();
    return 'fragments/cart_view';
}

function add_to_cart()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];
        $product = get_product($id);

        $cart = &get_cart();
        $amount = isset($cart[$id]) ? $cart[$id]['amount'] + 1 : 1;

        $cart[$id] = ['name' => $product['name'], 'amount' => $amount];

        return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
}

function clear_cart()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['cart'] = [];
        return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
}
