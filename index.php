<?php

$action = trim($_SERVER['REQUEST_URI'], '/');
if(preg_match('/^poll\//i', $action, $matches)){
    preg_match('/[^poll\/].+[^\?result]/i', $action, $matches);
    $id = $matches[0];
    poll($id);
} else {
    add();
}

function add()
{
    if($_POST){
        $poll = [];
        $poll_id = hash('CRC32', $_POST['question']);
        $poll['id'] = $poll_id;
        $poll['poll']['question'] = $_POST['question'];
        $poll['poll']['answer'] = array_filter($_POST['answer']);
        if(save_data($poll_id, $poll)){
            header("Location: /poll/$poll_id");
        }
    }
    $view = 'view/add.php';
    include('view/layout.php');
}

function poll($id)
{
    $poll = get_data($id);
    $has_poll = false;
    $user_agent = get_browser(null, true);
    $ip = $_SERVER['REMOTE_ADDR'];
    if(!file_exist('users')){
        $users = [];
    } else {
        $users = get_data('users');
        if(isset($users[$ip]) && in_array($user_agent['browser'], $users[$ip])){
            $has_poll = true;
        }
    }
    If($_POST){
        $poll['result'][] = $_POST;
        if(save_data($id, $poll)){
            if(!$has_poll){
                $users[$ip][] = $user_agent['browser'];
                save_data('users', $users);
                $has_poll = true;
            }
        }
    }
    if(isset($_GET['result'])){
        include('view/result.php');
    } else {
        $view = 'view/poll.php';
        include('view/layout.php');
    }
}

function save_data($name, $data)
{
    $fp = fopen("upload/$name.json", 'w');
    $result = fwrite($fp, json_encode($data));
    fclose($fp);
    return $result;
}

function get_data($name)
{
    $json = file_get_contents("upload/$name.json");
    return json_decode($json, true);
}

function file_exist($name){
    return file_exists("upload/$name.json");
}
