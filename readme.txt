=== Fixed ===
Theme URI: http://themes.okaythemes.com/medium
Description: Medium is a neatly designed blog-style theme, perfect for sharing photos, videos, quotes, and thoughts.
Author: Mike McAlister / Okay Themes
Author URI: http://okaythemes.com
Version: 1.1
Tags: white, gray, three-columns, flexible-width, custom-colors, custom-menu, editor-style, featured-images, post-formats, theme-options, translation-ready, photoblogging, threaded-comments
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html


=== Recommended Plugins ===

Okay Toolkit Plugin - To provide this theme with social widgets such as Twitter, Flickr, Dribbble and social link icons, I've placed that functionality in a plugin. Once installed and enabled, you can find the social media widgets in your Widgets section. You can get the plugin in the WordPress plugin repository, or by installing it directly from your Dashboard. 

Contact Form 7 Plugin - The Contact page uses the Contact Form 7 plugin, which can grab for free on the WordPress plugin repository. Once installed, you'll see there is a <strong>Contact</strong> link in the left hand sidebar of your WordPress admin.



=== Menu Setup ===

WordPress menus can be found under Appearence -> Menus.					
					
* You'll need to create at least one new menu for the header. Fixed also supports a custom menu, which you could use in the widget area. Click the + to add a new menu.			
					
* Now, on the left hand side, select the pages you would like to have added to the menu. You can then click "Add to Menu" and they will show up on the right side of the page. You can drag the pages around to arrange them the way you'd like.
										
* Save the menu when finished.
									
* Now that you have both menus created, you need to assign them in the Theme Locations window located on the left. From the drop down menu, select the appropriate menu for the header and footer and click Save.



=== Contact Page ===

The Contact Page uses the Contact Form 7 plugin, which can grab for free on the WordPress plugin repository. Once installed, you'll see there is a <strong>Contact</strong> link in the left hand sidebar of your WordPress admin.

* If you haven't already, create a new page called Contact.

* Go to the Contact menu on the left admin menu to configure your contact form. By default they give you a simple form with Name, Email, Subject and Message. To keep things simple, I suggest using the default form. Otherwise, to customize this form even further, check out the Contact Form 7 docs page. 

* After you've configured and saved your contact form in the Contact menu, you will be given a small shortcode like this: [contact-form 1 "Contact form 1"]. Copy this
shortcode. We'll use this to add the form to our Contact page

* Now head back to your Contact page. Paste the Contact 7 shortcode that you copied into the body of the post. Update the post. You should now see the form on the contact page.



=== Archive Page ===

Fixed comes with an Archive page template which displays all of your latest posts, pages and categories.

* Create a page called Archives (or whatever title you'd like).

* On the right hand side of the page, in the <strong>Page Attributes</strong> pane, select <strong>Custom Archive</strong> from the Template menu.

* Once finished, publish your page and check out the archive.



=== Using the Theme Customizer ===

Fixed is customizable via the WordPress customizer. Here, you can set a custom background image, upload a logo and set your link color.

* To access the theme customizer, click Appearance -> Customize in the WordPress admin menu.

* You should now be in a live preview of Fixed, with the customizer on the left.

* Use the various menus to set the site title and description, background, logo, link color and more!

* A few options specific to Fixed can be found under Fixed Styling.

* Fixed also gives you the option to use a Retina sized logo. The benefit of this is sharper images on high definition devices. To upload a Retina logo, you need to upload your logo at two times the resolution you normally would. So if your logo is 150px x 150px, you would need to resize your logo to 300px x 300px. The larger image will be served to high definition screens, and will be scaled down accordingly for regular screens. No need for multiple images, Fixed does this on the fly!

* The Accent Color setting will change the accordion menu icons on the left sidebar.

* Add custom CSS to your theme by adding it to the Custom CSS text box.

* When you're finished making changes, click Save & Publish to save the settings.

* Check out your site to confirm your changes.



=== Infinite Scrolling ===

Fixed utilizes a script called Infinite Scroll to auto load posts as users scroll down the page. This essentially means there is no footer or end of page until the user runs out of posts. 

* You can disable or enable infinite scrolling in the Customizer. Just visit Appearance -> Customize -> Fixed Styling to toggle this on or off. 



=== Left Sidebar Widgets ===

The left sidebar supports several of the default menu-style WordPress widgets: Recent Posts, Categories, Archives, Recent Comments, Custom Menu, and Meta.

When you place any of these default WordPress widgets into the left hand sidebar, they will be auto-styled as an accordion menu. To accomplish this, you simply need to place the widget in the Left Sidebar pane and give the widget a title. On the accordion menu, clicking the title will open the widget. You can add other widgets here, but it's specifically designed for the default WordPress widgets.



=== Right Sidebar Widgets ===

Medium also supports widgets in the right hand sidebar. On the theme demo, I used a Dribbble widget, Twitter widget and Retina social icons widgets that were provided by the Okay Toolkit plugin. See above for info on the Okay Toolkit.



=== Creating Image and Video Posts ===

Fixed makes it easy to share your images and videos. Follow the instructions below to add a variety of media posts.



=== Featured Image Posts ===

* Create a new post and add a title and description.

* Write your content and add whatever styling you want.

* On the right hand side of your page, you'll see the Featured Image pane. Click Set Featured Image and upload your image. Once uploaded, scroll down and click Use as featured image. Once set, you can close the image upload window.

* Once you've added the featured image and content you can publish and preview your post.



=== Gallery Image Posts ===

* To use the gallery feature, you must have the latest version of the Okay Toolkit plugin and WordPress 3.5 or newer. Be sure to read the Toolkit setup above and also check out [this quick video](https://vimeo.com/57772300) I made showing how it works
						
* To use the awesome new WordPress galleries, you first need to be running WordPress 3.5. Secondly you need to install the Okay Toolkit. See instructions above.
							
* Once you have the Okay Toolkit installed, go to Settings -> Okay Toolkit. Enable the [Enable Gallery Feature](http://cl.ly/MJJx) towards the bottom of the page and Save your settings
							
* Create a new post and add a title and description
							
* On the right hand side of your page, you'll see the Format box. Click Gallery to set the post format and activate the gallery options
							
* Under your post editor, you'll see the [Okay Gallery pane](http://cl.ly/MIk4). Click the Edit Gallery button. Once the Edit Featured Gallery dialog opens, upload the images you'd like in your gallery, or select them from images you've already uploaded with the [Add to Gallery link](http://cl.ly/MJTg). Once your images are selected, click Add to Gallery. When finished, you can arrange your images by selecting and dragging them into position. If the theme supports image captions, you can add one in the [Edit Featured Gallery page](http://cl.ly/MJAU)
							
* Once you've added your images and content you can publish and preview your post
							



=== Video Posts ===

* Create a new post and add a title and post content.

* Next, scroll down the page a bit and look for the Custom Fields box. If you don't see the Custom Fields box, look up towards the top of your screen and click the Screen Options drop down. Make sure Custom Fields is checked.

* Now you can add the Custom Field. The Name is going to be 'video' and the value will be your embed code. See this image for reference: http://cl.ly/JqYH. Click Add Custom Field.

* Once you've added the custom field and content you can publish and preview your post.



=== Post Styles ===

Fixed comes with a few custom element styles, which are used to easily add extra styling to your WordPress posts. To use the post styles, simply select your text and then select from the Styles drop down which style you would like to apply. You'll be able to see the changes live, in your editor.

Intro Title - As seen on the demo, this is a nicely styled block of text to introduce your page. Similar to blockquote styling.

Highlight Text< - As seen on the demo, this styles your text with a highlighted yellow background.