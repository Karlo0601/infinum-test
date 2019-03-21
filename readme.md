# Infinum - WordPress Task

This is a WordPress theme created as a task for job assignment in Infinum.

For the creation of this theme, Infinum wp-boilerplate was used.

## If you want to try this theme, here is a quick setup:

1.) Setup Local domain on your server (xampp, wamp, etc.) for this project infinum-test.mydev

2.) Download this repository

2.) Import database

3.) Resave permalinks

4.) Use Customizer to edit the theme (upload logo, footer copyright text, Header buttons, Titles etc.)

5.) That's it

## Notice
phpCS, Linters are not working when the project is opened from the root folder, for them to work I needed to open a theme folder.
Linters are throwing some errors like:
npm ERR! code ELIFECYCLE
npm ERR! errno 2
npm ERR! infinum@3.0.0 __stylelintTheme: `stylelint skin/assets/**/*.scss`
npm ERR! Exit status 2
npm ERR!
npm ERR! Failed at the infinum@3.0.0 __stylelintTheme script.
npm ERR! This is probably not a problem with npm. There is likely additional logging output above.

Problems with fonts import, it returns path like: skins/assets/..onts/
