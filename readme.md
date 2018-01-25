

 <h1 align="center">Faceconnent</h1>


## About Faceconnect
<p>
  Faceconnect is an afghanistan online social media and social networking service created to connect people all around the world, devolaped in two different languages.
</p>
<ol>
  <li>English</li>
  <li>Persian (فارسی)</li>
</ol>

Faceconnect may be accessed by a large range of devices with Internet connectivity, such as desktop, laptop and tablet computers, and smartphones. After registering to use the site, users can create a customized profile indicating their name, occupation, schools attended and so on. Users can add other users as "followers", exchange messages, post status updates, share photos, and receive notifications of activity.
Faceconnect is devolaped in Laravel 5.5v (2018) [Laravel documentation](https://laravel.com/docs)  and mySql database.

<h3>Features</h3>
<ul>
 <li>Creating account</li>
 <li>sigining in</li>
 <li>Profile</li>
 <li>Followers & Follwings</li>
 <li>Blocking</li>
 <li>Timeline</li>
 <li>Likes</li>
 <li>Comments</li>
 <li>Sharing a post</li>
 <li>Messages and inbox</li>
 <li>Notifications</li>
 <li>Gallery</li>
</ul>


## Installation
<b>step 1: </b><p> Open your terminal and Clone the project. Run: <code>git clone https://github.com/zainudinnory/faceconnect.git</code></p>
<b>step 2: </b> <p>Create your .env file and specify your database</p>
<b>step 3: </b> <p>Run: <code>composer install</code></p>
<b>step 4: </b> <p>Create a key. Run:<code>php artisan key:generate</code></p>
<b>step 5: </b> <p>Run the website. <code>php artisan serve</code></p>
<b>step 6: </b> <p>Creating tables using migration. Run:<code>php artisan migrate</code></p>
<b>step 6: </b> <p>Open your browser and and run the project. Like:<code>localhost:8000</code><br>
<b>Note:</b>
<p> Factories are also created to generate fake records. you can create n number of records using factories. like: 
  <code>$ factory('App\User',50)->create()</code><br>
  <code>$ factory('App\Post',200)->create()</code><br>
  <code>$ factory('App\Like',500)->create()</code><br>
  <code>$ factory('App\Comment',200)->create()</code><br>
  <code>$ factory('App\Message',2000)->create()</code><br>
  <code>$ factory('App\Userfollow',2000)->create()</code> This creates 2000 relations(Followers & Followings) to users. 
<p>
