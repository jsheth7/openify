openify
=======

### What is openify?

openify helps you parse and act on public data feeds.

It was put together rather quickly, over the course of a few rushed weekend hours and sweaty summer nights.

### What does it do?

* Parses the page news from the OpenSSL project, and extracts security advisories
* Parses the security feed from ArsTechnica, and extracts articles
* Saves these news items to the "links" collection in MongoDB

### Why do I need openify?

* Be the first to know when the next Heartbleed hits. Get advance warning from openify, so you can patch your servers before the world goes crazy and melts down. 
* Then get notified when Ars Technica writes about it a few days later. Sit back, relax, sip your coffee, and smile. Your data is safe!

### What's remaining to be done?

* Add mechanism to act on these feeds, and send notifications to your mobile device (via Pushover), or email
* Add additional input sources (the openssl git log's RSS feed would be cool)
* Part of the code for Pushover notifications is written - it just needs to be hooked into the right place
* Allow arbitrary recipients to be defined (via a config file or database entries)
* Decide whether all of this code should be moved to a framework (Symfony / Silex / Laravel)

### Design philosophy:

* Use ready-made, re-usable open source components, for non-core functionality (see composer.json)
* Use PHP 5 object-oriented goodness, including namespaces and auto-loading
* Keep classes and methods short and sweet (single responsibility principle)
* Strive to make classes loosely coupled and interchangeable
* Allow an arbitrary number input sources and output processors to be defined

### Requirements:

* PHP 5.4 or higher
* composer
* MongoDB
* A curious mind, good sense of humor, or both (*)

### Installation:

To install, please run:

    composer install

Operation:

To run, please run:

    php run.php openssl

or

    php run.php ars

### Where's my data?

Make sure the Mongo daemon (mongod) is running locally
Connect to mongo, select openify database, search links collection.

    mongo
    use openify
    db.links.find()

* Optional, but highly recommended :)

### License:
Creative Commons Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
http://creativecommons.org/licenses/by-sa/4.0/

