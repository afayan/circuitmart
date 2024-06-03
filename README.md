# Electronics E-Commerce Platform
With the rapid growth of online shopping, e-commerce businesses in the electronics sector face increasing competition. This project aims to develop an e-commerce platform specifically tailored for electronics retailers, enhancing their online presence and improving the customer experience. Let’s dive into the key features and modules of this platform:

## Key Features
Responsive Interface: The platform leverages modern web technologies and frameworks to deliver a responsive, user-friendly interface across devices. Users can seamlessly browse products on desktops, tablets, and mobile devices.
### Comprehensive Product Catalog:
The homepage dynamically displays the most popular products based on SQL queries that select items with the highest ratings from the database.
Users can explore categories such as phones and laptops, and the catalog adapts to changes in the database, ensuring the latest products are showcased.
### Secure Login and Sign-Up:
The login and sign-up pages ensure secure access to the website’s features.
Passwords are securely handled using PHP, preventing unauthorized access to sensitive information.
PHP scripts interact with the MySQL database, allowing users to create accounts, log in, and manage their credentials securely.
### Sell Page:
Facilitates the addition of new products to the website.
Users input details such as product name, description, specifications, RAM, ROM, and upload images.
These details are stored in the products database, seamlessly integrating newly added items into the catalog.
### Product Details Page:
Provides comprehensive information about each product.
Users can view detailed specifications, rate products, and provide reviews.
Average ratings are displayed using star ratings.
Users can add items to their cart, managed using JavaScript and local storage.
A related section displays similar products, enhancing the browsing experience.
### Filters:
Enables users to refine their product search based on criteria such as price range, device type, performance, and storage.
Users can select low, medium, or high values for each criterion, and relevant products are displayed.
Implemented using MySQL queries for efficient and accurate filtering.
### Coupon System:
Coupons provide users with discounts based on their shopping behavior.
Bronze, Silver, and Gold coupons are automatically added to the database using MySQL triggers when a transaction is recorded.
Users can enter coupon codes during checkout, and PHP scripts validate the codes against the coupons database.
Validated coupons apply discounts to the total amount, and used coupons are deleted to prevent reuse.
### Laptops/Phones Page:
Allows users to browse specific categories of products (laptops or phones).
Dynamically updates based on changes in the database.
### Cart and Checkout:
The cart module displays items added by users for purchase.
Users can manage their cart, removing items as needed.
During checkout, users provide details, and coupon validation is performed.
Transaction details are stored in the transactions database.
Users may receive additional coupons based on transaction history.
## Database Tables:
### Coupons: Stores coupon details (type and discount percentage).
### Products: Contains information about all available products.
### Transactions: Records user transaction details (purchased items and total amount).
### Rating: Stores product ratings and reviews provided by users.
### Users: Stores user account information (login credentials and personal details).
## Implementation Details
This project’s technical architecture involves integrating frontend components (HTML, CSS, JavaScript) with backend technologies (PHP, MySQL). Each module interacts with the relevant database tables to provide a seamless user experience. The website prioritizes security, scalability, and performance optimization to handle high traffic volumes during peak periods.
