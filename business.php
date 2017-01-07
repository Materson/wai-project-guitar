<?php

function get_db()
{
    $mongo = new MongoClient(
        "mongodb://localhost:27017/",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
            'db' => 'wai',
        ]);

    $db = $mongo->wai;

    return $db;
}

function get_login($login)
{
    $db = get_db();
    $login = $db->users->findOne(['login' => $login]);
    return $login;
}

function save_user($login, $pass)
{
    $db = get_db();
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $db->users->insert(["login"=>$login, "pass"=>$pass]);
}

function get_user($login, $pass)
{
    $db = get_db();
    $user = $db->users->findOne(["login"=>$login]);
    if($user !== null && password_verify($pass, $user["pass"]))
        return $user;
    else
        return false;
}

function save_img($name)
{
    $db = get_db();
    $db->images->insert(["name" => $name]);
}

function get_imgs()
{
    $db = get_db();
    $imgs = $db->images->find();
    return $imgs;
}

function get_products()
{
    $db = get_db();
    return $db->products->find();
}

function get_products_by_category($cat)
{
    $db = get_db();
    $products = $db->products->find(['cat' => $cat]);
    return $products;
}

function get_product($id)
{
    $db = get_db();
    return $db->products->findOne(['_id' => new MongoId($id)]);
}

function save_product($id, $product)
{
    $db = get_db();

    if ($id == null) {
        $db->products->insert($product);
    } else {
        $db->products->update(['_id' => new MongoId($id)], $product);
    }

    return true;
}

function delete_product($id)
{
    $db = get_db();
    $db->products->remove(['_id' => new MongoId($id)]);
}
