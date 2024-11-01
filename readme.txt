=== Plugin Name ===
Contributors: Laurence(at)OhMyBox.info
Donate link: http://www.ohmybox.info
Tags: longform, stories, scrollytelling, scroll, custom post, long-form, simple long form, journalist tool, longreads, journalism, storytelling
Requires at least: 4.2.3
Tested up to: 5.9
Stable tag: 5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Building longreads has never been so easy with SLF. No knowledge of code is mandatory to enhance your stories and make it scroll. 

== Description ==

Simple Long Form helps to build easily one-page-scroll without knowing anything about coding. Things are kept the most simple, but those who like to put their hands in code should enjoy the possibility to play with Bootstrap components (templates are built with Bootstrap.js).

The plugin activation creates a new type of content (custom post type) :  Longform. It can be integrated to the full WP installation or it can be kept independent.
  
Since V1, it is possible to link longforms more deeply with WP (and with other plugins) via the panel Options.
There is also a dedicated widget and a dedicated Archives page.

A template is totally customizable. Take the power on your design!

SLF is available in French, English, in German (thanks to Christiane) and in Dutch (beta). It is designed for storytellers and journalists.

Front-end demo 1 (V1): http://www.ohmybox.info/longform/simple-long-form-v1/

Front end demo 2 (V1.3/4): http://www.ohmybox.info/longform/simplelongform-new/

Archives page: http://www.ohmybox.info/longform

Image gallery demo (fr/en): http://www.ohmybox.info/longform/simple-long-form-galeries/

== Installation ==

1. Upload the decompressed simplelongform.zip to the `/wp-content/plugins/` directory
Or upload it via WP's dashboard : Plugins > Add New
2. Activate the plugin through the 'Plugins' menu in WordPress
3. A new custom post type appears on the dashboard, just below "Posts" in the menu : "Long Form"

See here requirements and specification : http://www.ohmybox.info/simple-long-form-specification-requirements/

Full documentation (fr/en): http://www.ohmybox.info/box/wordpress/

== Frequently Asked Questions ==

= I have made an update of WP and my posts are not showing anymore... =

Go to settings/permalinks and save the settings without making any change (if you don't want to).

= How do I manage images galleries with SLF? =

Have a look here : http://www.ohmybox.info/longform/simple-long-form-galeries/
You can also link the plugin with your installation (via panel Options) and chose to use other plugins.

= How do I manage the settings ? =

Documentation (in Fr) is available here: http://www.ohmybox.info/slf-une-exploration-des-options-de-configuration/

= There is a problem for displaying section in the back-end... =

Don't panic : verify the screen options (button on the right at the top of the edit page) and make sure that the chek-box of each section (from "section1" to "section7") is activated.

= I want to add my custom CSS style but it does not work... =

Make sure that you have chosen the matching selector (easy to check with web developer tools). 
You can also overwrite the CSS rules by adding the !important hack, like in this example: a:hover{color:#CC0033!important;}

= I want to preview my longform but the page is not found... OR My archive page is not displaying well... =

That means that the "flush" function has failed on your installation. Go to "options / permalinks" and save your settings to fix it (you don't have to change the structure of your permalinks!).

= Why my old longforms are not displaying well? =

It you have used a predefined template, it is possible that thoses longforms are affected by the update of v.1.3. But don't panic! The way to get it all right back is to edit your longform and then save it. It takes only one minute and there is nothing else to do. The new version offers much more possibilities that is why predefined templates are no more available.

= I want more control on my metadata... =

Feel free to use the light weight plugin Simple Metadata Generator, the compatibility is full but you have to adjust the setting page of SLF!

= What should I do if there is a bug? =

Tell me and I'll manage to fix it : hello (at) ohmybox.info


== Screenshots ==

1. /tags/4.3/screenshot-1.jpg` 
2. /tags/4.3/screenshot-2.jpg` 
3. /tags/4.3/screenshot-3.jpg`
4. /tags/4.3/screenshot-5.jpg`
5. /tags/4.3/screenshot-6.jpg` 

== Changelog ==

= 1.1 =
* 1.1.5 Compatibilities and back-end improvements 
* 1.1.7 Important fixed for CSS main template
* 1.1.8 Small change in CSS main style 

= 1.2 =
* 1.2 New option added for displaying in search queries, categories and tags in case of this is not naturally added by WP 

== Upgrade Notice == 

= 1.1.5 =
* New release width queries filters fixed, Dublin Core metadata added and some improvements for back and front-end.
= 1.1.6 =
* New release width video fixed on homepage and bacstrectch.js for fullscreen backgrounds compatibilities
* 1.1.6.1. Bug fixed from the previous version
* 1.1.6.2. Title well aligned + 2 new fonts
* 1.1.6.3. Color fixed for SLF default template (top title)

= 1.2 =
* 1.2 New option added for displaying in search queries, categories and tags in case of this is not naturally added by WP 
* 1.2.1 New option split in two
* 1.2.2 Add CPT to author's page (automated task)
* 1.2.5 Display an archive page with the slug /longform
* 1.2.6 Widdget : bug fixed
* 1.2.6 Diplaying authors in admin : bug fixed / Displaying on homepage : see the settings but may cause compatibility issues

= 1.3 =
*  Options improved
*  2 social networks added (Pinterest and WhatsApp)
*  Lay-out improvements (responsive incl.)
*  1.3.1 CSS improved for Archives
*  1.3.3 CSS improved for Social Networks
*  1.3.4 CSS improved for Archives (important)
*  1.3.5 Now you can customize the Arhives page
*  1.3.6 Password protected enable
*  1.3.6 Translations updated

= 1.4 =
*  News Font Awesome icons (v 5)

= 1.5 =
*  Some lay-out improvements
* 1.5.3 Custom background: bug fixed + new German translation (many thanks to Ralph)
* 1.5.5 Translations updated (again, many thanks to Ralph!)
* 1.5.6 German version completed
* 1.5.9 German version improved

= 1.7 =
* Comments lay-out improvements

= 1.8 =
* SLF goes Bootstrap 4 and offers new possibilities for ordering sections, images, videos.

= 1.9 =
* Quotes: bug fixed

= 1.9.1 =
* Twitter network: bug fixed

= 1.9.3 =
*Popper element removed & CSS bug fixed

= 1.9.5 =
*CSS quotes : bug fixed
*Bug fixed in admin
*CSS improved (titles)

= 1.9.6 =
*Caption: bug fixed
*Loader: only the circle (no other choice possible anymore)

= 2.0 =
*CSS improved
*New navigations options (vertical or horizontal dynamic menu)