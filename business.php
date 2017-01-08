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

function save_user($login, $pass, $email)
{
    $db = get_db();
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $db->users->insert([
        "login" => $login,
        "pass" => $pass,
        "email" => $email]);
}

function check_user($login, $pass)
{
    $db = get_db();
    $user = $db->users->findOne(["login" => $login]);
    if($user !== null && password_verify($pass, $user["pass"]))
        return $user;
    else
        return false;
}

function save_img($name, $access, $author, $title)
{
    $db = get_db();
    $db->images->insert([
        "name" => $name,
        "access" => $access,
        "author" => $author,
        "title" => $title]);
}

function get_imgs()
{
    $db = get_db();
    $imgs = $db->images->find();
    return $imgs;
}

function get_img($id)
{
    $db = get_db();
    $img = $db->images->findOne(["_id" => new MongoId($id)]);
    return $img;
}