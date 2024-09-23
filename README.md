
# Karma - Product Promotion and Purchase Platform</h1>

## Description 
Karma is a web application designed for product owners to showcase and promote their products. Users can browse products, view detailed descriptions, and purchase items using PayPal. The platform aims to simplify the process so that product owners can reach a wider audience while providing a seamless shopping experience for users.

## Features 
- User Authentication and Registration: Secure user authentication allowing customers to create accounts and log in to make purchases.
- Product Management: Product owners can easily manage their products by adding, editing, and deleting items with detailed descriptions and images.
- Shopping Bag (Cart) for Each User: Users can add multiple products to their shopping bag, review them, and proceed to checkout when ready.
- PayPal Integration: Users can securely purchase products using PayPal for a smooth transaction process.
- Image Upload for Products: Product owners can upload high-quality images to showcase their products better.
- Responsive Design: The platform is fully responsive, providing a seamless experience on both mobile and desktop devices.
- Input Validation: Ensures the integrity of the data submitted by users, preventing invalid or malicious inputs.
- Detailed Error Handling and Status Codes: Provides clear error messages and proper status codes, ensuring a better user experience.
- Well-Structured Code: Following Laravel best practices to maintain clean, scalable, and well-organized code for easy future maintenance and upgrades.

## Technologies Used 
- Backend: Laravel 10
- Frontend: Bootstrap & JavaScript
- Database Management: PHPMyAdmin (MySQL)
- Payment Processing: PayPal API

## Video Tutorials

### User Scenarios

1. Creating an Account and Validating Input:<br>
This video walks through the website's homepage, demonstrating how to create a new user account. It includes:
-  Navigating to the homepage.
- Fill in the registration form with user details.
- Real-time validation of user input to ensure correct data entry.
- Successful account creation and login.
  
  https://github.com/user-attachments/assets/054d7341-8054-48e2-b7dc-598b59d78d9d
---------------------------------------------------------------


2. Attempt to Purchase a Product as a Seller (with Authentication & PayPal Integration):<br>
This video demonstrates the process of a seller attempting to purchase a product, including:
- Clicking on a product to purchase.
- Being redirected to the login page if not authenticated.
- Logging in with their account credentials (ensuring secure authentication).
- Adding the product to the shopping bag.
- Proceeding to purchase the product using PayPal as the payment method.
- Once the payment is completed, the order status automatically changes from "Pending" to "Complete."
  
https://github.com/user-attachments/assets/0b980a30-3d94-4c8a-b06b-b2bc1a67ae7c

---------------------------------------------------------------

3.Adding Multiple Products to Bag and Cancelling the Order:<br>
This video shows how a user can add multiple products to the shopping bag and then cancel the order, including:
- Adding several products to the shopping bag.
- Viewing the items in the bag.
- Initiating the order process.
- Cancelling the order before payment.
- Upon cancellation, the order status automatically changes from "Pending" to "Cancelled."
- After the order is cancelled, the Bag becomes empty, reflecting the removal of the products.
  
https://github.com/user-attachments/assets/3f36237b-46c0-4981-b218-0d0b93c156f0

---------------------------------------------------------------

### Admin Scenarios 
1. Admin Creating a New Product:<br>
This video demonstrates the admin login process and how to create a new product, including:
- Logging in with valid credentials.
- Accessing the product creation form.
- Inputting product details and ensuring data validation.
- Successfully creating the product, which is then displayed on the website.
- Verifying that the product data is also correctly stored in the database.
  
https://github.com/user-attachments/assets/63a2fc72-0c10-4d09-90d0-6f455cc41d99


---------------------------------------------------------------

2. Admin Editing Product Information and Setting to Non-Active:<br>
This video showcases the process of editing an existing product's information by the admin, including:
- Accessing the product management section after logging in.
- Selecting a product to edit.
- Making necessary changes to the product details while ensuring data validation.
- Changing the product status to "Non-Active," which prevents it from being displayed on the website.
- Saving the changes and verifying that the product is no longer visible to users.
- Ensuring that the modified data is correctly reflected in the database.

https://github.com/user-attachments/assets/8ba0ced9-67a5-43a2-86cd-76f245f0ba9e

- Edit product information and keep it active
  
https://github.com/user-attachments/assets/d11d2335-4807-4748-a0ed-f35d7e76f76d

---------------------------------------------------------------

3. Admin Deleting a Product:<br>
This video demonstrates the process of deleting a product by the admin, including:
- Accessing the product management section after logging in.
- Selecting a product to delete.
- Confirming the deletion action.
- Ensuring that the product is completely removed from the website and is no longer visible to users.
- Verifying that the product data is also deleted from the database.

https://github.com/user-attachments/assets/4329df18-2a6b-4b70-b770-bb00d036257a

---------------------------------------------------------------

