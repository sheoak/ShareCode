ShareCode
=========

Provide a ready-to-use code sharing tool (no database).

Installation
------------

Just copy/paste ShareCode directory wherever from you want to use it.

Depending on your rights under Linux, you may have to change them to allow writting under the `codes/` directory.

Usage
-----

Just go to `http://[...]/ShareCode/` and you'll be automatically redirected to `http://[...]/ShareCode/XXX`, XXX being an automatically generated slug that you give to others to allow them watching your code "live" as you type it.

The first to use the slug is the "administrator" one : only him can change the code. Others can only watch and copy it.

Releases Notes
--------------

### v1.1.0
* Safer server-side AJAX files (managing wrong slug and no existing file)
* Complete reorganization of JS And PHP Ajax files
* Better code optimization and logic
* No more "last character" issue with fast-typing code (client-server double parameters comparison instead of one)
* Usage of jquery-min instead of jquery (to lighten the global size)
* Many more comments
