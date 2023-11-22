# dgl123-final
My final project

## PAIN LOG
### Day 21-10-23
- 404 page wasn't working, because of my .htaccess | I have it redirecting to index, and removing the .php from the end of its URL. This coupled with some other things lead me down an HOUR LONG TROUBLE SHOOT. I created infinite loops, made all my pages have errors and overall was ready to send my laptop to the netherworld. However, I figured out my issue, and the problem with every page going to a 404 page was because of the way it called the function looking for if the page existed. Thankfully, chatGPT and I are hommies and we figured it out. Yeah, I use chatGPT ALL THE TIME. I'm not ashamed, it doesn't replace my thinking it just helps me with the mundane things, and spotting mistakes.

## SIMPLIFICATION PROCESS
- as of right now I have overly complicated logic, and no real direction that I am going. I am going to redirect my focus to work on something different entirely. For MILESTONE 3, my goal is to create a database that stores products that are related to a store front. ON the store front page, if you click on a product it will open up that product post. THAT IS ALL.

# DOCUMENTATION
The purpose of this app is to provide the users the ability to create accounts and storefronts to sell their products to other users.

Each user can create one storefront, and every storefront can have any amount of products attached to it. Each store will display a:
- profile picutre
- banner image
- up to 3 social medias
- store owner
- primary, secondary and highlight colors
- products
- total orders
- total reviews
- total items for sale

The way the app works is by inserting the store or product related data into a template / placeholder. There are two templates at the moment, store and product. If a user goes to a store named A La Spaghetti the URI will look like crackedunicorn.com/store?name=al-a-spaghetti. If a user clicks on a product called spaghetti the URI will look like crackedunicorn.com/product?name=spaghetti.

There are a few issues with this approach, such as the sharability isn't great especially if there are multiple stores with the same product names, one way to get around this would be to add the stores unique ID before the product name, so /product?id=1&name=spaghetti

Each pages store products are printed using the same product loader statement. There is an a conditional loop checker to see if the products that are being loaded belong to the same store front, and if so they do not print the store speficic information such as "rating, store name and orders" with the product. For a smaller project this code is probably better because it allows for more DRY, but on a larger scale project where many users are constantly moving between stores it will slow down the website speed, as for every product it queries the database to see if the product matches the store. To get around this there are two solutions, solution one is to create a store specific product loader, solution 2 is to store the store information in a temp variable and check every each product to that. For long term health and sustainability, it would probably be best to create a new product loader in its entirety.

Another issue with the product loader is that it can only load each product after retriving all the information from the database, including the product image. This will be an issue when it comes to slower devices, connections and big loads on the server end, as it cannot load the following product before loading the blob. A way to improve this would be to make it so the blob can be loaded asyncronously, however, I do not know how to do this with PHP, and its a little outside the project scope.

There is no search functionality, and no way of filtering results by price, first added, last added, quantities ect.