<?php
// composer autoload should be used to load all classes
// structure your code into namespaces



$app = Application::instance(); // This is a singleton instance


$app->get('/', function ($req, $res) {
	$res->send('Hello world');
});

$app->get('/contact', function ($req, $res) {
	// load contact.php from a templates/ folder, pass the data to the template
	// in contact.php, create a box at the middle of the page (use css to style it) nd place your form in it.
	$res->render('contact.php', ['siteName' => 'decagon', 'toEmail' => 'info@example.com']);
});


$app->get('/users', function ($req, $res) {

	$data = [
		[
			'id' => 1,
			'name' => 'decagon',
			'age' => 2,
		],

		[
			'id' => 2,
			'name' => 'John',
			'age' => 20
		],
		[
			'id' => 3,
			'name' => 'John',
			'age' => 15
		],
	];

	$sortBy = $req->input('sort');
	$direction = $req->input('direction');

	if($sortBy === 'name') {
		// sort $data by name, also, take into account, the direction
	} elseif ($sortBy === 'age') {
		//sort $data by age.
	} else {
		// do nothing
	}

	$res->sendJson($data);
});

$app->post('/users', function ($req, $res) {

	$data = $req->allFormData();
	// Write the data to a text file

	$res->redirect('/'); // Redirect to the homepage
});
