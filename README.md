# BHRA-leaf-raking

This is a web-based application for Bare Hill Rowing Association's Leaf Raking Fundraiser.  The application allows rowers and supervisors to manage their raking assignments. By using this application the rower can specify which days they are available for raking, view their current raking appointments, and trade spots with other rowers.  Supervisors can sign up to oversee a team and review their schedule.

The code is php using XAMPP(Apache and mySQL). The files in this repository can be downloaded directly to xampp/htdocs/xxx.

REFERENCES:

PHP Get Started Tutorial:  This is an outstanding introduction to PHP.  PHP is used to generate htlp page content, interface with back-end databases, and manage session state. The BHRA Leaf Rakign code follows this closely!
http://www.pluralsight.com/search/?searchTerm=php

Mercury email is used for local for design/debug of PHP mail on the PC.  Mercury is part of XAMPP and is used as a SMTP mail relay.  When the files are later uploaded it (should be) easy to move to use the service-provider-provided SMTP server.  My service provider is go-daddy.  Very good instructions at:
http://www.open-emr.org/wiki/index.php/Mercury_Mail_Configuration_in_Windows


=================
User Authentication:
There are about 100 rowers. Parents share an account so there are about 100 parent accounts.  There is a single administrator account.

All accounts are created in advance by the administrator.  This is done by importing relevant information (name, phone, email, etc) from a tab-delimited file into the SQL database 

Users cannot establish their own account.  They can however update information with which they are associated.

An email is sent to individual users to notify them of their account.  This email includes a link to page. Visiting the link establishes session.  Users are instructed that the link is to be treated as a password (not shared).  The approach is similar to that used by Craigslist to manage postings.

User Devices
====================
The system will support common handhelds (iphone, ipad, itouch, android) and desktops (google chrome, firefox, internet explorer).

Limited Support
=====================
The team is volunteer-run with limited time to review/support/maintain code.  Our preference is simple low-level code which is much easier to pick up and support.  User interface should be limited to html forms populated by PHP.  We are hoping to receive a low number of lines, and  only the most basic tools be used.  An example is user interface which is intentionally sparse (our users are members of our team, not customers).

Our recommended platform is HTML/PHP with XAMPP (Apache,MySQL). This is a very common platform available and supported by most service providers.  If you feel otherwise please advise and justify.




Administrator UI
================

Account login (link) is send to users via the "?????" page.  This uses PHP email.
Reference
https://code.google.com/a/apache-extras.org/p/phpmailer/wiki/UsefulTutorial


http://us3.php.net/manual/en/function.mail.php




Rower and Parent UI
===================
The rower has:
INFO (ability to update user information)
SCHEDULE (ability to see current schedule)
FULL SCHEDULE (ability to view entire schedule)
LOGOUT (closes session)

INFO:
This page lets rower view and change personal info:
The fields are: username, firstname, lastname, coxswain[yes, no], novice/varsity gender, school[Bromfield, A/B], grade, email1, email2 cellphone, homephone

The following field is view-only
group[A,B,C]

SCHEDULE
This page lets rower view their current raking schedule (appointments), and lets them specify their availability, and lets them trade appointments with other rakers.








  For these reasons we are hoping to keep the total amount of source code low.




 and typi

=====================
User Interface



======================

Database Tables:
There are three tables: Rowers, Supervisors, Appointments.  Rowers and Supervisors contain all information relating to the rower and parents.  These are populated by importing direclty from .csv file into the mySQL database.  Additional updates/management of this information is done also using mySQL management interface directly.  I do not provide (at this time) any user-interface to update or manage this information.

The Appointments table contains all customer reservations.  This is populated by importing directly from .csv file provided from the customer reservation system - SuperSaas.

There is one final table - Team.   A Team is a collection of Supervisors, Rakers, and Appointments, and is intended to focus on a half-day of raking.   A team is (preferably) *one* supervisor and *three* rakers, and the Appointments are all on the same half-day. (There is nothing in the database that enforces this relationship - it is front-end processing).

