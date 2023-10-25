<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

// find the note
$note = $db->query('select * from notes where id = :id', [
    'id'   => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the note
authorize($note['user_id'] == $currentUserId);

// validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 140))  {
    $errors['body'] = 'A body of no more than 140 characters is required.';
}


// if no validation errors, update note
// если есть ошибки, то перезагрузить форму
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edite Note',
        'errors' => $errors,
        'note' => $note
    ]);
}
// если не было ошибок, просто обновить запись
$db->query('update notes set body = :body where id = :id', [
    'id'   => $_POST['id'],
    'body' => $_POST['body']
]);

// redirect
header('location: /notes');
die();
