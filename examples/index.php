<?php

require_once "../vendor/autoload.php";

//First Configure Http Request
$client = \Sendplus\Sendplus::configure("API_TOKEN_HERE");

/**
 * MAILING LISTS
 */
//Get all lists with pagination
$client->mailingList()->all(1);

//Get specific list
$client->mailingList()->get("LIST_ID_HERE");

//Create a list
$client->mailingList()->create(['title' => 'test-list']);

//Update a list
$client->mailingList()->update('LIST_ID_HERE',[
    'title' => 'changed-test-list'
]);

//Delete a list
$client->mailingList()->delete('LIST_ID_HERE');

/**
 * CONTACTS
 */
//Get all contacts with pagination
$client->contact()->all();

//Get a specific contact data
$client->contact()->get("CONTACT_ID_HERE");

//Create a contact
$client->contact()->create([
    'email' => 'julia@roberts.com',
    'first_name' => 'Julia',
    'last_name' => 'Roberts',
    'lists' => [
    'LIST_ID_HERE'
    ]
]);

//Update a specific contact
$client->contact()->update('CONTACT_ID_HERE',[
    'first_name' => 'Melania',
    'lists' => [
        'LIST_ID_HERE',
        'SECOND_LIST__ID_HERE'
    ]
]);


/**
 * CONTACTS BASED ON LISTS
 */
//Get all contacts of a specific list
$client->mailinglistContact('LIST_ID_HERE')->all();

//Create a contact and linked it to a specific list
$client->mailinglistContact('LIST_ID_HERE')->create([
    'email' => 'julia.roberts@',
    'fields' => [
        'type' => 'actress'
    ]
]);

//Bulk import contacts via a csv file
$client->mailinglistContact('Jz12bLqQ27d83Z6X')->bulk([
    'file' => 'PATH/TO/SAMPLE_FILE.CSV'
]);

/**
 * CAMPAIGNS
 */
//Get all campaigns with pagination
$client->campaign()->all();

//Get a specific campaign data
$client->campaign()->get('CAMPAIGN_ID_HERE');

//Create a campaign
$client->campaign()->create([
    "title"=>"example",
	"subject"=>"new opportunities for you here!",
	"from_email"=>"info@roberts.com",
	"from_name"=>"Julia Robert",
	"reply_email"=>"reply@roberts.com",
	"reply_name"=>"Roberts Organization",
	"html_content"=>"<p>hi</p>",
	"scheduled_at"=>"2020-07-30 12:00:00", //UTC Timestamp
	"lists"=> [
        "LIST_ID_HERE",
        "SECOND_LIST_ID_HERE",
    ],
	"trigger_status"=> "scheduled"
]);

//Update a campaign
$client->campaign()->update('CAMPAIGN_ID_HERE', [
    "title"=>"changed",
    "trigger_status"=>"draft",
]);

//Archive a sent/draft campaign
$client->campaign()->archive('CAMPAIGN_ID_HERE');

//Test a campaign before send it to contacts
$client->campaign()->test([
    "to" => [
        "reciever1@example.com",
        "reciever2@example.com",
    ],
    "subject"=>"new opportunities for you here!",
    "from_email"=>"info@roberts.com",
    "from_name"=>"Julia Robert",
    "reply_email"=>"reply@roberts.com",
    "html_content"=>"<p>hi</p>",
]);