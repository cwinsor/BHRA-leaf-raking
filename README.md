# BHRA-leaf-raking

This is a web-based application for Bare Hill Rowing Association's Leaf Raking Fundraiser.  The application allows rowers and supervisors to manage their raking assignments. Using this application the rower can specify which days they are available, view their current appointments, and trade spots with other rowers.  Supervisors can sign up to oversee a team.

The code is php using XAMPP(Apache and mySQL). The files in this repository can be downloaded directly to xampp/htdocs/xxx.

Database Tables:
There are three tables: Rowers, Supervisors, Appointments.  Rowers and Supervisors contain all information relating to the rower and parents.  These are populated by importing direclty from .csv file into the mySQL database.  Additional updates/management of this information is done also using mySQL management interface directly.  I do not provide (at this time) any user-interface to update or manage this information.

The Appointments table contains all customer reservations.  This is populated by importing directly from .csv file provided from the customer reservation system - SuperSaas.

There is one final table - Team.   A Team is a collection of Supervisors, Rakers, and Appointments, and is intended to focus on a half-day of raking.   A team is (preferably) *one* supervisor and *three* rakers, and the Appointments are all on the same half-day. (There is nothing in the database that enforces this relationship - it is front-end processing).

