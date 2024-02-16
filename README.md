<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="Visiarch_standard_blog_0"></a>Visiarch standard blog</h1>
<h2 class="code-line" data-line-start=1 data-line-end=2 ><a id="_build_with_Laravel_10__1"></a><em>build with Laravel 9</em></h2>
<p class="has-line-data" data-line-start="3" data-line-end="4"><a href="https://travis-ci.org/joemccann/dillinger"><img src="https://travis-ci.org/joemccann/dillinger.svg?branch=master" alt="Build Status"></a></p>
<p class="has-line-data" data-line-start="5" data-line-end="6">Visiarch blog is a standard blog application built using Laravel 10 framework, Tailwindcss, and Alpine Js. This application is equipped with Laravel Breeze, spatie/laravel-permission as standard authentication.</p>
<h2 class="code-line" data-line-start=7 data-line-end=8 ><a id="Features_7"></a>Features</h2>
<ul>
<li class="has-line-data" data-line-start="9" data-line-end="10">Email verification</li>
<li class="has-line-data" data-line-start="10" data-line-end="11">email/username login</li>
<li class="has-line-data" data-line-start="11" data-line-end="12">different layout for public and admin</li>
<li class="has-line-data" data-line-start="12" data-line-end="13">role and permission</li>
<li class="has-line-data" data-line-start="13" data-line-end="14">user management</li>
<li class="has-line-data" data-line-start="14" data-line-end="15">subscriber management</li>
<li class="has-line-data" data-line-start="15" data-line-end="16">M+1 problem</li>
<li class="has-line-data" data-line-start="16" data-line-end="17">SEO</li>
<li class="has-line-data" data-line-start="17" data-line-end="18">sitemap</li>
<li class="has-line-data" data-line-start="18" data-line-end="19">PWA for offline service</li>
<li class="has-line-data" data-line-start="19" data-line-end="20">Testing Unit</li>
<li class="has-line-data" data-line-start="20" data-line-end="22">it’s free, but if you like it you can treat me to a coffee.</li>
</ul>
<h2 class="code-line" data-line-start=22 data-line-end=23 ><a id="Installation_22"></a>Installation</h2>
<ul>
<li class="has-line-data" data-line-start="24" data-line-end="25">git clone <a href="https://github.com/...">https://github.com/bagussuandana/Visiarch-Blog.git</a></li>
<li class="has-line-data" data-line-start="25" data-line-end="26">Change folder name</li>
<li class="has-line-data" data-line-start="26" data-line-end="27">Open in editor and run terminal</li>
<li class="has-line-data" data-line-start="27" data-line-end="28">composer install</li>
<li class="has-line-data" data-line-start="28" data-line-end="29">npm install</li>
<li class="has-line-data" data-line-start="29" data-line-end="30">create .env file</li>
<li class="has-line-data" data-line-start="30" data-line-end="31">setup database .env</li>
<li class="has-line-data" data-line-start="31" data-line-end="32">create database</li>
<li class="has-line-data" data-line-start="32" data-line-end="33">setup email .env (I recommend using mailtrap)</li>
<li class="has-line-data" data-line-start="33" data-line-end="34">setup FILESYSTEM_DRIVER=public .env</li>
<li class="has-line-data" data-line-start="34" data-line-end="35">php artisan key:generate</li>
<li class="has-line-data" data-line-start="35" data-line-end="36">php artisan storage:link</li>
<li class="has-line-data" data-line-start="36" data-line-end="37">php artisan migrate:fresh --seed</li>
<li class="has-line-data" data-line-start="37" data-line-end="38">php artisan serve</li>
<li class="has-line-data" data-line-start="38" data-line-end="39">register yourself at browser <a href="http://localhost:8000/register">http://localhost:8000/register</a></li>
<li class="has-line-data" data-line-start="39" data-line-end="40">define super admin</li>
<li class="has-line-data" data-line-start="40" data-line-end="41">php artisan tinker</li>
<li class="has-line-data" data-line-start="41" data-line-end="42">$user = User::find(1);</li>
<li class="has-line-data" data-line-start="42" data-line-end="43">$user-&gt;assignRole(‘super admin’);</li>
<li class="has-line-data" data-line-start="43" data-line-end="44">exit from tinker</li>
<li class="has-line-data" data-line-start="44" data-line-end="45"><a href="http://localhost:8000/dashboard">http://localhost:8000/dashboard</a></li>
<li class="has-line-data" data-line-start="45" data-line-end="46">verify-email</li>
<li class="has-line-data" data-line-start="46" data-line-end="47">done</li>
</ul>
